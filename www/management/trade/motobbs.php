
<?php

/*
更新履歴
090515 山口
110421 高尾 著作権表示部分をJavaScriptに
*/

error_reporting(1); // エラーの表示無し

////////////////////////////////////////////////////////////
//
//初期設定
//
////////////////////////////////////////////////////////////


// このスクリプトのパス
define('DE_SELF', $_SERVER['PHP_SELF']); // $_SERVER['PHP_SELF'] は、現在実行しているスクリプト（つまり bbs.php）のパスでdefine を使って「定数」にする。

// 管理者パスワード
define('DE_PASS', '0123'); // 管理者用パスワード「0123」を定数にする。

// 保存用ログファイル
define('DE_LOGFILE', './log2.cgi'); // 投稿フォームから書き込まれたデータを、保存しておくログの場所（./log.cgi）を、DE_LOGFILE という定数名で定義。

// ロックファイル
define('DE_LOCKFILE', './lock/lockfile');

// ログ最大保存件数
define('DE_LOG_MAX', 100);

// 文字色
$colors = array("black", "#35bfe1", "orange", "#ff6fb7","red"); // 好きな色を、配列にして $colors に代入。


//----------------------------------------------------------
//ヘッダーとフッター
//----------------------------------------------------------

// HTMLの最初の部分と最後の部分を、変数 $headerと変数 $footerに代入。
$header =<<<END
<html>
<head>
<script language=JavaScript src="../../js/common.js" type=text/JavaScript></script>
<script language="JavaScript">
<!-- 

function mOver(num){
	if(num==0){
		css0.style.display = "block";
	}else if(num==1){
		css1.style.display = "block";
	}else if(num==2){
		css2.style.display = "block";
	}else if(num==3){
		css3.style.display = "block";
	}else if(num==4){
		css4.style.display = "block";
	}else if(num==5){
		css5.style.display = "block";
	}else if(num==6){
		css6.style.display = "block";
	}
}

function mOut(){
	css0.style.display = "none";
	css1.style.display = "none";
	css2.style.display = "none";
	css3.style.display = "none";
	css4.style.display = "none";
	css5.style.display = "none";
	css6.style.display = "none";
}


 -->
</script>
<meta http-equiv="content-type" content="text/html; charset=Shift_JIS">
<meta http-equiv="Pragma" content="no-cache">
<link rel="stylesheet" href="common.css" type="text/css"/>
<link rel="stylesheet" href="basic.css" type="text/css" />

<title>掲示板</title>
</head><body>

<table border="0"><!- 一番でかいテーブル ->
<!- 1列目 ->
	<tr><td width="1000">
	<table border="0">
		<tr>
			<td class="left_block" colspan="2">
			</td>

			<td class="center_block" >

				<!- JavaScriptがONの場合 ->
				<table class="header_table">
					<tr>
						<td colspan="3" align="center"></td>
					</tr>

					<noscript><tr>
						<td colspan="3">
						 <div class="noscript_alert">
						 このサイトをごらんいただくためには、お使いのブラウザを<br>
						 JavaScript有効に設定していただく必要があります。<br>
						</div>
						</td>
					</tr></noscript>

					<tr>
						<td colspan="3" class="space1_block">
						</td>
					</tr>
				</table>

				<!- JavaScriptがOFFの場合 ->
				<table  class="main_table">
					<tr>
						<td class="space1_block"></td>
					</tr>
					<tr>
						<td>
						<table  width="95%" border=0>
							<tr>
								<td>
					  			<center>
					  			<FONT SIZE="6" COLOR="#000099">トレード掲示板（仮）</FONT><br><br>
								<a href="/management/index.php" class="button">社員HP</a>
								<a href="bbs.php" class="button">掲示板</a>
								<a href="online.html" class="button">利用方法</a>
								<a href="example.html" class="button">入力例</a>

<h3 class="Heading">入力フォーム</h3>
END;
$footer =<<<END

								</center>

					 			</td>
							</tr>

					 		<tr>
								<td class="space1_block">
								</td>
							</tr>

							<tr>
								<td colspan="3" class="space3_block">
								</td>
							</tr>
						</table>
						</td>
					</tr>

					<tr>
						<td class="center_block">
							<table class="footer_table">
								<tr>
									<td id="footer_copyright"><SCRIPT language="JavaScript">copyright();</SCRIPT>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
<!- 1列目終了 ->

<!- 2列目 ->
<!- 掲示板の使い方 ->
	<td align="left" valign="top">　
	<br><br>
	<FONT SIZE="6" COLOR="#000099">ご利用ありがとうございます</FONT><br><br><br>
	<br>
	　　トレード掲示板（仮）にようこそ！<br>
	<br>
	　　ある人には不用品でも、<br>
	　　ある人にはお宝！<br>
	<br>
	　　そんな、ゴミに出される予定だったモノたちを、<br>
	　　リサイクルしましょう！<br>
	<br>
	　　いらないモノがある人は、<br>
	　　<b>　　【あげます】（物品名）</b>と題名に書いて、<br>
	　　どんどん出品しましょう！<br>
	<br>
	　　欲しいモノがある人は、<br>
	<b>　　【欲しいです】（物品名）</b>と題名に書いて、<br>
	　　どんどん、要請しましょう！<br>
	<br>
	　　もしかしたら、欲しかったあのモノが！？<br>
	<br>
	　　ゴミは減り、地球環境にも貢献出来ます！<br>
	<br>
	　　ぜひ、積極的に利用しましょう！！<br>
	<br>

	<a href="online.html">つかいかた</font></a>
	</td></tr>
</table>

</body>
</html>
END;

