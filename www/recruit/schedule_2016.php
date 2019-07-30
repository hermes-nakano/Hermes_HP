<!DOCTYPE html>
<html lang="ja">

<head>
	<!-- Common -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- SEO -->
	<meta content="株式会社ヘルメスシステムズ" name="title">
	<meta content="株式会社ヘルメスシステムズのWebページです。" name="description">
	<meta content="株式会社ヘルメスシステムズ, Hermes Systems Inc., 会社案内, 事業内容, 採用情報, パートナー募集, お問い合わせ" name="keywords">

	<!-- OGP Setting -->


	<!-- Stylesheet -->
	<link rel="stylesheet" type="text/css" href="../css/html5reset-1.6.1.css">
	<link rel="stylesheet" type="text/css" href="../css/jq.bxslider.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/common-page.css">
	<link rel="stylesheet" type="text/css" href="../css/content.css">

	<title>Hermes Systems Inc. - Information</title>

	<!-- Script -->
	<!-- [if lt IE 9]>
	<script src="../js/html5shiv-printshiv.js"></script>
	<script src="../js/css3-mediaqueries.js"></script>
	<script type="text/javascript" src="../js/respond.js"></script>
  <![endif] -->
</head>

<body>
	<div id="body-inner">
		
		<!-- 共通Header -->
 <header class="clearfix">
			<!-- Header-bar -->
			<div id="header-bar">
				<a class="logo" href="../index.html"><img src="../img/logo_pc_off.png" alt="Hermes Systems Inc."></a>

				<!-- Sub-menu -->
				<div id="smenu">
					<ul>
						<li><a href="../sitemap/sitemap.html"><i class="fa fa-sitemap fa-fw"></i>サイトマップ</a></li>
						<li><a href="../english/company/overview.html"><i class="fa fa-globe fa-fw"></i>English</a></li>
					</ul>
				</div>
				<div id="smenu_2">
					<ul>
						<li><a href="https://www.facebook.com/hermessystems" target="_blank">
							<i class="fa fa-facebook-square"></i>Facebook</a></li>
					</ul>
				</div>
				<!-- Hamburger-button -->
				<a id="open-hbtn" class="hbtn" href="#"><span><i class="fa fa-bars fa-lg"></i></span></a>
			</div>

			<!-- Global-navigation -->
			<div id="wrapper">
				<div class="inner">
					<nav id="gnav" class="clearfix">
						<ul>
							<li><a href="../company/overview.html"><span>会社案内</span></a></li>
							<li><a href="../solution/solution.html"><span>事業内容</span></a></li>
							<li><a href="../recruit/recruit.html"><span>採用情報</span></a></li>
							<li><a href="../partnership/partnership.html"><span>パートナー募集</span></a></li>
							<li><a href="../inquiry/inquiry.html"><span>お問い合わせ</span></a></li>
						</ul>
					</nav>
				</div>
			</div>
		</header>
		<!-- パンくずリスト -->
		<div id="breadcrumb-wrapper" class="clearfix">
			<nav id="breadcrumb">
				<ul>
					<li><a href="../index.html">HOME</a></li>
					<li><a href="../recruit/recruit.html">採用情報</a></li>
					<li class="current"><a href="../recruit/schedule.php">採用活動スケジュール</a></li>
				</ul>
			</nav>
		</div>

		<!-- メインコンテンツ -->
		<main class="clearfix">
			<article>
				<section id="contents" class="responsive-article-wrapper">
					<h1>採用活動スケジュール<span>2016年採用活動スケジュール</span></h1>

					<section class="common-article-parent">
						<div id="info-container" class="clearfix">

							<dl id="info-list" class="clearfix">
								<!-- スケジュール終了例
								<dt>
									<div class="info-icon important">会社説明会：終了</div>
								</dt>
								<dd>
									<time datetime="YYYY/MM/DD">YYYY年MM月DD日 hh:mm～　</time>
									<a>○○専門学校　弊社担当：○○</a>
								</dd>
								 -->
								<?php
								$counter = 0;
							//	読み込むcsvファイル 多分毎年要変更 dataフォルダ内にある
								$file = "data/schedule_h28.csv";
							
							//	Excelはsjis,PHPはUTF-8なのでそのまま出力すると文字化けするのでその対策
								$data = file_get_contents($file);
								$data = mb_convert_encoding($data, 'UTF-8', 'sjis-win');
								$temp = tmpfile();
								$csv  = array();
								
								fwrite($temp, $data);
								rewind($temp);
									while ( ( $data = fgetcsv ( $temp, 1000, ",", '"' ) ) !== FALSE ) {
									//	1,2行目はコメントみたいなものなので3行目から出力していく
										if ($counter > 1 && !empty($data[0])) {	
										/*	echo'<pre>';
												echo print_r($data,true);
											echo'</pre>';
										//	配列中身例
											Array
											(
												[0] => 会社説明会
												[1] => 2016年
												[2] => 6月27日
												[3] => 13:30
												[4] => KCS福岡専門学校様　採用試験同時実施
											)	
										*/
										//	Excelのセルにdate型で書いても勝手に変換されてしまうため一旦date型に戻す。
										//	date型でないと日付の比較などができない。
											$date = "{$data[1]}{$data[2]}";
											$year = explode('年',$date);
											$month = explode('月',$year[1]);
											$day = explode('日',$month[1]);
											$datetime = ($year[0].'/'.$month[0].'/'.$day[0]);
											$datetime = date('Y/m/d',strtotime($datetime));
											$today = date('Y/m/d');
											$date = date('Y年m月d日',strtotime($datetime));
											$data[3] = date("H:i", strtotime($data[3]));
										//	今日の日付と予定の日付を比較
										//	今日以降の日付の場合
											if(strtotime($datetime) >= strtotime($today)){
												echo'<dt>';
												echo	'<div class="info-icon event">'.$data[0].'</div>';
												echo'</dt>';
												echo'<dd>';
												echo	'<time datetime="'.$datetime.'">'.$date." ".$data[3]."～".'</time>';
												echo	'<a>'.$data[4].'</a>';
												echo'</dd>';
										//	今日以前の日付の場合
											}elseif(strtotime($datetime) < strtotime($today)){
												echo'<dt>';
												echo	'<div class="info-icon important">'.$data[0]."：終了".'</div>';
												echo'</dt>';
												echo'<dd>';
												echo	'<time datetime="'.$datetime.'">'.$date." ".$data[3]."～".'</time>';
												echo	'<a>'.$data[4].'</a>';
												echo'</dd>';
											}
										}elseif(empty($data[0]) && $counter <= 1){
											echo '<div>現在予定はございません。</div>';
											break;
										}
										$counter++;
									}
								?>
					</section>
				</section>
			</article>

			<aside id="side-menu">
				<nav>
					<ul>
						<li class="top-category"><a href="../recruit/schedule.php">採用活動スケジュール</a></li>
						<li><a href="../recruit/schedule_2019.php">2019年採用活動スケジュール</a></li>
						<li><a href="../recruit/schedule_2018.php">2018年採用活動スケジュール</a></li>
						<li><a href="../recruit/schedule.php">2017年採用活動スケジュール</a></li>
						<li class="current"><a href="../recruit/schedule_2016.php">2016年採用活動スケジュール</a></li>
						<li class="back-to-home"><a href="../index.html">HOMEに戻る</a></li>
					</ul>
				</nav>
			</aside>

		</main>
