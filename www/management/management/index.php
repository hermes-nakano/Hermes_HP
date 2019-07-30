<?php

	if(empty($_SERVER["REMOTE_USER"])){
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: http://www.hermes.ne.jp/");
		exit();
	}

	$pageFile = "";
	$pageTitle= "";
	$defaultPageFile = "note.php";
	$defaultPageTitle = "社内通達";
	$pages = array(
					"note" => $defaultPageFile,
					"technology" => "technology.php",
					"training" => "training.php",
					"stock" => "stock.php",
					"formatdl" => "formatdl.php",
					"pmark" => "pmark.php",
					"security" => "security.php",
					"org" => "org.php",
					"36pact" => "36pact.php",
					"kintaiflow" => "kintaiflow.php",
			 );
	$titles = array(
					"note" => $defaultPageTitle,
					"technology" => "技術情報",
					"training" => "研修会情報",
					"stock" => "Hermes従業員持ち株会",
					"formatdl" => "各書式ダウンロード",
					"pmark" => "Pマーク",
					"security" => "セキュリティ事故対応",
					"org" => "人員組織表",
					"36pact" => "36条協定",
					"kintaiflow" => "勤怠連絡フロー",
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
<title>Hermes Systems Inc - 社員専用</title>
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
			<td class="m_side">
				<?php include "./side_navi.php"; ?>
			</td>
			<td class="m_main">
				<?php include $pageFile; ?>
			</td>
		</table>
	</div>

	<!-- フッター-->
	<?php include "../common/footer.php"; ?>
</body>
</html>
