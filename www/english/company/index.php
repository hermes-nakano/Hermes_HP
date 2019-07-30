<?php
	//301ページリダイレクト
	Header("Location: http://hermes.ne.jp/english/company/overview.html", true, 301);
	exit();

	$pageFile = "";
	$pageTitle= "";
	$defaultPageFile = "aboutus.php";
	$defaultPageTitle = "CompanyProfile";
	$pages = array(
					"aboutus" => $defaultPageFile,
					"greeting" => "greeting.php",
			 );
	$titles = array(
				"aboutus" => $defaultPageTitle,
				"greeting" => "MessageFromPresident",
		 	 );
	if(empty($_GET["page"])){
		$pageFile = $defaultPageFile;
		$pageTitle = $defaultPageTitle;
	}else{
		$pageFile = (array_key_exists($_GET["page"], $pages))? $pages[$_GET["page"]] : $defaultPageFile;
		$pageTitle = (array_key_exists($_GET["page"], $pages))? $titles[$_GET["page"]] : $defaultPageTitle;
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja"> 
<head>
<?php include "../../common/english/meta.php"; ?>
<!-- CSS 読み込み-->
<link rel="stylesheet" href="../../css/company.css" type="text/css" />
<!-- JavaScript 読み込み-->
<title>Hermes Systems Inc - AboutUs</title>
</head>
<body>
	<!-- コンテナー -->
	<div id="container">
		<!-- ヘッダー -->
		<?php include "../../common/english/header.php"; ?>

		<!-- パンくずリスト-->
		<div id="topic_path">
			<a href="../../index.html">HOME</a>
			<img src="../../img/common/right_arrow_cursor.jpg" name="cursor" alt="・"/><?php echo $pageTitle; ?>
		</div>

		<!-- メインエリア -->
		<table id="m_contents" cellspacing="0" cellpadding="0">
			<!-- サイドナビ -->
			<td class="m_side">
				<?php include "./side_navi.php" ; ?>
			</td>

			<!-- メインコンテンツ-->
			<td class="m_main">
				<?php include $pageFile; ?>
			</td>
		</table>
	</div>

	<!-- フッター-->
	<?php include "../../common/english/footer.php"; ?>

</body>
</html>
