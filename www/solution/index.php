<?php
	//301ページリダイレクト
	Header("Location: http://hermes.ne.jp/solution/solution.html", true, 301);
	exit();
	
	$pageFile = "";
	$pageTitle= "";
	$defaultPageFile = "software.php";
	$defaultPageTitle = "ソフトウェア開発";
	$pages = array(
					"software" => $defaultPageFile,
					"assist" => "assist.php",
					"average" => "average.php",
					"translation" => "translation.php",
					"capacity" => "capacity.php",
					"organization" => "organization.php"
			 );
	$titles = array(
					"software" => $defaultPageTitle,
					"assist" => "システム・エンジニアリング支援",
					"average" => "オフショアー開発",
					"translation" => "オンサイト技術翻訳",
					"capacity" => "有資格者情報",
					"organization" => "社内組織"
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
<?php include "../common/meta.php" ; ?>
<!-- CSS 読み込み-->
<link rel="stylesheet" href="../css/solution.css" type="text/css" />
<?php if($pageFile === "capacity.php"){ ?>
<link rel="stylesheet" href="../css/recruit.css" type="text/css" /> 
<?php } ?>
<title>Hermes Systems Inc - 事業内容</title> 
</head>
<body>
	<!-- コンテナー -->
	<div id="container">
		<!-- ヘッダー -->
		<?php include "../common/header.php" ; ?>

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