define('DE_HEADER', $header); // ヘッダー $headerを定数にする
define('DE_FOOTER', $footer); // フッター $footerを定数にする


//----------------------------------------------------------
//アイコン
//----------------------------------------------------------
//アイコンの使用 1:使用する 0:使用しない
define('DE_ICON_USE' ,0); // アイコンを使用するかしないかを 0 か 1 で、決めて定数にする。

//アイコンを入れるディレクトリ
define('DE_IMG_DIR', './img/'); // アイコンを入れるディレクトリを指定して定数にする

//アイコン画像と名前はペアになるように書く
$icons[0] = '0.gif';		$names[0] = 'aaa'; // $icons 配列には、画像ファイルを、$names 配列には、名前を代入する。[ ] 内の数値はペアになるようにする。[ ] 内の数値は0から開始。


//----------------------------------------------------------
//画像アップロード
//----------------------------------------------------------
// 画像アップロードの使用 1:使用する 0:使用しない
define('DE_UP_USE', 1); // アップロードを使用する場合は 1、使用しない場合は 0 に設定する。

// アップロード用ディレクトリ ※http://～からはダメ
define('DE_UP_DIR', './img/'); // アップロードした画像を入れるディレクトリ

// アップロード用ディレクト ※特殊サーバはhttp://～
define('DE_UP_DIR2', './img/'); // アップロードした画像を入れるディレクトリ2


////////////////////////////////////////////////////////////
//
//処理の分岐
//
////////////////////////////////////////////////////////////


if ($_POST['mode'] == "log_write") { _set_cookie(); _log_write(); } // データをログに書き込む前に、クッキーを送信する必要があるため _log_write 関数の前に _set_cookie 関数を呼び出す。

elseif ($_GET['mode'] == "res") _res_form_page(); // モード mode が res のときは、_res_form_page 関数を呼び出す。

elseif ($_POST['mode'] == "log_delete") _log_delete(); // $_POST['mode'] が log_delete の時に _log_delete 関数を呼び出す。

elseif ($_GET['mode'] == "sample") _icon_sample(); // $_GET['mode'] が sample のとき _icon_sample 関数を呼び出す。

_top_page(); // 処理モードの指定がない時（デフォルト時とか）は、_top_page という関数を呼び出す


////////////////////////////////////////////////////////////
//
//関数
//
////////////////////////////////////////////////////////////


//----------------------------------------------------------
//トップページ
//----------------------------------------------------------
function _top_page() // _top_page という名前の関数
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
		
			// array_unshift($ko, $value); // 配列 $ko の先頭に、レスデータを追加する。
			if (!in_array($res_no, $oya_no)) $oya_no[] = $res_no; // もし、親番号配・・$oya_no に、$res_no がなければ、$oya_no 配列の最後に $res_no を代入する。
		
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
	if ($oya[0] != "") $str = _kiji_show($oya, $ko); // 親記事が空でなければ、_kiji_show 関数に、$oya と $ko の引数を渡して、戻り値を $str に代入する。
	
	// 削除用
	if ($oya[0] != ""){
		$str .= '<br><br><br><table cellpadding="2" cellspacing="0"><tr><td>';
		$str .= '<form action="'.DE_SELF.'" method="POST">'; // PHPプログラムのパス DE_SELF へ POST送信で送ります。
		$str .= '<input type="hidden" name="mode" value="log_delete">'; // モード mode を log_delete にして隠し要素で送ります。
		$str .= '削除用番号 <input type="text" name="no" size="4"> '; // ログ番号の入力欄です。名前は no にする。
		$str .= '削除用パスワード <input type="password" name="pass" size="8"> '; // パスワードの入力欄です。名前は pass にする。
		$str .= '<input type="submit" value="削除" class="bu">'; // 送信ボタンです。
		$str .= '</td></tr></table></form>';
	}
	
	// 投稿フォームと記事を表示
	echo DE_HEADER._form_show().$str.DE_FOOTER; // DE_HEADER（ヘッダー）と、_form_show 関数と、$str と、DE_FOOTER（フッター）を連結してから、ブラウザ上に表示
	exit; // PHPの処理を終了
}



