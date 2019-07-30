<?php
	$pageFile = "";
	$pageTitle= "none";
	$defaultPageFile = "note.php";
	$defaultPageTitle = "社内通達";
	$pages = array(
					"note" => $defaultPageFile,
					/* "information" => "information.php", */
					"public_relations" => "public_relations.php",
					"technology" => "technology.php",
					"training" => "training.php",
					"stock" => "stock.php",
					"socializing_party" => "socializing_party.php",
					"formatdl" => "formatdl.php",
					"pmark" => "pmark.php",
					"disaster_info" => "disaster_info.php",
					"security" => "security.php",
					"org" => "org.php",
					"36pact" => "36pact.php",
					"kintaiflow" => "kintaiflow.php",
					"kintaikanri" => "kintaikanri.php",
					"trade" => "trade.php",
					"keihi" => "keihi.php",
					"naiteishapr" => "naiteishapr.php",
					"shainpr" => "shainpr.php",
					"shatyoublog" => "shatyoublog.php",
					"recruit_schedule" => "recruit_schedule.php",
					"fee_application" => "fee_application.php",
					"exam_pickup" => "exam_pickup.php",
					"event_schedule" => "event_schedule.php",
					"workreport" => "workreport.php",
			 );
	$titles = array(
					"note" => $defaultPageTitle,
					/* "information" => "お知らせ", */
					"public_relations" => "社内広報",
					"technology" => "技術情報",
					"training" => "研修会情報",
					"stock" => "Hermes従業員持ち株会",
					"socializing_party" => "ヘルメス親睦会",
					"formatdl" => "各書式ダウンロード",
					"pmark" => "Pマーク",
					"disaster_info" => "災害情報",
					"security" => "セキュリティ事故の行動",
					"org" => "人員組織表",
					"36pact" => "36協定",
					"kintaiflow" => "勤怠連絡フロー",
					"kintaikanri" => "勤怠管理システム",
					"trade" => "トレード掲示板",
					"keihi" => "経費精算システム",
					"naiteishapr" => "内定者プロフィール",
					"shainpr" => "社員プロフィール",
					"shatyoublog" => "会長ブログ",
					"fee_application" => "受験料支援申請書ページ",
					"exam_pickup" => "資格ピックアップ",
					"event_schedule" => "イベントカレンダー",
					"workreport" => "学習計画表",
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
