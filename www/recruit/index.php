<?php
	//301ページリダイレクト
	Header("Location: http://hermes.ne.jp/recruit/recruit.html", true, 301);
	exit();

	$pageFile = "";
	$pageTitle= "";
	$defaultPageFile = "recruit.php";
	$defaultPageTitle = "採用情報";
	$pages = array(
					"recruit" => $defaultPageFile,
					"qa" => "qa.php",
					"description" => "description.php",
					"entrycon" => "entrycon.php",
					"entryfrm" => "entryfrm.php",
					"fromsenior" => "fromsenior.php",
					"introduction" => "introduction.php",
					"benefits" => "benefits.php",
					"education" => "education.php",
					"entrySuccess" => "entrySuccess.php"
			 );
	
	$titles = array(
					"recruit" => $defaultPageTitle,
					"qa" => "採用に関する質問",
					"description" => "SE/PGを目指す方",
					"entrycon" => "個人情報取扱い案内及び同意書",
					"entryfrm" => "エントリーフォーム",
					"fromsenior" => "社員紹介",
					"introduction" => "社内紹介",
					"benefits" => "福利厚生",
					"education" => "教育・研修制度",
					"entrySuccess" => "エントリー完了"
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
<?php include "../common/meta.php"; ?>
<!-- CSS 読み込み-->
<link rel="stylesheet" href="../css/recruit.css" type="text/css" />
<?php if($pageFile === "fromsenior.php"){ ?>
<script type="text/javascript" src="../js/jquery.bxslider.min.js"></script>
<link rel="stylesheet" href="../css/jquery.bxslider.css" type="text/css" />
<?php } ?>
<title>Hermes Systems Inc - 採用情報</title>
</head>
<body>
	<!-- コンテナー -->
	<div id="container">
		<!-- ヘッダー -->
		<?php include "../common/header.php"; ?>

		<!-- パンくずリスト-->
		<div id="topic_path">
			<a href="../index.html">HOME</a>
			<img src="../img/common/right_arrow_cursor.jpg" name="cursor" alt="・"/><?php echo $pageTitle; ?>
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
	<?php include "../common/footer.php"; ?>

</body>
</html>