//----------------------------------------------------------
//投稿フォ・E[ム
//----------------------------------------------------------
function _form_show($res_title="", $hidden="")
{
	if (DE_UP_USE) $enctype = ' enctype="multipart/form-data"'; // もし DE_UP_USE が 1 でアップロード機能を使用する設定なら enctype="multipart/form-data" を $enctype に代入する。
	
	// テーブル最初
	$str = '<table cellpadding="2" cellspacing="0">'."\n";
	
	$str .= '<form action="'.DE_SELF.'" method="POST"'.$enctype.'>'."\n"; // form タグ内の、action には、PHPプログラムのパス DE_SELF を書きます。POST で送信したいので、method="POST" にする。ファイルをアップロードするには、<form> 内に $enctype を指定する必要があります。
	$str .= '<input type="hidden" name="mode" value="log_write">'."\n"; // こっそりと値を送りたい時は、type="hidden" にする。name="mode" は、名前を mode にする。value="log_write" は、値を log_write にする。
	
	// クッキー取得
	$v = _get_cookie(); // _get_cookie関数でクッキーを取得して $v に代入する。
	
	$str .= $hidden; // レス記事であることを示す隠し要素 $hidden と $str を連結する。
	
	//名前
	//1行用の入力欄は、type="text" です。入力欄の長さを、size="40" にする。名前用の入力欄なので、名前を、name にする。
	//名前欄にクッキーで取得した $v['name'] を表示する。
	
	$str .= '<tr><td align="right" onMouseover="mOver(0)" onMouseout="mOut()" bgcolor="#ffffff">
	<div align="right">名前</font><font color="#ff0000">(必須)<input type="text" name="name" size="40" value="'.$v['name'].'"></div>
	<div style="position:absolute;">

	<div id="css0"
	style="display:none;
	background-color:#ffffff;
	font-size:12px;
	width:150px;
	position:relative;left:395px;top:-20px;
	border-style:solid;
	border-color:#555555;
	border-width:2px 2px 2px 2px;">
	<div align="left">

	(例)ヘルメス太郎

	</div></div></div>
	</td></tr>'."\n";


	// 題名
	// 題名用の入力欄なので、名前を、title にする。題名の入力欄に、レスタイトル $res_title の値を表示させます。
	$str .= '<tr><td align="right" onMouseover="mOver(1)" onMouseout="mOut()" bgcolor="#ffffff">
	<div align="right">題名<input type="text" name="title" size="40" value="'.$res_title.'" ></div>
	<div style="position:absolute;">

	<div id="css1"
	style="display:none;
	background-color:#ffffff;
	font-size:12px;
	width:150px;
	position:relative;left:395px;top:-20px;
	border-style:solid;
	border-color:#555555;
	border-width:2px 2px 2px 2px;">
	<div align="left">

	(例)【あげます】富士通　ノートパソコン

	</div></div></div>
	</td></tr>'."\n";


	// メールアドレス
	// メール用の入力欄なので、名前を、email にする。メールアドレス欄にクッキーで取得した $v['email'] を表示する。
	$str .= '<tr><td align="right" onMouseover="mOver(2)" onMouseout="mOut()" bgcolor="#ffffff">
	<div align="right">メール<input type="text" name="email" size="40" value="'.$v['email'].'"></div>
	<div style="position:absolute;">

	<div id="css2"
	style="display:none;
	background-color:#ffffff;
	font-size:12px;
	width:150px;
	position:relative;left:395px;top:-20px;
	border-style:solid;
	border-color:#555555;
	border-width:2px 2px 2px 2px;">
	<div align="left">

	(例)taro@hermes.ne.jp

	</div></div></div>
	</td></tr>'."\n";
	

	//本文
	//複数行の入力欄は、<textarea>～</textarea> です。横幅のサイズを、cols="42" にする。
	//縦幅のサイズを、rows="5" にする。コメント用の入力欄なので、名前を、mes にする。
	

	$str .= '<tr><td align="right" onMouseover="mOver(3)" onMouseout="mOut()" bgcolor="#ffffff">
	<div align="right">本文<font color="#ff0000">(必須)</font><textarea name="mes" cols="42" rows="5" wrap="soft"></textarea></div>
	<div style="position:absolute;">


	<div id="css3"
	style="display:none;
	background-color:#ffffff;
	font-size:12px;
	width:150px;
	position:relative;left:395px;top:-75px;
	border-style:solid;
	border-color:#555555;
	border-width:2px 2px 2px 2px;">
	<div align="left">
	(例)新しくノートパソコンを買うことにしたので、必要な方がいたらあげます。
	・メーカー：富士通<br>
	・品名：LIFEBOOK A574/HX<br>
	・型番：FMVA 05010P<br>
	・スペック: <br>
	　OS:Windows7 Professional 32bit<br>
	　CPU:Core i3-4000M 2.4GHz<br>
	　メモリ：4GB<br>
	
	</div></div></div>
	</td></tr>'."\n";


	// アップロード
	// もし DE_UP_USE が 1 なら、ファイル用入力欄を表示する。名前は upfile
	if (DE_UP_USE) $str .= '<tr><td align="right" onMouseover="mOver(4)" onMouseout="mOut()" bgcolor="#ffffff">
	<div align="right">投稿する画像ファイル<input type="file" name="upfile" size="40"></div>
	<div style="position:absolute;">

	<div id="css4"
	style="display:none;
	background-color:#ffffff;
	font-size:12px;
	width:150px;
	position:relative;left:395px;top:-20px;
	border-style:solid;
	border-color:#555555;
	border-width:2px 2px 2px 2px;">
	<div align="left">
		投稿画像を自分のPCの<br>
		中から参照してください<br>
		<br>
		上限<br>
		・1MB<br>
		画像形式<br>
		・JPG,GIF,PNG<br>
		<br>
		にして下さい
	</div></div></div>
	</td></tr>';


	// 文字色
	// _color_select 関数を呼び出して $str と連結。_color_select 関数に、クッキーで取得した $v['color'] を渡する。

	$str .= '<tr><td align="right" onMouseover="mOver(5)" onMouseout="mOut()" bgcolor="#ffffff">
	<div align="right">本文の文字色'._color_select($v['color']).'</div>
	<div style="position:absolute;">

	<div id="css5"
	style="display:none;
	background-color:#ffffff;
	font-size:12px;
	width:150px;
	position:relative;left:395px;top:-20px;
	border-style:solid;
	border-color:#555555;
	border-width:2px 2px 2px 2px;">
	<div align="left">
	本文の色を選択してください<br>
	</div></div></div>
	</td></tr>'; 


	// パスワード
	// パスワード用の入力欄は、type="password" です。パスワード用の入力欄なので、名前を、pass にする。
	// パスワード欄にクッキーで取得した $v['pass'] を表示する。

	$str .= '<tr><td align="right" onMouseover="mOver(6)" onMouseout="mOut()" bgcolor="#ffffff">
	<div align="right">投稿内容にかけるパスワード<font color="#ff0000">(必須)</font><input type="password" name="pass" size="8" value="'.$v['pass'].'"></div>
	<div style="position:absolute;">

	<div id="css6"
	style="display:none;
	background-color:#ffffff;
	font-size:12px;
	width:150px;
	position:relative;left:395px;top:-20px;
	border-style:solid;
	border-color:#555555;
	border-width:2px 2px 2px 2px;">
	<div align="left">
	記事にパスワードをかけてください<br>
	(例) 1234
	</div></div></div>
	'; 

	// 送信ボタン
	// 送信ボタンは、type="submit" です。value="送信する" で、ボタン上に 「送信する」 が表示されます
	if ($_GET['mode'] == "res"){
		$str .= '<div align="right"><input type="submit" value="返信する" class="bu"></td></tr></div>'."\n";
	}else{
		$str .= '<div align="right"><input type="submit" value="記事作成" class="bu"></td></tr></div>'."\n";
	}

	// テーブル最後
	$str .= '</form></table><br><br><br>'."\n\n";

	return $str; // return で、$str の値を、関数呼び出し元に返す。
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
	list($no,$res_no,$name,$title,$email,$hp,$mes) = explode('<>', $log[0]); // 最新ログ $log[0] を、<> で分割して、各値を変数に代入する。
	if ($f['name']==$name && $f['mes']==$mes) _error_page('二重投稿は禁止です', $lock_flag); // もし 投稿フォームから送られてきた名前 $f['name'] と、最新ログの名前 $name が同じで、投稿フォームから送られてきたコメント $f['mes'] と、最新ログのコメント $mes が同じなら、エラーを表示する。
	
	// ログ番号
	$no++; // 最新ログの番号 $no に 1 を足する。
	
	// 投稿日時の取得
	$time = date("Y/m/d H:i (D)"); // 現在時刻（1156860130 のような数値）・A表・ｦし・ｽい形式 "Y/m/d H:i (D)" にして $time に代入する。
	
	// パスワードを暗号化する
	$pass_ango = _pass_ango($_POST['pass']); // _pass_ango関数に、$_POST['pass'] を渡して暗号化された文字列を $pass_ango に入力する。
	
	// 画像アップロード
	if ($_FILES['upfile']['size']) list($upfile,$w,$h) = _upfile_write($no, $lock_flag); // もし、アップロードファイルのサイズ $_FILES['upfile']['size'] があれば、_upfile_write 関数を呼び出す。引数 $no と $lock_flag を渡して、戻り値を $upfile、$w、$h に代入
	
	// 投稿データを連結
	$plus = implode('<>',array($no,$_POST['res_no'],$f['name'],$f['title'],$f['email'],$f['hp'],$f['mes'],$pass_ango,$time,$f['color'],$f['icon'],$upfile,$w,$h,$ip,$host,"\n")); // 投稿された各データを、array で配列にして <> で連結して文字列にしてから、$plus に代入する。投稿フォームから送られてきた色データ $f['color'] を追加。暗号化されたパスワード $pass_ango をデータに追加する。
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
// ・Gラーページ
//----------------------------------------------------------
function _error_page($str, $lock_flag=0) // _error_page 関数の呼び出し元で指定した引数（DE_LOGFILE.'に書き込めません'）を、$str で受け取っています。$lock_flag = 0 は、関数呼び出し元で、２番目の引数が省略された時だけ、$lock_flag に 0 を代入する。
{
	if ($lock_flag) $lock_flag = _unlock(); // もし、$lock_flag が 1 なら、_unlock 関数を呼び出して、ロックファイル を削除する。そして、$lock_flag に、_unlock 関数の戻り値 0 を代入する。
	
	echo DE_HEADER.'<br><br><h3>'.$str.'</h3>'.DE_FOOTER; // $str のエラーメッセージをブラウザに表示する。
	exit; // PHPの処理を終了する。
}


//----------------------------------------------------------
//記事表示
//----------------------------------------------------------
function _kiji_show($oya,$ko) // _kiji_show 関数呼び出し元で渡した引数を、$log で受け取っています。関数呼び出し元が渡した引数を、$oya と $ko で受け取っています。
{
	$str = ""; // $str を初期化する。
	
	// ページ分割
	$oya_per = array_chunk($oya, 5); // 親記事配列 $oya を 5 個ずつに分割して、$oya_per に代入する。
	
	// ページ総数
	$page_all = count($oya_per); // $oya_per 配列の個数を調べて、ページ総数 $page_all に代入する。

	// 現在のページ
	$now_page = ($_GET['page']) ? $_GET['page'] : 0; // もし $_GET['page'] の値があれば、$_GET['page'] を、なければ 0 を、現在のページ $now_page に代入する。
	
	// データの存在チェック
	if ($oya_per[$now_page][0] == "") $now_page = 0; // ありえないページ数 10000 とかの数値が送られてきた場合のために、$oya_per[$now_page][0] というデータが存在するか調べて、存在しなければ、現在のページ $now_page を 0 にする。

	// ログを表示
	foreach ($oya_per[$now_page] as $value) { // $log 配列の個数回分の処理を繰り返す。$value には、配列の各要素が入ります。これまでは、親記事もレス記事もまとめた $log をループしてましたが、親記事 $oya だけをループ・ｷるようにする。$oya_per[$now_page] 配列の個数回分繰り返す。
	
		// 外テーブルはじめ
		$str .= '<table width="400" cellpadding="12" cellspacing="1" bgcolor="black">'; // テーブルの幅を 400 にして、外枠を 黒色 にする。
		$str .= '<tr><td bgcolor="white" align="right">'; // テーブルの背景色を、白色 にする。
		
		// 分解
		list($no,$res_no,$name,$title,$email,$hp,$mes,$pass,$time,$color,$icon,$upfile,$w,$h,$ip,$host) = explode('<>', $value); // $value を、<> で分割して、各変数に値を代入する。
		
		// テーブル
		$str .= _table($no,$res_no,$name,$title,$email,$hp,$mes,$time,$color,$icon,$upfile,$w,$h); // _table 関数に、複数の引数を渡し、_table 関数からの戻り値を、$str と連結する。
		
		// レス記事
		foreach ($ko as $value2) { // レス記事 $ko をループする。親データと、レスデータが混合しないように、親データを $value、レスデータを $value2 にする。
		
			// 分解
			list($no2,$res_no2,$name2,$title2,$email2,$hp2,$mes2,$pass2,$time2,$color2,$icon2,$upfile2,$w2,$h2,$ip2,$host2) = explode('<>', $value2); // レスデータ $value2 を <> で分割して、各値を変数に代入する。親記事の変数と混合しないように、変数名の最後に 2 をつけています。
			
			// テーブル
			if ($no == $res_no2) $str .= _table($no2,$res_no2,$name2,$title2,$email2,$hp2,$mes2,$time2,$color2,$icon2,$upfile2,$w2,$h2); // もし親記事番号 $no と レス番号 $res_no2 が同じなら、_table 関数を呼び出して、戻り値を $str と連結する。
		}
		
		// 外テーブル終わり
		$str .= '</td></tr></table><br><br><br>'."\n\n"; // テーブルの終わり部分です。
	}
	// 移動リンク
	if ($page_all > 1) { // ページ総数 $page_all が 1 より大きければ、処理をする。
		$str .= _page_link($now_page, $page_all); // _page_link 関数に、現在のページ $now_page と ページ総数 $page_all の引数を渡して、戻り値を $str と連結する。
	}
	return $str; // $str を、関数呼び出し元に返す。
}


//----------------------------------------------------------
//記事テーブル
//----------------------------------------------------------
function _table($no,$res_no,$name,$title,$email,$hp,$mes,$time,$color,$icon,$upfile,$w,$h) // 関数呼び出しもとの引数（$no, $res_noなど）を受け取っています。
{
	global $colors,$icons; // $colors を _table 関数内で使えるように global 宣言。初期設定で指定した $icons が _table 関数内で使え・驍謔､に global 宣言する。
	
	// テーブル幅
	$width = (!$res_no) ? "100%" : "90%"; // 親記事ならテーブル幅を 100% に、レス記事なら 90% を $width に代入する。
	
	$str = '<table width="'.$width.'" cellpadding="4" cellspacing="0">'."\n"; // テーブル幅を、変えられるように width の値を、変数 $width にする。
	
	// レスリンク
	if (!$res_no) $res_link = ' <a href="'.DE_SELF.'?mode=res&no='.$no.'"><font color="red">[返信を全て表示]</font></a>'; // もしレス番号 $res_no がなければ親記事と判断し、レスリンクを $res_link に代入する。
	
	// 区切り線
	else $str .= '<tr><td><hr size="1" color="black" noshade></td></tr>'; // レス記事の時だけ、区切り線を表示する。
	
	// 文字色
	$font = '<font color="'.$colors[$color].'">'; // 各記事は、ユーザーが選択した文字色になります
	
	// 題名
	$str .= '<tr><td><b>'.$font.$title.'</b>'.$res_link.'</font></td></tr>'."\n"; // 題名 $title を太字で表示する。題名の後ろに、レスリンクを表示する。
	
	
	// アップロード画像
	if (DE_UP_USE && $upfile!="") { // DE_UP_USE が 1 でアップロードを使用する設定で、アップしたファイル $upfile が空でなければ処理をする。
	
	// 横幅が100より大きい場合
		if ($w > 100) { // 画像の幅 $w が 100 より大きいとき処理をする。
			$ritu = 100 / $w; // 100 割る $w の値を 率 $ritu に代入する。
			$w = 100; // 横幅は常に 100 になるので $w には 100 を代入する。
			$h = floor($ritu * $h); // $ritu × $h の小数点以下を切り捨てた値を、新しい高さ $h に代入する。
		}
	
		$up_path = DE_UP_DIR2.$upfile; // DE_UP_DIR2 と $upfile を連結した、画像のパスを $up_path に代入する。
		$icon_show = '<a href="'.$up_path.'" target="_blank">'; // 画像にリンクを貼ったものを $icon_show に代入する。
		$icon_show .= '<img src="'.$up_path.'" width="'.$w.'" height="'.$h.'" hspace="8" vspace="4" align="left" border="0"></a>'; // img タグに、$up_path と幅 $w と高さ $h を指定する。
		
	// アイコン
	} elseif (DE_ICON_USE) { // もしアイコンを使用する設定なら処理をする。
		$icon_show = '<img src="'.DE_IMG_DIR.$icons[$icon].'" align="left">'; // img タグにアイコンパスを指定した・烽ﾌ・・$icon_show に代入する。
	}
	
	// アイコン
	if (DE_ICON_USE) $icon_show = '<img src="'.DE_IMG_DIR.$icons[$icon].'" align="left">'; // アイコンを使う設定なら、img タグにアイコンパスを指定して $icon_show に代入する。
	
	
	// コメント
	$str .= '<tr><td>'.$icon_show.$font.$mes.'</font></td></tr>'."\n"; // コメント $mes を表示する。コメントの前に アイコン $icon_show を表示する。
	
	// メールリンク
	if ($email != "") $email_link = ' <a href="mailto:'.$email.'"><font color="red">[メール]</font></a>'; // メール $email が空でなければ、メールリンクを、$email_link に代入する。
	
	// ホームリンク
	if ($hp != "") $hp_link = ' <a href="http://'.$hp.'" target="_blank"><font color="red">[ホーム]</font></a>'; // ホームページ $hp が空でなければ、HPリンクを、$hp_link に代入する。
	
	// 番号・名前
	$str .= '<tr><td align="right"><small>'.$font."削除用番号".'['.$no.']'."　".$name; // ログ番号 $no 、名前 $name を小文字で表示する。
	
	// メールリンク・ホームリンク・日付
	$str .= '<nobr>'.$email_link.$hp_link.'</nobr><br>'.$time.'</font></small></td></tr></table>'."\n"; // メールリンク $email_link、HPリンク $hp_link、日付 $time を表示する。
	return $str; // $str を呼び出し元に返す。
}


//----------------------------------------------------------
//書き込みチェック
//----------------------------------------------------------
function _write_check(&$f) // 関数呼び出し元で渡した引数を、$f で受け取って「参照渡し」にする。
{
	// 名前なし
	if ($f['name'] == "") _error_page('「名前」を記入してください'); // 「名前」が未記入のときは、エラーを出す。
	
	// 題名なし
	if ($f['title'] == "") $f['title'] = 'ノータイトル'; // 「題名」が未記入のときは、$f['title'] に、「ノータイトル」を代入する。
	
	// コメントなし
	if ($f['mes'] == "") _error_page('「コメント」を記入してください'); // ・uコメント」が未記入のときは、エラーを出す。
	
	// パスワードなし
	if ($_POST['pass'] == "") _error_page('「パスワード」を記入してください'); // 「パスワード」が未記入のときは、エラーを出す。
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
		
		// ホームURLのhttp://をはずす
		if ($key == "hp") $value = str_replace("http://", "", $value); // もし、$key が、ホームページ hp なら、$value から、http://部分を取り除いて、$value に代入する。
		$str[$key] = $value; // きれいにした $value を、$str[$key] に代入する。
	}
	return $str; // $str を関数呼び出し元に返す。
}


