<?php
	//入力値チェック
	if(empty($_SERVER["REMOTE_USER"])){
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: http://www.hermes.ne.jp/");
		exit();
	}
	$userName = $_SERVER["REMOTE_USER"];

	if(empty($_GET["fileName"]) || empty($_GET["fileUrl"]) ){
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: http://www.hermes.ne.jp/");
		exit();
	}
	$fileName = htmlspecialchars($_GET["fileName"]);
	$fileUrl = htmlspecialchars($_GET["fileUrl"]);
	$logFileAddress = "./log/".$fileUrl."_".$userName;
	
	//閲覧履歴 確認
	if(file_exists($logFileAddress)){
		exit();
	}

	//メール送信
	$header="From:soum2@hermes.ne.jp";
	$send = "soum2@hermes.ne.jp";
	$subject = $userName."が".$fileName."を確認";
	$mailbody = $userName."が".$fileName."を確認";

	mb_language("Japanese");
	mb_internal_encoding ("UTF-8");
	mb_send_mail($send,$subject,$mailbody,$header);

	//閲覧履歴 書込
	touch($logFileAddress);
?>