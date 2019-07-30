<?php
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
	$sjcp = "";
	$toeic750 = "";
	$toeic800 = "";
	$english_level1 = "";
	$english1 = "";
	$bookkeeping3 = "";
	$bookkeeping2 = "";
	$wish = "";
	$pr = "";
	$_errors = array();

	//氏名
	if(empty($_POST["shimei"]) || trim($_POST["shimei"]) == ""){
		$_errors[] = "氏名が入力されていません。";
	}elseif(mb_strlen($_POST["shimei"], "UTF-8") > 10){
		$_errors[] = "氏名は10文字までで入力して下さい。";
	}else{
		//特定の文字以外は空に置き換える
		$shimei = preg_replace("/^[A-Za-z0-9_.-]/","", $_POST["shimei"]);
	}

	//かな
	if(empty($_POST["shimeiKana"]) || trim($_POST["shimeiKana"]) == ""){
		$_errors[] = "かなが入力されていません。";
	}elseif(mb_strlen($_POST["shimeiKana"], "UTF-8") >= 20){
		$_errors[] = "かなは20文字までで入力して下さい。";
	}else{
		//特定の文字以外は空に置き換える
		$shimeiKana = preg_replace("/^[A-Za-z0-9_.-]/","", $_POST["shimeiKana"]);
	}

	//年齢
	if(empty($_POST["old"]) || trim($_POST["shimeiKana"]) == ""){
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
	if(empty($_POST["gender"]) || trim($_POST["shimeiKana"]) == ""){
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
		$address = preg_replace("/^[A-Za-z0-9_.-]/","", $_POST["address"]);
	}

	//電話番号
	if(empty($_POST["tel"]) || trim($_POST["tel"]) == ""){
		$_errors[] = "電話番号が入力されていません。";
	}elseif(mb_strlen($_POST["tel"], "UTF-8") > 14){
		$_errors[] = "電話番号は12文字までで入力して下さい。";
	}elseif(!preg_match("/^[0-9]{2,4}-[0-9]{2,4}-[0-9]{3,4}$/", $_POST["tel"])){
		$_errors[] = "電話番号は000-0000-0000形式で入力して下さい。";
	}else{
		$tel = $_POST["tel"];
	}

	//メールアドレス
	if(empty($_POST["mailAddress"]) || trim($_POST["mailAddress"]) == ""){
		$_errors[] = "メールアドレスが入力されていません。";
	}elseif(mb_strlen($_POST["mailAddress"], "UTF-8") > 50){
		$_errors[] = "メールアドレスは50文字までで入力して下さい。";
	}elseif(!preg_match("/^[^@]+@([-a-z0-9]+\.)+[a-z]{2,}$/", $_POST["mailAddress"])){
		$_errors[] = "メールアドレスはxxxx@xx.xx形式で入力して下さい";
	}else{
		$mailAddress = $_POST["mailAddress"];
	}

	//学歴1
	if(empty($_POST["career1"]) || trim($_POST["career1"]) == ""){
		$_errors[] = "学歴1が入力されていません。";
	}elseif(mb_strlen($_POST["career1"], "UTF-8") > 50){
		$_errors[] = "学歴1は50文字までで入力して下さい。";
	}else{
		//特定の文字以外は空に置き換える
		$career1 = preg_replace("/^[A-Za-z0-9_.-]/","", $_POST["career1"]);
	}

	//学歴1状態
	if(empty($_POST["career_state1"]) || trim($_POST["career_state1"]) == ""){
		$_errors[] = "学歴1状態が選択されていません。";
	}elseif(mb_strlen($_POST["career_state1"], "UTF-8") > 4){
		$_errors[] = "学歴1状態は4文字までで入力して下さい。";
	}else{
		//特定の文字以外は空に置き換える
		$career_state1 = preg_replace("/^[A-Za-z0-9_.-]/","", $_POST["career_state1"]);
	}

	//学歴2
	if(mb_strlen($_POST["career2"], "UTF-8") > 50){
		$_errors[] = "学歴2は50文字までで入力して下さい。";
	}else{
		//特定の文字以外は空に置き換える
		$career2 = preg_replace("/^[A-Za-z0-9_.-]/","", $_POST["career2"]);
	}

	//学歴2状態
	if(empty($_POST["career_state2"]) || trim($_POST["career_state2"]) == ""){
		$_errors[] = "学歴2状態が選択されていません。";
	}elseif(mb_strlen($_POST["career_state2"], "UTF-8") > 4){
		$_errors[] = "学歴2状態は4文字までで入力して下さい。";
	}else{
		//特定の文字以外は空に置き換える
		$career_state2 = preg_replace("/^[A-Za-z0-9_.-]/","", $_POST["career_state2"]);
	}

	//基本情報
	if(!empty($_POST["kihon"])) $kihon = "基本情報";

	//応用情報
	if(!empty($_POST["ouyou"])) $ouyou = "応用情報";

	//CCNA
	if(!empty($_POST["ccna"])) $ccna = "CCNA";

	//ORACLE
	if(!empty($_POST["oracle"])) $oracle = "ORACLE";

	//SJCP
	if(!empty($_POST["sjcp"])) $sjcp = "SJCP";
	
	//TOEIC750～
	if(!empty($_POST["toeic750"])) $sjcp = "TOEIC750～";
	
	//TOEIC800～
	if(!empty($_POST["toeic800"])) $sjcp = "TOEIC800～";
	
	//英検準1級
	if(!empty($_POST["english_level1"])) $sjcp = "英検準1級";
	
	//英検1級
	if(!empty($_POST["english1"])) $sjcp = "英検1級";
	
	//簿記3級
	if(!empty($_POST["bookkeeping3"])) $sjcp = ""簿記3級;
	
	//簿記2級
	if(!empty($_POST["bookkeeping2"])) $sjcp = ""簿記2級;

	//希望日
	if(empty($_POST["wish"]) || trim($_POST["wish"]) == ""){
		$_errors[] = "希望日が入力されていません。";
	}elseif(mb_strlen($_POST["wish"], "UTF-8") > 30){
		$_errors[] = "希望日は30文字までで入力して下さい。";
	}else{
		//特定の文字以外は空に置き換える
		$wish = preg_replace("/^[A-Za-z0-9_.-]/","", $_POST["wish"]);
	}

	//PR
	if(mb_strlen($_POST["pr"], "UTF-8") > 500){
		$_errors[] = "PRは500文字までで入力して下さい。";
	}else{
		//特定の文字以外は空に置き換える
		$pr = preg_replace("/^[A-Za-z0-9_.-]/","", $_POST["pr"]);
	}

	if(count($_errors) == 0){
		//メール送信
		$header="From:saiyo@hermes.ne.jp";
		$send = "saiyo@hermes.ne.jp";
		$subject ="採用エントリーからのメール";
		$tmp_mail_body = "会社HP 採用エントリーページ からメールが送信されています。\n\n";
		$tmp_mail_body.= "==========================================================\n";
        $tmp_mail_body.= "■希望職種　\n"
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
		if($sjcp==="SJCP") $tmp_mail_body.= "　SJCP\n\n";
		if($toeic750==="TOEIC750～") $tmp_mail_body.= "　TOEIC750～\n";
		if($toeic800==="TOEIC800～") $tmp_mail_body.= "　TOEIC800～\n";
		if($english_level1==="英検準1級") $tmp_mail_body.= "　英検準1級\n";
		if($english1==="英検1級") $tmp_mail_body.= "　英検1級\n";
		if($bookkeeping3==="簿記3級") $tmp_mail_body.= "　簿記3級\n";
		if($bookkeeping2==="簿記2級") $tmp_mail_body.= "　簿記2級\n";
		$tmp_mail_body.= "PR　\n";
		$tmp_mail_body.= $pr."\n\n";
		$tmp_mail_body.= "採用試験希望日時　".$wish."\n";
		$mailbody = $tmp_mail_body;

		mb_language("Japanese");
		mb_internal_encoding ("UTF-8");
		mb_send_mail($send,$subject,$mailbody,$header);

		header("HTTP/1.1 302 Moved Temporarily");
		header("Location: http://www.hermes.ne.jp/recruit/index.php?page=entrySuccess");
		exit();
	}else{
		$_GET["page"] = "entryfrm";
		include "./index.php";
	}
?>