//----------------------------------------------------------
//ロック
//----------------------------------------------------------
function _lock()
{
	// トライ回数
	$try = 5; // $try トライ回数を、5回にする。
	
	// 10分たっていたら削除
	if (file_exists(DE_LOCKFILE)) { // もし、ロックファイル DE_LOCKFILE が・ｶ在していたら、処理を行います。
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
//レス投稿フォーム
//----------------------------------------------------------
function _res_form_page()
{
	// 初期化
	$find_flag = 0; // $find_flag を、0 で初期化する。
	$oya = $ko = array(); // 配列 $oya と $ko を初期化する。
	
	// ログ読み込み
	$log = @file(DE_LOGFILE); // ログファイル DE_LOGFILE の内容を読み込んで、$log に代入する。
	
	foreach ($log as $value) { // $log の個数回分、処理を繰り返す。
		list($no,$res_no,$name,$title,$email,$hp,$mes,$pass,$time,$color,$icon,$upfile,$w,$h,$ip,$host) = explode('<>', $value); // 各データ $value を、<> で分割して、各値を変数に代入する。
		
		// レス番号が一致した・・
		if ($_GET['no'] == $res_no) array_unshift($ko, $value); // $_GET['no'] とレス番号 $res_no が一致したら、$ko の先頭に、レスデータ $value を代入する。
		
		// 番号が一致したら
		elseif ($_GET['no'] == $no) { // 探し・ｽ・｢親記事データが見つかれば、処理を行います。$_GET['no'] と親番号 $no が一致したら処理を行います。
		
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
	
	// 投稿フォーム
	$str = _form_show($res_title, $hidden); // 投稿フォームを作成する関数 _form_show に引数 $res_title と $hidden を渡して、戻り値を $str に代入する。
	
	// 該当記事
	$str .= _kiji_show($oya, $ko); // _kiji_show 関数に、親記事 $oya とレス記事 $ko を渡して、戻り値を $str と連結する。
	
	// 削除用
	$str .= '<br><br><br><table cellpadding="2" cellspacing="0"><tr><td>';
	$str .= '<form action="'.DE_SELF.'" method="POST">'; // PHPプログラムのパス DE_SELF へ POST送信で送ります。
	$str .= '<input type="hidden" name="mode" value="log_delete">'; // モード mode を log_delete にして隠し要素で送ります。
	$str .= '削除用番号 <input type="text" name="no" size="4"> '; // ログ番号の入力欄です。名前は no にする。
	$str .= '削除用パスワード <input type="password" name="pass" size="8"> '; // パスワードの入力欄です。名前は pass にする。
	$str .= '<input type="submit" value="削除" class="bu">'; // 送信ボタンです。
	$str .= '</td></tr></table></form>';
	
	// ブラウザに表示
	echo DE_HEADER.$str.DE_FOOTER; // ブラウザに $str を表示する。
	exit; // PHPの処理を終了する。
}


//----------------------------------------------------------
//移動リンク
//----------------------------------------------------------
function _page_link($now_page,$page_all) // 関数呼び出し元で渡した引数を、$now_page と $page_all で受け取っています。
{
	$str = "";
	
	
	
	// 戻る
	if ($now_page) { // もし現在のページ $now_page が 1 以上なら、処理をする。
		$str .= '<a href="'.DE_SELF.'?page='.($now_page-1).'">[前のページ]</a> '; // ページ page の値を、現在のページ $now_page から 1 を引いた数値にする。「BACK」リンクを $str と連結する。
	}
	
	// 次へ
	if ($now_page < $page_all-1) { // もし現在のページ $now_page が 全てのページ数 $page_all -1 より小さければ、処理をする。
		$str .= ' <a href="'.DE_SELF.'?page='.($now_page+1).'">[次のページ]</a>'; // ページ page の値を、現在のページ $now_page に 1 を足した数値にする。「NEXT」リンクを $str と連結する。
	}
	
	return $str; // $str を関数呼び出し元に返す。
}



//----------------------------------------------------------
//文字色選択
//----------------------------------------------------------
function _color_select()
{
	global $colors; // 「初期設定」の所で指定した、$colors を _color_select 関数内で使えるように、global 宣言
	
	$str = ""; // $str を初期化
	for($i=0; $i<count($colors); $i++) { // $colors の個数回分ループ
		$checked = ($i == 0) ? " checked" : ""; // $i が 0 の時 " checked" を、$i が 0 以外なら "" を $checked に代入
		$str .= ' <input type="radio" name="color" value="'.$i.'" class="nob"'.$checked.'>'; // 色選択の radio ボタンに各値 $i を設定
		$str .= '<font color="'.$colors[$i].'">●</font>'; // ●にそれぞれ色 $colors[$i] をつけて表示
	}
	return $str; // $str を関数呼び出し元に返す
}


//----------------------------------------------------------
//アイコン選択
//----------------------------------------------------------
function _icon_select()
{
	global $names; // 「初期設定」で指定した $names を関数内で使えるように global 宣言する
	
	$str = '<select name="icon">'; // <select> の名前を icon にする。
	for($i=0; $i<count($names); $i++) { // $names の個数回分ループ
		$selected = ($i == 0) ? " selected" : ""; // $i が 0 のときは、" selected" を、それ以外なら "" を $selected に代入
		$str .= '<option value="'.$i.'"'.$selected.'>'.$names[$i]; // option 値には、$i を設定する。ブラウザに表示される部分は $names[$i] です。
	}
	$str .= '</select>';
	
	// アイコンサンプルリンク
	$str .= ' <a href="'.DE_SELF.'?mode=sample" target="_blank">サンプル→</a>'; // サンプルリンクを $str と連結する。
	return $str; // $str を関数呼び出し元に返す。
}


//----------------------------------------------------------
//アイコンサンプル
//----------------------------------------------------------
function _icon_sample()
{
	global $icons,$names; // 初期設定のところで指定した、$icons と $names を _icon_sample 関数内で使えるように global 宣言する。
	$icon_all = count($icons); // $icons の数を数えて $icon_all に代入する。
	$td = 4; // 横に並べる個数を $td に代入する。
	$tr = ceil($icon_all/$td); // アイコン総数 $icon_all 割る 横に並べる個数 $td の小数点を切り上げた数値を $tr に代入する。
	$k = 0; // $k を初期化する。
	
	$str = '<table cellpadding="10" cellspacing="0">';
	for($i=0; $i<$tr; $i++) { // $tr の個数回分ループする。
		$str .= '<tr align="center" valign="bottom">'; // <tr> の最初部分を $str と連結する。
		for($j=0; $j<$td; $j++) { // $td 個数回分ループする
			if ($k < $icon_all) { // もし $k が、アイコン総数 $icon_all より小さければ処理をする。
				$str .= '<td><img src="'.DE_IMG_DIR.$icons[$k].'" vspace="5"><br>'.$names[$k].'</td>'; // imgタグにアイコンパスを記述して $str と連結する。
			} else { // もし $k が、アイコン総数 $icon_all より大きければ処理をする。
				$str .= '<td> </td>'; // アイコンが存在しないので &nbsp; を $str と連結する。
			}
			$k++; // $k に 1 を足する。
		}
		$str .= '</tr>'."\n"; // <tr> の最後部分を $str と連結する。
	}
	$str .= '</table>'."\n";
	
	echo DE_HEADER.$str.DE_FOOTER; // $str をブラウザに表示する。
	exit; // PHPを終了する。
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
		list($no,$res_no,$name,$title,$email,$hp,$mes,$pass,$time,$color,$icon,$upfile,$w,$h,$ip,$host) = explode('<>', $value); // 各ログデータ $value を <> で分割して、各値を変数に代入する。

		if ($_POST['no'] == $no) { // もし $_POST['no'] と $no が同じなら処理をする。

			$find_flag = 1; // データが見つかった印として $find_flag に 1 を代入する
			
			// パスワードチェック
			if ($_POST['pass'] == DE_PASS || _pass_ango($_POST['pass']) == $pass) $ok = 1;  // $_POST['pass'] と 管理者パスワード DE_PASS が同じか、$_POST['pass'] と $pass が同じなら、$ok に 1 を代入する。パスワード欄に入力された $_POST['pass'] を暗号化したものと、ログに保存されていた $pass が一致すれば処理をする。 
			else _error_page('パスワードが違います', $lock_flag); // もしパスワードが一致しなければ、_error_page関数を呼び出す。
			
			// 親記事？
			if (!$res_no) $oya_flag = 1; // もしレス番号 $res_no がなければ、$oya_flag に 1 を代入する。
			
			// 削除
			array_splice($log, $key, 1); // $log の $key の位置から、1個分削除する。
			
			if ($upfile && file_exists(DE_UP_DIR.$upfile)) unlink(DE_UP_DIR.$upfile); // $upfile が空でなくて、アップロードしたファイル DE_UP_DIR.$upfile が存在すれば、削除する。
			
			break; // 配列を抜けます。
		}
	}

	// 記事が見つからなかっ・ｽ場合
	if (!$find_flag) _error_page($_POST['no'].'番のデータは見つかりませんでした', $lock_flag); // $find_flag が 0 の時、「記事が見つからなかった」というエラーを表示する。
	
	// 親記事を削除した場合レス記事も削除する
	if ($oya_flag) { // もし $oya_flag が 1 なら処理をする。
		$temp = array(); // $temp 配列を初期化する。
		foreach ($log as $value) { // $log の個数回分ループする。
			list($no,$res_no,$name,$title,$email,$hp,$mes,$pass,$time,$color,$icon,$upfile,$w,$h,$ip,$host) = explode('<>', $value); // 各ログデータ $value を <> で分割して、各値を変数に代入する。
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


//----------------------------------------------------------
//アップロードファイル作成
//----------------------------------------------------------
function _upfile_write($no,$lock_flag) // 関数呼び出し元で渡した引数を $no と $lock_flag で受け取っています。
{
	// 許容サイズチェック
	if ($_FILES['upfile']['size'] > 1024000) _error_page('画像ファイルサイズが1024000バイトを超えています', $lock_flag); // アップロードされたファイルのサイズ $_FILES['upfile']['size'] が 102400 バイトを超えたら、_error_page関数を呼び出してエラーを表示する。
	
	// 拡張子チェック
	$ok['gif'] = '.gif'; // $ok['gif'] に '.gif'を、$ok['png'] に '.png'を、$ok['jpeg'] に '.jpg' を代入する。
	$ok['png'] = '.png';
	$ok['jpeg'] = '.jpg';
	
	$ok_flag = 0; // $ok_flag を初期化
	foreach ($ok as $key => $value) { // $ok 配列の個数回分ループ
		if (stristr($_FILES['upfile']['type'], $key)) { // もしアップロードされたファイルのタイプ $_FILES['upfile']['type'] に、$key が含まれていたら、処理をする。
			$ok_flag = 1; // $ok_flag に 1 を代入
			$upfile_name = 'img_'.$no.$value; // アップロードされた画像名を、'img_' + ログ番号 + 拡張子 にしたものを $upfile_name に代入
			if (!@move_uploaded_file($_FILES['upfile']['tmp_name'], DE_UP_DIR.$upfile_name)) { // アップロードされたファイル $_FILES['upfile']['tmp_name'] を アップロード用ディレクトリ DE_UP_DIR 内に $upfile_name の名前で移動する。
				_error_page('画像のアップロードに失敗しました', $lock_flag); // 失敗したら _error_page 関数を呼び出して、エラーを表示する。
			}

			//画像サイズの取得
			list($w,$h) = getimagesize(DE_UP_DIR.$upfile_name); // 画像の横幅と高さを求めて、$w と $h に代入する。
			return array($upfile_name,$w,$h); // アップロード画像名 $upfile_name と 幅 $w と 高さ $h を配列にして、関数呼び出し元に返す。
		}
	}
	if (!$ok_flag) _error_page('許可されていないファイル形式です', $lock_flag); // $ok_flag が 0 の時は、不正なファイルがアップロードされたとみなして、_error_page 関数を呼び出してエラーを表示する。
}


//----------------------------------------------------------
//パスワード暗号化
//----------------------------------------------------------
function _pass_ango($str) // 関数呼び出し元で渡したパスワードを $str で受け取っています。
{
	return substr(md5($str), 0, 8); // $str を暗号化して、0番目から8個分を返す。
}


//----------------------------------------------------------
//セットクッキー
//----------------------------------------------------------
function _set_cookie()
{
	$f = _form_check($_POST); // $_POST ・fータの値を _form_check 関数できれいにしてから $f に代入する。
	$c['name'] = $f['name']; // 名前 $f['name'] を $c['name'] に代入する。
	$c['email'] = $f['email']; // メール $f['email'] を $c['email'] に代入する。
	$c['hp'] = $f['hp']; // HP $f['hp'] を $c['hp'] に代入する。
	$c['pass'] = $_POST['pass']; // パスワード $_POST['pass'] を $c['pass'] に代入する。
	$c['color'] = $f['color']; // 文字色 $f['color'] を $c['color'] に代入する。
	$c['icon'] = $f['icon']; // アイコン $f['icon'] を $c['icon'] に代入する。
	$cook_value = implode('<>', $c); // クッキー配列 $c を <> で連結して文字列にしてから、$cook_value に代入する。
	$cook_expire = time()+60*60*24*30*3; // 現在の時刻 time() に 60秒（1分）×60分（1時間）×24時間（1日）×30日（1ヶ月）×3ヶ月を足した数値を $cook_expire に代入する。
	setcookie(DE_COOKIE_NAME, $cook_value, $cook_expire); // クッキーを送信する。
}


//----------------------------------------------------------
//ゲットクッキー
//----------------------------------------------------------
function _get_cookie()
{
	// list($c['name'],$c['email'],$c['hp'],$c['pass'],$c['color'],$c['icon']) = explode('<>', $_COOKIE[DE_COOKIE_NAME]); // クッキーデータを $_COOKIE[DE_COOKIE_NAME] で取得し、<> で分割し、各値を変数に代入する。
	// $f = _form_check($_POST); // 投稿フォームの $_POST データを _form_check 関数できれいにしてから $f に代入する。
	// $c = _form_check($c); // $c 配列を _form_check 関数できれいにしてから $c に代入する。
	// foreach ($c as $key => $value) { // $c 配列の個数回分ループする。
	// 	if ($_POST[$key] != "") $c[$key] = $f[$key]; // もし投稿フォームの入力欄が空でなければ、その値を $c[$key] に代入する。
	// }
	return $c; // $c を関数呼び出し元に返す。
}


?>
