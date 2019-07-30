<?php
        $se = "";

        $english = "";

        $webdesign_somu = "";

        $keiri = "";

        $sogo = "";
	$shimei = "";
	$shimeiKana = "";
	$old = "";
	$gender = "";
	$address = "";
	$tel = "";
	$mailAddress = "";
	$career1 = "";
	$career2 = "";
	$career_state1 = "";
	$career_state2 = "";
	$kihon = "";
	$ouyou = "";
	$ccna = "";
	$oracle = "";
	$ocjp = "";
        $toeic750 = "";
        $toeic800 = "";
        $english_level1 = "";
        $english1 = "";
        $bookkeeping3 = "";
        $bookkeeping2 = "";
	$wish = "";
	$pr = "";
	$_errors = array();
	$check = 0;
	$rireki_cnt;

        //希望職種
        if(!empty($_POST["se"])){ $se = "SE職";$check = 1;}
        if(!empty($_POST["english"])){ $english = "英語職";$check = 1;}
        if(!empty($_POST["webdesign_somu"])){ $webdesign_somu = "webデザイナー 総務職"; $check = 1;}
        if(!empty($_POST["keiri"])){ $keiri = "経理職"; $check = 1;}
        if(!empty($_POST["sogo"])){ $sogo = "総合職"; $check = 1;}
        if($check == 0){
         $_errors[] = "一つ選択してください。";
        }
              
	//氏名
	if(empty($_POST["shimei"]) || trim($_POST["shimei"]) == ""){
		$_errors[] = "氏名が入力されていません。";
	}elseif(mb_strlen($_POST["shimei"], "UTF-8") > 10){
		$_errors[] = "氏名は10文字までで入力して下さい。";
	}else{
		//特定の文字以外は空に置き換える
		//$shimei = preg_replace("/^[A-Za-z0-9_.-]/","", $_POST["shimei"]);
	}
	if(isset($_POST["shimei"])){$shimei = $_POST["shimei"];}

	//かな
	if(empty($_POST["shimeiKana"]) || trim($_POST["shimeiKana"]) == ""){
		$_errors[] = "かなが入力されていません。";
	}elseif(mb_strlen($_POST["shimeiKana"], "UTF-8") >= 20){
		$_errors[] = "かなは20文字までで入力して下さい。";
	}else{
		//特定の文字以外は空に置き換える
		//$shimeiKana = preg_replace("/^[A-Za-z0-9_.-]/","", $_POST["shimeiKana"]);
	}
	if(isset($_POST["shimeiKana"])){$shimeiKana = $_POST["shimeiKana"];}

	//年齢
	if(empty($_POST["old"]) || trim($_POST["old"]) == ""){
		$_errors[] = "年齢が入力されていません。";
	}elseif(mb_strlen($_POST["old"], "UTF-8") > 2){
		$_errors[] = "年齢は2文字までで入力して下さい。";
	}elseif(preg_match("/[^0-9]/", $_POST["old"])){
		$_errors[] = "年齢は数値のみで入力して下さい。";
	}elseif($_POST["old"] < 18 || $_POST["old"] > 59 ){
		$_errors[] = "年齢は18歳～59歳の中から選択して下さい。";
	}else{
		$old = $_POST["old"];
	}

	//性別
	if(empty($_POST["gender"]) || trim($_POST["old"]) == ""){
		$_errors[] = "性別が入力されていません。";
	}elseif(mb_strlen($_POST["gender"], "UTF-8") > 2){
		$_errors[] = "性別は2文字までで入力して下さい。";
	}elseif($_POST["gender"] !== "男性" && $_POST["gender"] !== "女性"){
		$_errors[] = "性別は男性、女性から選択して下さい。";
	}else{
		$gender = $_POST["gender"];
	}

	//住所
	if(empty($_POST["address"]) || trim($_POST["address"]) == ""){
		$_errors[] = "住所が入力されていません。";
	}elseif(mb_strlen($_POST["address"], "UTF-8") > 50){
		$_errors[] = "住所は50文字までで入力して下さい。";
	}else{
		//特定の文字以外は空に置き換える
		//$address = preg_replace("/^[A-Za-z0-9_.-]/","", $_POST["address"]);
	}
	if(isset($_POST["address"])){$address = $_POST["address"];}

	//電話番号
	if(empty($_POST["tel"]) || trim($_POST["tel"]) == ""){
		$_errors[] = "電話番号が入力されていません。";
	}elseif(mb_strlen($_POST["tel"], "UTF-8") > 14){
		$_errors[] = "電話番号は14文字までで入力して下さい。";
	}elseif(!preg_match("/^[0-9]{2,4}-[0-9]{2,4}-[0-9]{3,4}$/", $_POST["tel"])){
		$_errors[] = "電話番号は000-0000-0000形式で入力して下さい。";
	}else{
		//$tel = $_POST["tel"];
	}
    if(isset($_POST["tel"])){$tel = $_POST["tel"];}

	//メールアドレス
	if(empty($_POST["mailAddress"]) || trim($_POST["mailAddress"]) == ""){
		$_errors[] = "メールアドレスが入力されていません。";
	}elseif(mb_strlen($_POST["mailAddress"], "UTF-8") > 50){
		$_errors[] = "メールアドレスは50文字までで入力して下さい。";
	}elseif(!preg_match("/^[^@]+@([-a-z0-9]+\.)+[a-z]{2,}$/", $_POST["mailAddress"])){
		$_errors[] = "メールアドレスはxxxx@xx.xx形式で入力して下さい";
	}else{
		//$mailAddress = $_POST["mailAddress"];
	}
    if(isset($_POST["mailAddress"])){$mailAddress = $_POST["mailAddress"];}

	//学歴1
	if(empty($_POST["career1"]) || trim($_POST["career1"]) == ""){
		$_errors[] = "学歴1が入力されていません。";
	}elseif(mb_strlen($_POST["career1"], "UTF-8") > 50){
		$_errors[] = "学歴1は50文字までで入力して下さい。";
	}else{
		//特定の文字以外は空に置き換える
		//$career1 = preg_replace("/^[A-Za-z0-9_.-]/","", $_POST["career1"]);
	}
	if(isset($_POST["career1"])){$career1 = $_POST["career1"];}

	//学歴1状態
	if(empty($_POST["career_state1"]) || trim($_POST["career_state1"]) == ""){
		$_errors[] = "学歴1状態が選択されていません。";
	}elseif(mb_strlen($_POST["career_state1"], "UTF-8") > 4){
		$_errors[] = "学歴1状態は4文字までで入力して下さい。";
	}else{
		//特定の文字以外は空に置き換える
		//$career_state1 = preg_replace("/^[A-Za-z0-9_.-]/","", $_POST["career_state1"]);
		$career_state1 = $_POST["career_state1"];
	}

	//学歴2
	if(mb_strlen($_POST["career2"], "UTF-8") > 50){
		$_errors[] = "学歴2は50文字までで入力して下さい。";
	}else{
		//特定の文字以外は空に置き換える
		//$career2 = preg_replace("/^[A-Za-z0-9_.-]/","", $_POST["career2"]);
	}
	if(isset($_POST["career2"])){$career2 = $_POST["career2"];}

	//学歴2状態
	if(empty($_POST["career_state2"]) || trim($_POST["career_state2"]) == ""){
		$_errors[] = "学歴2状態が選択されていません。";
	}elseif(mb_strlen($_POST["career_state2"], "UTF-8") > 4){
		$_errors[] = "学歴2状態は4文字までで入力して下さい。";
	}else{
		//特定の文字以外は空に置き換える
		//$career_state2 = preg_replace("/^[A-Za-z0-9_.-]/","", $_POST["career_state2"]);
		$career_state2 = $_POST["career_state2"];
	}

	//基本情報
	if(!empty($_POST["kihon"])) $kihon = "基本情報";

	//応用情報
	if(!empty($_POST["ouyou"])) $ouyou = "応用情報";

	//CCNA
	if(!empty($_POST["ccna"])) $ccna = "CCNA";

	//ORACLE
	if(!empty($_POST["oracle"])) $oracle = "ORACLE";

	//OCJP
	if(!empty($_POST["ocjp"])) $ocjp = "OCJP";

        //TOEIC 750～
        if(!empty($_POST["toeic750"])) $toeic750 = "TOEIC 750～";

        //TOEIC 800～
        if(!empty($_POST["toeic800"])) $toeic800 = "TOEIC 800～";

        //英検 準1級
        if(!empty($_POST["english_level1"])) $english_level1 = "英検 準1級";

        //英検 1級
        if(!empty($_POST["english1"])) $english1 = "英検 1級";

        //簿記 3級
        if(!empty($_POST["bookkeeping3"])) $bookkeeping3 = "簿記 3級";

        //簿記 2級
        if(!empty($_POST["bookkeeping2"])) $bookkeeping2 = "簿記 2級";

	//希望日
	if(empty($_POST["wish"]) || trim($_POST["wish"]) == ""){
		$_errors[] = "希望日が入力されていません。";
	}elseif(mb_strlen($_POST["wish"], "UTF-8") > 30){
		$_errors[] = "希望日は30文字までで入力して下さい。";
	}else{
		//特定の文字以外は空に置き換える
		//$wish = preg_replace("/^[A-Za-z0-9_.-]/","", $_POST["wish"]);
	}
	if(isset($_POST["wish"])){$wish = $_POST["wish"];}

	//PR
	if(mb_strlen($_POST["pr"], "UTF-8") > 500){
		$_errors[] = "PRは500文字までで入力して下さい。";
	}else{
		//特定の文字以外は空に置き換える
		//$pr = preg_replace("/^[A-Za-z0-9_.-]/","", $_POST["pr"]);
	}
	if(isset($_POST["pr"])){$pr = $_POST["pr"];}
	
	//履歴書の一時ファイルをサーバーに保存する場合
	//サーバーにパーミッションを「705」に設定した「upload」フォルダを作成してください！
	//$file = 'upload/'. basename($_FILES['rireki']['name']);
	//move_uploaded_file($_FILES['rireki']['tmp_name'], $file);

	if(count($_errors) == 0){
		//メール送信
		$header = "MIME-Version: 1.0\n";
		$header .= "Content-Transfer-Encoding: 7bit\n";
		//$header .= "Content-Type: text/plain; charset=ISO-2022-JP\n";

		//区切り文字(boundary)の指定
		if(is_uploaded_file($_FILES['rireki']['tmp_name'][0])){
			$header .= "Content-Type: multipart/mixed;boundary=\"__BOUNDARY__\"\n";
		}
		$header .= "Message-Id: <" . md5(uniqid(microtime())) . "saiyo@hermes.ne.jp>\n";
		$header .= "from: saiyo@hermes.ne.jp\n";
		$header .= "Reply-To: saiyo@hermes.ne.jp\n";
		$header .= "Return-Path: saiyo@hermes.ne.jp\n";
		$header .= "X-Mailer: PHP/". phpversion();
		$send = "saiyo@hermes.ne.jp";
		$subject ="採用エントリーからのメール";
		if(is_uploaded_file($_FILES['rireki']['tmp_name'][0])){
			$tmp_mail_body = "--__BOUNDARY__\n\n";
		}
		//$tmp_mail_body. = "Content-Type: text/plain; charset=ISO-2022-JP\n";
		$tmp_mail_body.= "会社HP 採用エントリーページ からメールが送信されています。\n\n";
		$tmp_mail_body.= "■希望職種　\n";
		if($se === "SE職") $tmp_mail_body.= "　SE職\n";
		if($english === "英語職") $tmp_mail_body.= "　英語職\n";
		if($webdesign_somu === "webデザイナー 総務職") $tmp_mail_body.= "　webデザイナー 総務職\n";
		if($keiri === "経理職") $tmp_mail_body.= "　経理職\n";
		if($sogo === "総合職") $tmp_mail_body.= "　総合職\n";
		$tmp_mail_body.= "■氏名　".$shimei."\n";
		$tmp_mail_body.= "■かな　".$shimeiKana."\n";
		$tmp_mail_body.= "■年齢　".$old."\n";
		$tmp_mail_body.= "■性別　".$gender."\n";
		$tmp_mail_body.= "■住所　".$address."\n";
		$tmp_mail_body.= "■電話番号　".$tel."\n";
		$tmp_mail_body.= "■メールアドレス　".$mailAddress."\n";
		$tmp_mail_body.= "■学歴1　".$career1." ".$career_state1."\n";
		$tmp_mail_body.= "■学歴2　".$career2." ".$career_state2."\n";
		$tmp_mail_body.= "■取得資格　\n";
		if($kihon==="基本情報") $tmp_mail_body.= "　基本情報\n";
		if($ouyou==="応用情報") $tmp_mail_body.= "　応用情報\n";
		if($ccna==="CCNA") $tmp_mail_body.= "　CCNA\n";
		if($oracle==="ORACLE") $tmp_mail_body.= "　ORACLE\n";
		if($ocjp==="OCJP") $tmp_mail_body.= "　OCJP\n";
		if($toeic750==="TOEIC 750～") $tmp_mail_body.= "　TOEIC 750～\n";
		if($toeic800==="TOEIC 800～") $tmp_mail_body.= "　TOEIC 800～\n";
		if($english_level1==="英検 準1級") $tmp_mail_body.= "　英検 準1級\n";
		if($english1==="英検 1級") $tmp_mail_body.= "　英検 1級\n";
		if($bookkeeping3==="簿記 3級") $tmp_mail_body.= "　簿記 3級\n";
		if($bookkeeping2==="簿記 2級") $tmp_mail_body.= "　簿記 2級\n\n";
		$tmp_mail_body.= "■PR　\n";
		$tmp_mail_body.= $pr."\n\n";
		$tmp_mail_body.= "■採用試験希望日時　".$wish."\n";

		//履歴書添付
		for($rireki_cnt=0;is_uploaded_file($_FILES['rireki']['tmp_name'][$rireki_cnt]);$rireki_cnt++){
			$tmp_mail_body.= "--__BOUNDARY__\n";
			$tmp_mail_body.= "Content-Type: application/octet-stream; name=\"{$_FILES['rireki']['name'][$rireki_cnt]}\"\n";
			$tmp_mail_body.= "Content-Disposition: attachment; filename=\"{$_FILES['rireki']['name'][$rireki_cnt]}\"\n";
			$tmp_mail_body.= "Content-Transfer-Encoding: base64\n";
			$tmp_mail_body.= "\n";
			$tmp_mail_body.= chunk_split(base64_encode(file_get_contents($_FILES['rireki']['tmp_name'][$rireki_cnt])));
		}
		if(is_uploaded_file($_FILES['rireki']['tmp_name'][0])){
			$tmp_mail_body.= "--__BOUNDARY__--\n";
		}

		$mailbody = $tmp_mail_body;

		mb_language("Japanese");
		mb_internal_encoding ("UTF-8");
// 		if (mb_send_mail($send,$subject,$mailbody,$header,"-f k-moritoh@hermes.ne.jp")) {
// 			echo 'メール送信に成功しました。<br/>' . $send . $header . $mailbody;
// 		} else {
// 			echo 'メール送信に失敗しました。<br/>' . $send . $header . $mailbody;
// 		}

		mb_send_mail($send,$subject,$mailbody,$header,"-f saiyo@hermes.ne.jp");
		header("HTTP/1.1 302 Moved Temporarily");
		header("Location: http://www.hermes.ne.jp/recruit/entrySuccess.html");
		//header("Location: http://192.168.10.22/EntryForm/recruit/entrySuccess.html");
		exit();
	}else{
		//$_GET["page"] = "entryfrm";
		//include "./index.php";
		$_POST["se"] = $se;
		$_POST["english"] = $english;
		$_POST["webdesign_somu"] = $webdesign_somu;
		$_POST["keiri"] = $keiri;
		$_POST["sogo"] = $sogo;
		$_POST["shimei"] = $shimei;
		$_POST["shimeiKana"] = $shimeiKana;
		$_POST["old"] = $old;
		$_POST["gender"] = $gender;
		$_POST["address"] = $address;
		$_POST["tel"] = $tel;
		$_POST["mailAddress"] = $mailAddress;
		$_POST["career1"] = $career1;
		$_POST["career2"] = $career2;
		$_POST["career_state1"] = $career_state1;
		$_POST["career_state2"] = $career_state2;
		$_POST["kihon"] = $kihon;
		$_POST["ouyou"] = $ouyou;
		$_POST["ccna"] = $ccna;
		$_POST["oracle"] = $oracle;
		$_POST["ocjp"] = $ocjp;
		$_POST["toeic750"] = $toeic750;
		$_POST["toeic800"] = $toeic800;
		$_POST["english_level1"] = $english_level1;
		$_POST["english1"] = $english1;
		$_POST["bookkeeping3"] = $bookkeeping3;
		$_POST["bookkeeping2"] = $bookkeeping2;
		$_POST["wish"] = $wish;
		$_POST["pr"] = $pr;
		include "entryform.php";
	}
?>