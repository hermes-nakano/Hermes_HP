<?php
	$pageFile = "";
	$pageTitle= "redmine";
	$defaultPageFile = "redmine.html";
	$defaultPageTitle = "Redmine";
	$pages = array(
					"nominee" => "nominee.html",
					"redmine" => $defaultPageFile,
			 );
	$titles = array(
					"nominee" => "内定者プロフィール",
					"redmine" => $defaultPageTitle,
			 );
	if(empty($_GET["page"])){
		$pageFile = $defaultPageFile;
		$pageTitle = $defaultPageTitle;
	}else{
		$pageFile = (array_key_exists($_GET["page"], $pages))? $pages[$_GET["page"]] : $defaultPageFile;
		$pageTitle = (array_key_exists($_GET["page"], $pages))? $titles[$_GET["page"]] : $defaultPageFile;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja"> 
<head>
<?php include "../common/meta.php"; ?>
<!-- CSS 読み込み-->
<link rel="stylesheet" href="../css/secret.css" type="text/css" />
<title>Hermes Systems Inc - 研修生専用</title>
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

		<table id="m_contents" cellspacing="0" cellpadding="0">
			<tr>
				<td class="m_side">
					<?php include "./side_navi.php"; ?>
				</td>
				<td class="m_main">
					<?php include $pageFile; ?>
				</td>
			</tr>
		</table>
	</div>

	<!-- フッター-->
	<?php include "../common/footer.php"; ?>
</body>
</html>
