<?php
	//301ページリダイレクト
	Header("Location: http://hermes.ne.jp/privacy/privacy.html", true, 301);
	exit();

	$pageFile = "";
	$defaultPageFile = "0.php";
	$pages = array(
					"0" => $defaultPageFile,
					"1" => "1.php",
					"2" => "2.php",
					"3" => "3.php"
			 );
	
	if(empty($_GET["page"])){
		$pageFile = $defaultPageFile;
	}else{
		$pageFile = (array_key_exists($_GET["page"], $pages))? $pages[$_GET["page"]] : $defaultPageFile;
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja"> 
<head>
<title>Hermes Systems Inc - 個人情報保護方針</title> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- CSS 読み込み-->
<link rel="stylesheet" href="../css/common.css" type="text/css" />
<link rel="stylesheet" href="../css/privacy.css" type="text/css" />
<!-- JavaScript 読み込み-->
<script type="text/javascript" src="../js/common.js"></script>
</head>
<body>
	<!-- コンテナー -->
	<div id="container">
		<!-- ヘッダー -->
		<?php include "../common/header.php" ; ?>

		<!-- パンくずリスト-->
		<div id="topic_path">
			<a href="../index.html">HOME</a>
			<img src="../img/common/right_arrow_cursor.jpg" name="cursor" alt="・"/>個人情報保護方針
		</div>

		<!-- メインエリア -->
		<table id="m_contents" cellspacing="0" cellpadding="0">
			<!-- メインコンテンツ-->
			<td class="m_main">
				<?php include $pageFile; ?>
			</td>
		</table>
	</div>

	<!-- フッター-->
	<?php include "../common/footer.php"; ?>

</body>
</html>
