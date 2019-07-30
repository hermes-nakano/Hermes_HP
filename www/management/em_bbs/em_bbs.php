<?php
/*
	20110419 高尾
	table→divへの移行をなんとかしたい
*/

/**********************************************************************************
**********************************************************************************
	注意：ヘッダはhtmlなどよりも前に置くこと
	**********************************************************************************
**********************************************************************************/
	//ヘッダ
	header("Content-type: text/html; charset=Shift_JIS");
	header("Cache-Control: no-cache, must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
	
	error_reporting(1); // 変数が見つからない等のエラーメッセージを表示しない

	//定数定義
	define('DE_SELF', $_SERVER['SCRIPT_NAME']);	// $_SERVER['SCRIPT_NAME'] で自身の名前を取得
		//ファイル処理
		define('MD_LW' , 'log_write');	// ログ書き込みmode
		define('MD_LD' , 'log_delete');	// ログ消去mode		以上2つはPOSTメソッドで使用
		//ページ遷移に使用する
		define('MD_THR_PG' , 'newthread');	// 新規記事画面mode
		define('MD_RES_PG' , 'res');			// 記事全文画面mode
		define('MD_DEL_PG' , 'del');			// 記事削除画面mode
		define('MD_MAN_PG' , 'manual');		// 利用方法画面mode	以上4つはGETメソッドで使用
	define('DE_LOGFILE', './em_bbs_log.cgi');				// 投稿されたデータの保存場所
	define('DE_LOG_MAX', 3000);						// ログの最大数
	define('DE_LOCKFILE', './lock/lockfile'); 	// ロックに使うファイルの場所
	define('PAGE_THREAD_MAX', 20);					// スレッド一覧ページに一度に表示する数
	define('DE_COOKIE_NAME', 'embbscookie');		// クッキー名
	define('DE_PASS', '0123');							// 管理者用パスワード

	//POSTメソッド（書込、削除）
	if ($_POST['mode'] == MD_LW){		// データをログに書き込む前に、クッキーを送信する。
		_set_cookie();
		_log_write();
	}elseif($_POST['mode'] == MD_LD){// ログ削除モード
		_log_delete();
	}

	//GETメソッド（ページ遷移）
	switch($_GET['mode']){
		case MD_THR_PG:					// 新規記事画面
			_display_page(_new_thread_page());
			break;
		case MD_RES_PG:					// 全文表示画面
			_display_page(_res_form_page());
			break;
		case MD_DEL_PG:					// 記事削除画面
			_display_page(_delete_page());
			break;
		case MD_MAN_PG:					// 利用方法画面
			_display_page(_manual_page());
			break;
		default:								// 記事一覧画面
			_display_page(_top_page());
	}

	exit;


/**********************************************************************************
**********************************************************************************
	各ページで生成された$strをページヘッダとページフッタの間に表示する
	**********************************************************************************
**********************************************************************************/
function _display_page($str){
	echo '<html>
	<head>
	<title>災害掲示板</title>
	<link rel="stylesheet" href="em_bbs_style.css" type="text/css">
	<script language=JavaScript src="../../js/common.js" type=text/JavaScript></script>
	</head>
	<body>
	<div id="base">
	<div id="header">
		<h1>災害掲示板</h1>
		<div class="header_links">
		<a href="../index.shtml">[社員専用へ戻る]</a>
			｜<a href="'.DE_SELF.'">[掲示板TOP]</a>
			｜<a href="'.DE_SELF.'?mode='.MD_THR_PG.'">[新規記事作成]</a>
			｜<a href="'.DE_SELF.'?mode='.MD_DEL_PG.'">[記事削除]</a>
			｜<a href="'.DE_SELF.'?mode='.MD_MAN_PG.'">[利用方法]</a>
		</div>
	</div><!-- id="header"終端 -->'."\n"."\n"
	////////////////////////////////////////////////ここに表示
	.$str.
	////////////////////////////////////////////////
	"\n"."\n".'<div id="footer">
		<div id="footer_copyright"> <SCRIPT language="JavaScript">copyright();</SCRIPT> </div>
	</div><!-- id="footer"終端 -->
	</div><!-- id="base"終端 -->
	</body>
	</html>';
}


/**********************************************************************************
**********************************************************************************
	新規記事作成画面
	**********************************************************************************
**********************************************************************************/
function _new_thread_page() {
	$str = '<div class="new_form_base"><div class="new_form">'._form_show().'</div></div>';
	return $str;
}

/**********************************************************************************
**********************************************************************************
	記事全文表示
	**********************************************************************************
**********************************************************************************/
function _res_form_page()
{
	$str .= '<div class="res_form_page">'."\n";
	$str .= '<div class="res_form_base">'."\n";
	// 初期化
	$find_flag = 0; // $find_flag を、0 で初期化する。
	$oya = $ko = array(); // 配列 $oya と $ko を初期化する。
	
	// ログ読み込み
	$log = @file(DE_LOGFILE); // ログファイル DE_LOGFILE の内容を読み込んで、$log に代入する。
	
	foreach ($log as $value) { // $log の個数回分、処理を繰り返す。
		list($no,$res_no,$name,$time,$title,$email,$mes,$pass,$ip,$host) = explode('<>', $value); // 各データ $value を、<> で分割して、各値を変数に代入する。
		
		// レス番号が一致したら
		if ($_GET['no'] == $res_no) array_unshift($ko, $value); // $_GET['no'] とレス番号 $res_no が一致したら、$ko の先頭に、レスデータ $value を代入する。
		
		// 番号が一致したら
		elseif ($_GET['no'] == $no) { // 探したい親記事データが見つかれば、処理を行います。$_GET['no'] と親番号 $no が一致したら処理を行います。
		
			// データが見つかった
			$find_flag = 1; // データが見つかった印として、$find_flag に 1 を代入する。
			
			// 親番号
			$hidden = '<input type="hidden" name="res_no" value="'.$_GET['no'].'">'; // 親記事番号を送るための隠し要素を、$hidden に代入する。
			
			// 題名
			$res_title = "Re:".$title; // 親記事の題名の先頭に Re: をつけたものを、$res_title に代入する。
			
			$oya[] = $value; // $oya 配列に、親データ $value を代入する。
			
			break; // 記事が見つかったので、配列を抜けます。
		}
	}
	
	// 該当するデータが見つからなかった
	if (!$find_flag) _error_page($_GET['no'].'番のデータは見つかりませんでした'); // もし、$find_flag が 0 なら、「データが見つからなかった」のエラーを出す。

	// 該当記事
	$str .= _kiji_show($oya, $ko); // _kiji_show 関数に、親記事 $oya とレス記事 $ko を渡して、戻り値を $str と連結する。
	
	$str .= '<div class="res_form">'."\n";
	
	// 投稿フォーム
	$str .= _form_show($res_title, $hidden); // 投稿フォームを作成する関数 _form_show に引数 $res_title と $hidden を渡して、戻り値を $str に代入する。
	
	$str .= '</div>'."\n";
	$str .= '</div><!-- res_form_base終端 -->'."\n";
	$str .= '</div><!-- res_form_page終端 -->'."\n";

	return $str;
}

//----------------------------------------------------------
//記事表示
//----------------------------------------------------------
function _kiji_show($oya,$ko) // _kiji_show 関数呼び出し元で渡した引数を、$log で受け取っています。関数呼び出し元が渡した引数を、$oya と $ko で受け取っています。
{
	$str = ""; // $str を初期化する。
	
	// ページ分割
	$oya_per = array_chunk($oya, PAGE_THREAD_MAX); // 親記事配列 $oya を 20 個ずつに分割して、$oya_per に代入する。
	
	// ページ総数
	$page_all = count($oya_per); // $oya_per 配列の個数を調べて、ページ総数 $page_all に代入する。

	// 現在のページ
	$now_page = ($_GET['page']) ? $_GET['page'] : 0; // もし $_GET['page'] の値があれば、$_GET['page'] を、なければ 0 を、現在のページ $now_page に代入する。
	
	// データの存在チェック
	if ($oya_per[$now_page][0] == "") $now_page = 0; // ありえないページ数 10000 とかの数値が送られてきた場合のために、$oya_per[$now_page][0] というデータが存在するか調べて、存在しなければ、現在のページ $now_page を 0 にする。

	// ログを表示
	foreach ($oya_per[$now_page] as $value) { // $log 配列の個数回分の処理を繰り返す。$value には、配列の各要素が入ります。これまでは、親記事もレス記事もまとめた $log をループしてましたが、親記事 $oya だけをループするようにする。$oya_per[$now_page] 配列の個数回分繰り返す。
	
		// 外テーブルはじめ
		$str .= '<div class="posts_base">'."\n";
		
		// 分解
		list($no,$res_no,$name,$time,$title,$email,$mes,$pass,$ip,$host) = explode('<>', $value); // $value を、<> で分割して、各変数に値を代入する。
		
		// 親記事
		$str .= _table($no,$res_no,$name,$time,$title,$email,$mes); // _table 関数に、複数の引数を渡し、_table 関数からの戻り値を、$str と連結する。
		
		// レス記事
		foreach ($ko as $value2) { // レス記事 $ko をループする。親データと、レスデータが混合しないように、親データを $value、レスデータを $value2 にする。
		
			// 分解
			list($no2,$res_no2,$name2,$time2,$title2,$email2,$mes2,$pass2,$ip2,$host2) = explode('<>', $value2); // レスデータ $value2 を <> で分割して、各値を変数に代入する。親記事の変数と混合しないように、変数名の最後に 2 をつけています。
			
			// 返信記事
			if ($no == $res_no2) $str .= _table($no2,$res_no2,$name2,$time2,$title2,$email2,$mes2); // もし親記事番号 $no と レス番号 $res_no2 が同じなら、_table 関数を呼び出して、戻り値を $str と連結する。
		}
		
		// 外テーブル終わり
		$str .= '</div><hr class="posts_base">'."\n\n"; // テーブルの終わり部分です。
	}

	return $str; // $str を、関数呼び出し元に返す。
}


//----------------------------------------------------------
//記事テーブル
//----------------------------------------------------------
function _table($no,$res_no,$name,$time,$title,$email,$mes) // 関数呼び出しもとの引数（$no, $res_noなど）を受け取っています。
{
	//親記事ならoya、レスならkoのクラスを使用する
	$style = (!$res_no) ? "posts_oya" : "posts_ko";
	
	$str = '<table class="'.$style.'">'."\n"; 
	
	//記事ナンバー、題名、投稿者、投稿日時
	$str .= '<tr><td class="'.$style.'_no">'.$no.'</td><td class="'.$style.'" colspan="4">'.$title.'</td></tr>';
	
	// 本文
	$str .= '<tr><td colspan="5" class="'.$style.'_mes">'.$mes.'</td></tr>'."\n"; // コメント $mes を表示する。
	
	//名前、時間
	$str .= '<td class="posts_footer" colspan="5">';
		//emailが存在するなら名前にメール付加
	if ($email != "") {
		$str .= '投稿者 ： <a href="mailto:'.$email.'">'.$name.'</a>';
	}else{
		$str .= '投稿者 ： '.$name;
	}
	//時間及び削除ページへのリンクを表示
	$str .= ' '.$time.' <a href="'.DE_SELF.'?mode=del&no='.$no.'">[この記事を削除]</a></td></tr></table>';

	return $str; // $str を呼び出し元に返す。
}


//----------------------------------------------------------
//投稿フォーム
//----------------------------------------------------------
function _form_show($res_title="", $hidden="")
{
	$str = "";

	if ($_GET['mode'] == "res"){
		$str .= '<div class="form_caption">この記事に返信する</div>'."\n";
	}else{
		$str .= '<div class="form_caption">新規記事作成</div>'."\n";
	}

	// テーブル最初
	$str .= '<table class="post_form_base">'."\n";
	
	$str .= '<form action="'.DE_SELF.'" method="POST">'."\n"; // form タグ内の、action には、PHPプログラムのパス DE_SELF を書きます。POST で送信したいので、method="POST" にする。ファイルをアップロードするには、<form> 内に $enctype を指定する必要があります。
	$str .= '<input type="hidden" name="mode" value="'.MD_LW.'">'."\n"; // 値を
	
	// クッキー取得
	$v = _get_cookie(); // _get_cookie関数でクッキーを取得して $v に代入する。
	
	$str .= $hidden; // レス記事であることを示す隠し要素 $hidden と $str を連結する。
	
	//名前用の入力欄なので、名前を name に
	//名前欄にクッキーで取得した $v['name'] を表示する。
	$str .= '<tr><td class="postform">
	投稿者名<span class="attention">(必須)</span><input type="text" name="name" value="'.$v['name'].'" class="input_text">
	</td></tr>'."\n";

	// 題名
	// 題名用の入力欄なので、名前を、title にする。題名の入力欄に、レスタイトル $res_title の値を表示させます。
	$str .= '<tr><td class="postform">
	投稿内容の題名<span class="attention">(必須)</span><input type="text" name="title" value="'.$res_title.'" class="input_text">
	</td></tr>'."\n";

	// メールアドレス
	// メール用の入力欄なので、名前を、email にする。メールアドレス欄にクッキーで取得した $v['email'] を表示する。
	$str .= '<tr><td class="postform">
	投稿者のメールアドレス<input type="text" name="email" value="'.$v['email'].'" class="input_text">
	</td></tr>'."\n";

	//本文
	//コメント用の入力欄なので、名前を mes にする。
	
	$str .= '<tr><td class="postform">
	投稿する本文<span class="attention">(必須)</span>
	</td></tr>'."\n";
	$str .= '<tr><td class="postform">
	<textarea name="mes" class="postform"></textarea>
	</td></tr>'."\n";

	// パスワード
	// パスワード用の入力欄は、type="password" です。パスワード用の入力欄なので、名前を、pass にする。

	$str .= '<tr><td class="postform">
	投稿内容にかけるパスワード<input type="password" name="pass" value="'.$v['pass'].'" class="input_pass">
	</td></tr>'; 

	// 送信ボタン
	// 送信ボタンは、type="submit" です。value="送信する" で、ボタン上に 「送信する」 が表示されます
	$str .= '<tr><td class="postform">';
	if ($_GET['mode'] == "res"){
		$str .= '<input type="submit" value="返信する" class="input_button">'."\n";
	}else{
		$str .= '<input type="submit" value="記事作成" class="input_button">'."\n";
	}
	$str .= '</td></tr>';
	
	
	// テーブル最後
	$str .= '</form></table>'."\n\n";

	return $str; // return で、$str の値を、関数呼び出し元に返す。
}

//----------------------------------------------------------
//書き込みチェック
//----------------------------------------------------------
function _write_check(&$f) // 関数呼び出し元で渡した引数を、$f で受け取って「参照渡し」にする。
{
	// 名前なし
	if ($f['name'] == "") _error_page('「名前」を記入してください'); // 「名前」が未記入のときは、エラーを出す。
	
	// 題名なし
	if ($f['title'] == "") _error_page('「題名」を記入してください'); // 「題名」が未記入のときは、エラーを出す。
	
	// コメントなし
	if ($f['mes'] == "") _error_page('「コメント」を記入してください'); // 「コメント」が未記入のときは、エラーを出す。
	
}


//----------------------------------------------------------
//投稿フォームの値処理
//----------------------------------------------------------
function _form_check($str) // 関数呼び出し元が渡した引数を、$strで受け取っています。
{
	foreach ($str as $key => $value) { // 引数 $str は、配列なので、foreach を使って、配列の個数回繰り返す。
		$value = trim($value); // $valueの前後のスペースを取り除いてから、$valueに代入する。
		if (get_magic_quotes_gpc()) $value = stripslashes($value); // get_magic_quotes_gpc 機能が ON の時、stripslashesで \ を取り除いて、$value に代入する。
		
		// タグを無効化
		$value = str_replace("<", "&lt;", $value); // <table> とか <javascript> のようなタグを記入されると危険なので、タグを無効化する。< を &lt; に、> を &gt; に変換する。
		$value = str_replace(">", "&gt;", $value); 
		
		// 改行
		if ($key == "mes") { // もし、$key が コメント $mes だったら処理を行います。
			$value = str_replace("\x0D\x0A", "\n", $value); // $value 内の、Windowsの改行コード \x0D\x0A を、\n に置換して、$value に代入する。
			$value = str_replace("\x0D", "\n", $value); // $value 内の、Macの改行コード \x0D を、\n に置換して、$value に代入する。
			$value = str_replace("\x0A", "\n", $value); // $value 内の、Unixの改行コード \x0A を、\n に置換して、$value に代入する。
			$value = str_replace("\n", "<br>", $value); // $value 内の、\n を <br> に置換して、$value に代入する。
		}
		$str[$key] = $value; // きれいにした $value を、$str[$key] に代入する。
	}

	return $str; // $str を関数呼び出し元に返す。
}

/**********************************************************************************
**********************************************************************************
	記事削除画面
	**********************************************************************************
**********************************************************************************/
function _delete_page() {
	$no = $_GET['no'];	// 全文表示画面から遷移してきた場合、記事Noが取得できる
	$str = '<div class="del_page_base">';
	$str .= '<table class="del">
				<tr><!-- 削除機能説明 -->
					<td class="del">
					<p><h2 class="del">記事削除</h2>
					削除する記事ナンバーとパスワードを入力し、削除ボタンを押して下さい。<br>
					一度削除した記事は復元できません。</p>
					</td>
				</tr><!-- 削除機能説明終了 -->
				<tr><!-- 削除機能部分 -->
					<td>
					<form class="del" method="post" action="'.DE_SELF.'">
					<!-- 記事番号・パス送信用 --><input type="hidden" name="mode" value="'.MD_LD.'">';

	if($no) {
		$str .= '削除記事番号：<input type="text" name="no" value="'.$no.'" class="del">';
	} else {
		$str .= '削除記事番号：<input type="text" name="no" class="del">';
	}

	$str .= 'パスワード：<input type="password" name="pass" class="del"><input type="submit" name="erasesub" value="削除"></form></td></tr><!-- 削除機能部分終了 --></table>';
	$str .= '</div>';
	return $str;
}

//----------------------------------------------------------
//ログ削除
//----------------------------------------------------------
function _log_delete()
{
	// 番号なし
	if (!$_POST['no']) _error_page('削除したい番号を記入してください'); // もしログ番号 $_POST['no'] がなければ不正アクセスとみなして _error_page 関数を呼び出してエラーを表示する。

	// パスワードなし
	if ($_POST['pass'] == "") _error_page('パスワードを記入してください'); // もしパスワード $_POST['pass'] が空なら不正アクセスとみなしてエラーを表示する。
	
	// ロック
	$lock_flag = _lock(); // ログを読み込む前に、_lock 関数を呼び出して、戻り値を $lock_flag に入れます。
	
	// ログ読み込み
	$log = @file(DE_LOGFILE); // ログファイル DE_LOGFILE の中身を読み込んで $log に代入する。
	
	// 該当するデータを探す
	$find_flag = 0; // $find_flag と $oya_flag を初期化する。
	$oya_flag = 0;

	foreach ($log as $key => $value) { // $log の個数回分ループする。
		list($no,$res_no,$name,$time,$title,$email,$mes,$pass,$ip,$host) = explode('<>', $value); // 各ログデータ $value を <> で分割して、各値を変数に代入する。

		if ($_POST['no'] == $no) { // もし $_POST['no'] と $no が同じなら処理をする。

			$find_flag = 1; // データが見つかった印として $find_flag に 1 を代入する
			
			// パスワードチェック
			if ($_POST['pass'] == DE_PASS || _pass_ango($_POST['pass']) == $pass) $ok = 1;  // $_POST['pass'] と 管理者パスワード DE_PASS が同じか、$_POST['pass'] と $pass が同じなら、$ok に 1 を代入する。パスワード欄に入力された $_POST['pass'] を暗号化したものと、ログに保存されていた $pass が一致すれば処理をする。 
			else _error_page('パスワードが違います', $lock_flag); // もしパスワードが一致しなければ、_error_page関数を呼び出す。
			
			// 親記事？
			if (!$res_no) $oya_flag = 1; // もしレス番号 $res_no がなければ、$oya_flag に 1 を代入する。
			
			// 削除
			array_splice($log, $key, 1); // $log の $key の位置から、1個分削除する。
			
			break; // 配列を抜けます。
		}
	}

	// 記事が見つからなかった場合
	if (!$find_flag) _error_page($_POST['no'].'番のデータは見つかりませんでした', $lock_flag); // $find_flag が 0 の時、「記事が見つからなかった」というエラーを表示する。
	
	// 親記事を削除した場合レス記事も削除する
	if ($oya_flag) { // もし $oya_flag が 1 なら処理をする。
		$temp = array(); // $temp 配列を初期化する。
		foreach ($log as $value) { // $log の個数回分ループする。
			list($no,$res_no,$name,$time,$title,$email,$mes,$pass,$ip,$host) = explode('<>', $value); // 各ログデータ $value を <> で分割して、各値を変数に代入する。
			if ($_POST['no'] == $res_no) { // もし $_POST['no'] と $res_no が一致すれば処理をする。
			
				if ($upfile && file_exists(DE_UP_DIR.$upfile)) unlink(DE_UP_DIR.$upfile); // $upfile が空でなくて、アップロードしたファイル DE_UP_DIR.$upfile が存在すれば、削除する。
			
				continue; // 以降の処理を飛ばす。
			}
			$temp[] = $value; // $temp 配列の末尾に ログデータ $value を代入する。
		}
		$log = $temp; // $temp を $log に代入する。
	}

	// ログ書き込み
	$handle = @fopen(DE_LOGFILE,"w") or _error_page(DE_LOGFILE.'に書き込めません', $lock_flag); // ログファイル DE_LOGFILE を書き込みモードでオープンする。オープンに失敗したら _error_page 関数を呼び出す。
	foreach ($log as $value) { fwrite($handle, $value); } // $log の個数回分、ファイルハンドル $handle に、ログデータ $value を書き込みます。
	@fclose($handle); // ファイルハンドル $handle を閉じます。
	
	// アンロック
	$lock_flag = _unlock(); // _unlock 関数を呼び出して、戻り値を $lock_flag に代入する。
}

/**********************************************************************************
**********************************************************************************
	利用方法表示
	**********************************************************************************
**********************************************************************************/
function _manual_page(){
	$str = '	<div class="manual_page">
					<table class="manual">
						<tr>
							<td class="manual">
							<p class="manual">掲示板の利用方法</p>
							<p><div class="manual">【表示について】</div>
							この掲示板はスタイルシートを使用しています。<br>
							ブラウザでスタイルシートを使用しない設定にしている場合は上手く表示されません。<br>
							また、スマートフォン等でページを表示した際にスタイルシートの読込が行われないことがあります。<br>
							そのような場合はページの再読込を行ってください。</p>
							
							<p><div class="manual">【記事作成】</div>
							下記項目を入力し、「記事作成」をクリックすると親記事が作成されます。</li>
							<ul>
								<li>名前（必須）：氏名を入力して下さい。</li>
								<li>題名（必須）：内容が一目で解るよう、簡潔に表記して下さい。</li>
								<li>メール：自身のメールアドレスを入力して下さい。</li>
								<li>内容（必須）：投稿内容を入力して下さい。</li>
								<li>パスワード：記事を削除する際に必要です。</li>
							</ul></p>
							
							<p><div class="manual">【返信】</div>
							記事題名をクリックすると全文と返信コメント、返信フォームを表示します。<br>
							記事作成と同様に項目を入力し、「返信する」をクリックすると返信記事が作成され、掲示板TOPへ移動します。</p>
							
							<p><div class="manual">【記事削除】</div>
							削除したい記事の番号とパスワードを入力し「削除」をクリックすると記事が削除されます。<br>
							親記事を削除すると返信も一緒に削除されます。</p>
							
							<p><div class="manual">【メール送信】</div>
							全文表示画面で投稿者名をクリックするとメールソフトが起動します。</p>
							</td>
						</tr>
					</table>
				</div>';
	return $str;
}


/**********************************************************************************
**********************************************************************************
	トップページ表示
	**********************************************************************************
**********************************************************************************/
function _top_page()
{
	// ログ読み込み
	$log = @file(DE_LOGFILE); // 「初期設定」の所で定数にした DE_LOGFILE（log.cgiのこと）の中身を全て読み込んで、配列 $log に代入
	
	// 配列の初期化
	$oya = $ko = $oya_no = array(); // $oya と $ko 配列を初期化する。

	// 親記事とレス記事を分ける
	foreach ($log as $value) { // ログ $log の個数回分繰り返しする。
		list($no, $res_no) = explode('<>', $value); // 各データ $value を <> で分割して、ログ番号 $no と、レス番号 $res_no に代入する。
		
		// レス記事
		if ($res_no) { // もしレス記事なら（$res_no があれば）処理をする。
			 array_unshift($ko, $value); // 配列 $ko の先頭に、レスデータを追加する。
			//if (!in_array($res_no, $oya_no)) $oya_no[] = $res_no; // もし、親番号配列 $oya_no に、$res_no がなければ、$oya_no 配列の最後に $res_no を代入する。
		
		// 親記事
		} else { // もし親記事なら（$res_no がなければ）処理をする。
			$oya[$no] = $value; // 配列 $oya の最後に、親データを追加する。親記事ログ $oya のキーを $no にして $value を代入する。
			if (!in_array($no, $oya_no)) $oya_no[] = $no; // もし、親番号配列 $oya_no に、$no がなければ、$oya_no 配列の最後に $no を代入する。
		}
	}
	// トップソート用にデータ並べ替え
	$temp = array(); // $temp 配列を初期化する。
	foreach ($oya_no as $value) { // $oya_no 配列の個数回分ループする。
		foreach ($oya as $key => $value2) { // 親記事ログ $oya の個数回分ループする。
			if ($value == $key) $temp[] = $value2; // もし、トップソート用番号 $value と $oya ログの $key 番号が同じなら、親ログデータ $value2 を $temp 配列の最後に代入する。
		}
	}
	$oya = $temp; // $temp を $oya に代入する。

	// 表示記事
	if ($oya[0] != "") $str = _title_show($oya, $ko); // 親記事が空でなければ、_title_show 関数に、$oya と $ko の引数を渡して、戻り値を $str に代入する。

	return $str;
}

//----------------------------------------------------------
//スレッドタイトル一覧作成
//----------------------------------------------------------
function _title_show($oya,$ko) { //親記事配列($oya)と返信記事配列($ko)を受け取る。
	$str = "";
	
	// ページ分割
	$oya_per = array_chunk($oya, PAGE_THREAD_MAX); // 親記事配列 $oya を ページあたりの最大数ごとに分割して、$oya_per に代入する。
	
	// ページ総数
	$page_all = count($oya_per); // $oya_per 配列の個数を調べて、ページ総数 $page_all に代入する。

	// 現在のページ
	$now_page = ($_GET['page']) ? $_GET['page'] : 0; // もし $_GET['page'] の値があれば、$_GET['page'] を、なければ 0 を、現在のページ $now_page に代入する。
	
	// データの存在チェック
	if ($oya_per[$now_page][0] == "") $now_page = 0; // ありえないページ数 10000 とかの数値が送られてきた場合のために、$oya_per[$now_page][0] というデータが存在するか調べて、存在しなければ、現在のページ $now_page を 0 にする。

	$str .= '<table class="titlelist">';
	$str .= '<tr><th class="titlelist_no">No</td><th class="titlelist_title">タイトル</td><th class="titlelist">作成者</td><th class="titlelist_rescnt">返信数</td><th class="titlelist_update">最終更新</td></tr>';

	//スレッド一覧部分
	foreach ($oya_per[$now_page] as $value) { // $log 配列の個数回分の処理を繰り返す。$value には、配列の各要素が入ります。これまでは、親記事もレス記事もまとめた $log をループしてましたが、親記事 $oya だけをループするようにする。$oya_per[$now_page] 配列の個数回分繰り返す。
		$res_cnt = 0;	//返信記事数初期化
		$res_time = "";	//最終更新レス時間用初期化
		$res_name = "";	//最終更新レス投稿者用初期化
		
		list($no,$res_no,$name,$time,$title) = explode('<>', $value); //$valueを '<>' で分割して変数に代入する。
	
		// レス記事
		foreach ($ko as $value2) { // レス記事 $ko をループする。親データと、レスデータが混合しないように、親データを $value、レスデータを $value2 にする。
			// 分解
			list($no2,$res_no2,$name2,$time2) = explode('<>', $value2); // レスデータ $value2 を <> で分割して、各値を変数に代入する。親記事の変数と混合しないように、変数名の最後に 2 をつけています。
			if ($no == $res_no2) {
				$res_cnt++;		//返信記事があれば加算
				if(!$res_time || $res_time < $time2) {	//最終更新レス表示用がなければ格納
					$res_time = $time2;
					$res_name = $name2;
				}
			}
		}
		
		$str .= '<tr class="titlelist"><td class="titlelist_no">'.$no.'</td><td class="titlelist_title"><a href="'.DE_SELF.'?mode=res&no='.$no.'">'.$title.'</a></td><td class="titlelist">'.$name.'</td><td class="titlelist_rescnt">'.$res_cnt.'</td><td class="titlelist_update">';
		
		if ($res_cnt){	//返信記事があるなら最終返信記事を追加
			$str .= $res_time.'<br>'.$res_name.'</td></tr>';
		}else {	//無いならスレッド作成者のものを追加
			$str .= $time.'<br>'.$name.'</td></tr>';
		}
	}
	$str .= '</table>';	//テーブル終了
		// 移動リンク
	if ($page_all > 0) { // ページ総数 $page_all が 1 より大きければ、処理をする。
		$str .= _page_link($now_page, $page_all); // _page_link 関数に、現在のページ $now_page と ページ総数 $page_all の引数を渡して、戻り値を $str と連結する。
	}
	return $str;
}

//----------------------------------------------------------
//移動リンク
//----------------------------------------------------------
function _page_link($now_page,$page_all) // 関数呼び出し元で渡した引数を、$now_page と $page_all で受け取っています。
{
	$str = "";
	$cnt = 0;
	
	$str .= '<div class="titlelist_page">';
	while(true){
		if($cnt == $now_page){
			$str .= $cnt + 1;
		}else{
			$str .= '<a href="'.DE_SELF.'?page='.$cnt.'">'.($cnt + 1).'</a>';
		}
		$cnt++;
		if($cnt >= $page_all) break;
		$str .= '｜';
	}
	$str .= '</div>';
	
	return $str; // $str を関数呼び出し元に返す。
}


/**********************************************************************************
**********************************************************************************
	エラーページ
	**********************************************************************************
**********************************************************************************/
function _error_page($str, $lock_flag=0) // _error_page 関数の呼び出し元で指定した引数（DE_LOGFILE.'に書き込めません'）を、$str で受け取っています。$lock_flag = 0 は、関数呼び出し元で、２番目の引数が省略された時だけ、$lock_flag に 0 を代入する。
{
	if ($lock_flag) $lock_flag = _unlock(); // もし、$lock_flag が 1 なら、_unlock 関数を呼び出して、ロックファイル を削除する。そして、$lock_flag に、_unlock 関数の戻り値 0 を代入する。
	_display_page($str); // $str のエラーメッセージをブラウザに表示する。
	exit;
}

/**********************************************************************************
**********************************************************************************
	-----
	**********************************************************************************
**********************************************************************************/
//----------------------------------------------------------
//ロック
//----------------------------------------------------------
function _lock()
{
	// トライ回数
	$try = 5; // $try トライ回数を、5回にする。
	
	// 10分たっていたら削除
	if (file_exists(DE_LOCKFILE)) { // もし、ロックファイル DE_LOCKFILE が存在していたら、処理を行います。
		$make_time = filemtime(DE_LOCKFILE); // ロックファイル DE_LOCKFILE が作成された時間を調べて、$make_time に代入する。
		if (time() - $make_time > 600) rmdir(DE_LOCKFILE); // 現在の時刻 time() から、ロックファイルが作成された時間 $make_time を引いた値が、600秒（10分）を超えていたら異常終了で残ったとみなして、ロックファイル DE_LOCKFILE を削除する。
	}
	
	// ディレクトリ作成
	while (!@mkdir(DE_LOCKFILE)) { // ロックファイル DE_LOCKFILE の作成にトライして、失敗したら、成功するまでがんばります。
		if (--$try <= 0) _error_page('ただいま混雑しています'); // ループを 1回繰り返すごとに、$try から 1 を引きます。もし、$try 回数が、0 以下になったら、ロック失敗のエラーを表示する。
		sleep(1); // 1秒待ちます。
	}
	return 1; // 関数呼び出し元に、1 を返す。
}

//----------------------------------------------------------
//アンロック
//----------------------------------------------------------
function _unlock()
{
	if (file_exists(DE_LOCKFILE)) rmdir(DE_LOCKFILE); // もし、ロックファイル DE_LOCKFILE が存在すれば、削除する。
	return 0; // 関数呼び出し元に、0 を返す。
}


//----------------------------------------------------------
//ログにデータを書き込む
//----------------------------------------------------------
function _log_write()
{
	$f = $_POST; // 投稿フォームから送られてきたデータ $_POST を、$f に代入する。
	
	// フォーム値処理
	$f = _form_check($_POST); // _form_check 関数に $_POST を渡して、書き込みチェックを行います。
	
	// 書き込みチェック
	_write_check($f); // ログの読み込み・書き込みの前に _write_check 関数を呼び出す。
	
	// ロック
	$lock_flag = _lock(); // ログを読み込む前に _lock 関数を呼び出してロックする。
	
	// ログ読み込み
	$log = @file(DE_LOGFILE); // ログファイル DE_LOGFILE の中身を読み込んで、$log に代入する。
	
	// 二重投稿禁止
	list($no,$res_no,$name,$time,$title,$email,$mes) = explode('<>', $log[0]); // 最新ログ $log[0] を、<> で分割して、各値を変数に代入する。
	if ($f['name']==$name && $f['mes']==$mes) _error_page('二重投稿は禁止です', $lock_flag); // もし 投稿フォームから送られてきた名前 $f['name'] と、最新ログの名前 $name が同じで、投稿フォームから送られてきたコメント $f['mes'] と、最新ログのコメント $mes が同じなら、エラーを表示する。
	
	// ログ番号
	$no++; // 最新ログの番号 $no に 1 を足する。
	
	// 投稿日時の取得
	$time = date("Y/m/d H:i (D)"); // 現在時刻（1156860130 のような数値）を、表示したい形式 "Y/m/d H:i (D)" にして $time に代入する。
	
	// パスワードを暗号化する
	$pass_ango = _pass_ango($_POST['pass']); // _pass_ango関数に、$_POST['pass'] を渡して暗号化された文字列を $pass_ango に入力する。
	
	//IP取得
	$ip = getenv("REMOTE_ADDR");
	
	//ホスト取得
	$host = getenv("REMOTE_HOST");
	if ($host == null || $host == $ip) $host = gethostbyaddr($ip);

	// 投稿データを連結
	$plus = implode('<>',array($no,$_POST['res_no'],$f['name'],$time,$f['title'],$f['email'],$f['mes'],$pass_ango,$ip,$host,"\n")); // 投稿された各データを、array で配列にして <> で連結して文字列にしてから、$plus に代入する。暗号化されたパスワード $pass_ango をデータに追加する。
	array_unshift($log, $plus); // $log 配列の先頭に、$plus のデータを追加する。

	// ログ件数
	$log_cnt = count($log); // 配列 $log の要素数を調べ、$log_cnt に代入する。
	
	if ($log_cnt > DE_LOG_MAX) $log_cnt = DE_LOG_MAX; // ログ件数 $log_cnt が、DE_LOG_MAX 件を超えたら、$log_cnt に DE_LOG_MAX を代入

	// ログに書き込む
	$handle = @fopen(DE_LOGFILE, "w") or _error_page(DE_LOGFILE.'に書き込めません', $lock_flag); // ログファイルを、書き込みモードで開いて、ファイルハンドル $handle が使えるようにする。もし、ログファイルオープンに失敗すると、関数 _error_page を呼び出して、エラーを表示する。
	for($i=0; $i<$log_cnt; $i++) { // 0 から ログファイルの要素数 $log_cnt まで、処理を繰り返す（ループ）
		fwrite($handle, $log[$i]); // ログ $log の各要素を、ファイルハンドル $handle に書き込んでいます。
	}
	@fclose($handle); // オープンしたファイルハンドル $handle を閉じます。
	
	// アンロック
	$lock_flag = _unlock();	 // ログの書き込み後 _unlock 関数を呼び出してアンロックする。
}

//----------------------------------------------------------
//パスワード暗号化
//----------------------------------------------------------
function _pass_ango($str) // 関数呼び出し元で渡したパスワードを $str で受け取っています。
{
	if($str != ""){
		$str = substr(md5($str), 0, 8); // $str を暗号化して、0番目から8個分を返す。
	}
	return $str;
}

//----------------------------------------------------------
//セットクッキー
//----------------------------------------------------------
function _set_cookie()
{
	$f = _form_check($_POST); // $_POST データの値を _form_check 関数できれいにしてから $f に代入する。
	$c['name'] = $f['name']; // 名前 $f['name'] を $c['name'] に代入する。
	$c['email'] = $f['email']; // メール $f['email'] を $c['email'] に代入する。
	$cook_value = implode('<>', $c); // クッキー配列 $c を <> で連結して文字列にしてから、$cook_value に代入する。
	$cook_expire = 0;	//ブラウザを閉じた時点でクッキー削除
	//$cook_expire = time()+60*60*24*30*3; // 現在の時刻 time() に 60秒（1分）×60分（1時間）×24時間（1日）×30日（1ヶ月）×3ヶ月を足した数値を $cook_expire に代入する。
	setcookie(DE_COOKIE_NAME, $cook_value, $cook_expire); // クッキーを送信する。
}


//----------------------------------------------------------
//ゲットクッキー
//----------------------------------------------------------
function _get_cookie()
{
	list($c['name'],$c['email']) = explode('<>', $_COOKIE[DE_COOKIE_NAME]); // クッキーデータを $_COOKIE[DE_COOKIE_NAME] で取得し、<> で分割し、各値を変数に代入する。
	// $f = _form_check($_POST); // 投稿フォームの $_POST データを _form_check 関数できれいにしてから $f に代入する。
	// $c = _form_check($c); // $c 配列を _form_check 関数できれいにしてから $c に代入する。
	// foreach ($c as $key => $value) { // $c 配列の個数回分ループする。
	// 	if ($_POST[$key] != "") $c[$key] = $f[$key]; // もし投稿フォームの入力欄が空でなければ、その値を $c[$key] に代入する。
	// }
	return $c; // $c を関数呼び出し元に返す。
}

?>
