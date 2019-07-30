<?php
	//301ページリダイレクト
	Header("Location: http://hermes.ne.jp/sitemap/sitemap.html", true, 301);
	exit();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja"> 
<head>
<?php include "../common/meta.php"; ?>
<!-- CSS 読み込み-->
<link rel="stylesheet" href="../css/home.css" type="text/css" />
<title>Hermes Systems Inc - サイトマップ</title>
</head>
<body>
	<!-- コンテナー -->
	<div id="container">
		<!-- ヘッダー -->
		<?php include "../common/header.php"; ?>

		<!-- パンくずリスト-->
		<div id="topic_path">
			<a href="../index.html">HOME</a>
			<img src="../img/common/right_arrow_cursor.jpg" name="cursor" alt="・"/>サイトマップ
		</div>

		<!-- メインエリア -->
		<table id="m_contents" cellspacing="0" cellpadding="0">
			<!-- メインコンテンツ-->
			<td class="m_main">
				<?php include "sitemap.php"; ?>
			</td>
		</table>
	</div>

	<!-- フッター-->
	<?php include "../common/footer.php"; ?>

</body>
</html>