<style>*/		
		<!-- 共通Footer -->
		<?php include "../common/footer-contents.php"; ?>

		<!-- ページトップボタン -->
		<?php include "../common/pagetop-btn.php"; ?>

	</div>

	<!-- 共通ドロワーメニュー -->
	<?php include "../common/drawer-menu.php"; ?>

	<!-- 共通script -->
	<?php include "../common/scripts.php"; ?>
</body>

</html>
*/</style>
		<footer class="clearfix">
			<!-- Footer-menu -->
			<div id="footer-menu" class="clearfix">
				<div class="footer-menu-group">
					<a href="../company/overview.html"><h2>会社案内</h2></a>
					<ul>
						<li><a href="../company/partner.html">関連会社・提携会社</a></li>
						<li><a href="../company/message.html">社長挨拶</a></li>
						<!--<li><a href="http://www.hermes.ne.jp/recruit/president_blog">社長ブログ</a></li>-->
						<li><a href="http://hermes-blogs.blogspot.jp/">総務ブログ</a></li>
						<li><a href="../company/access.html">アクセスマップ</a></li>
					</ul>
				</div>

				<div class="footer-menu-group">
					<a href="../solution/solution.html"><h2>事業内容</h2></a>
					<ul>
						<li><a href="../solution/software.html">SESとソフトウェア開発</a></li>
						<li><a href="../solution/translation.html">オンサイト技術翻訳</a></li>
						<li><a href="../solution/offshore.html">オフショアー開発とラボ契約</a></li>
						<li><a href="../solution/organization.html">社内組織</a></li>
					</ul>
				</div>

				<div class="footer-menu-group">
					<a href="../recruit/recruit.html"><h2>採用情報</h2></a>
					<ul>
						<li><a href="../recruit/introduction.html">SE/PGを目指す方</a></li>
						<li><a href="../recruit/employee.html">社員紹介</a></li>
						<li><a href="../recruit/welfare.html">福利厚生</a></li>
						<li><a href="../recruit/education.html">教育・研修制度</a></li>
					</ul>
				</div>

				<div class="footer-menu-group">
					<a href="../partnership/partnership.html"><h2>パートナー募集</h2></a>
					<ul>
					</ul>
				</div>

				<div class="footer-menu-group">
					<a href="../inquiry/inquiry.html"><h2>お問い合わせ</h2></a>
					<ul>
						<li><a href="../inquiry/intern.html">インターンについて</a></li>
					</ul>
				</div>

				<small id="privacymark" class="clearfix"><a href="http://privacymark.jp/" target="_blank"><img src="../img/privacy.gif" alt="プライバシーマーク"></a></small>
			</div>

			<!-- Footer-bar -->
			<div id="footer-bar">
				<nav id="fbnav" class="clearfix">
					<ul>
						<li><a href="../index.html">トップページ</a></li>
						<li><a href="../sitemap/sitemap.html">サイトマップ</a></li>
						<li><a href="../english/company/overview.html">English</a></li>
						<li><a href="../privacy/privacy.html">個人情報保護方針</a></li>
						<li><a href="../management/index.php">社員専用</a></li>
						<li><a href="https://www16129ue.sakura.ne.jp/">研修生専用</a></li>
					</ul>
				</nav>

				<small id="copyright">Copyright(c) 1991-2016 Hermes Systems Inc. All rights reserved.</small>
			</div>
		</footer>

		<!-- Rerurn-page-top-button -->
		<a href="#" id="page-top" style="display: none;"><i class="fa fa-arrow-circle-up fa-3x"></i></a>

	</div>

	<!-- Drawer-menu(Smartphone & Tablet) -->
	<div id="spnav">
		<div id="spnav-header" class="clearfix">
			<h1>Menu</h1>
			<a id="close-hbtn" class="hbtn visible" href="#"><span><i class="fa fa-arrow-circle-right fa-lg"></i></span></a>
		</div>
	</div>

	<!-- Script -->
	<script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="../js/jquery.bxslider.js"></script>
	<script type="text/javascript" src="../js/common-script.js"></script>


</body>

</html>
