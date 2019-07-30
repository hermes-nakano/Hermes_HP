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
    <link rel="stylesheet" type="text/css" href="../css/entryfrm-page.css">

    <title>Hermes Systems Inc. - 採用エントリーフォーム</title>

    <!-- Script -->
    <!-- [if lt IE 9]>
    <script src="../js/html5shiv-printshiv.js"></script>
    <script src="../js/css3-mediaqueries.js"></script>
    <script type="text/javascript" src="../js/respond.js"></script>
  <![endif] -->
</head>

<body>
<?php
    $se = "";
    $english = "";
    $webdesign_somu = "";
    $keiri = "";
    $sogo = "";
	$shimei = "";
	$shimeiKana = "";
	$age = "";
	$gender = "";
	$address = "";
	$tel = "";
	$mailAddress = "";
	$career1 = "";
	$career2 = "";
	$career_state1 = "";
	$career_state2 = "";
	$kihon = "";
	$ouyou = "";
	$ccna = "";
	$oracle = "";
	$ocjp = "";
	$toeic750 = "";
	$toeic800 = "";
	$english_level1 = "";
	$english1 = "";
	$bookkeeping3 = "";
	$bookkeeping2 = "";
	$wish = "";
	$pr = "";

    if (isset($_POST["se"])) {$se = $_POST["se"];}
    if (isset($_POST["english"])) {$english = $_POST["english"];}
    if (isset($_POST["webdeign_somu"])) {$webdesign_somu = $_POST["webdesign_somu"];}
    if (isset($_POST["keiri"])) {$keiri = $_POST["keiri"];}
    if (isset($_POST["sogo"])) {$sogo = $_POST["sogo"];}
	if (isset($_POST["shimei"])) {$shimei = $_POST["shimei"];}
	if (isset($_POST["shimeiKana"])) {$shimeiKana = $_POST["shimeiKana"];}
	if (isset($_POST["old"])) {$age = $_POST["old"];}
	if (isset($_POST["gender"])) {$gender = $_POST["gender"];}
	if (isset($_POST["address"])) {$address = $_POST["address"];}
	if (isset($_POST["tel"])) {$tel = $_POST["tel"];}
	if (isset($_POST["mailAddress"])) {$mailAddress = $_POST["mailAddress"];}
	if (isset($_POST["career1"])) {$career1 = $_POST["career1"];}
	if (isset($_POST["career2"])) {$career2 = $_POST["career2"];}
	if (isset($_POST["career_state1"])) {$career_state1 = $_POST["career_state1"];}
	if (isset($_POST["career_state2"])) {$career_state2 = $_POST["career_state2"];}
	if (isset($_POST["kihon"])) {$kihon = $_POST["kihon"];}
	if (isset($_POST["ouyou"])) {$ouyou = $_POST["ouyou"];}
	if (isset($_POST["ccna"])) {$ccna = $_POST["ccna"];}
	if (isset($_POST["oracle"])) {$oracle = $_POST["oracle"];}
	if (isset($_POST["ocjp"])) {$ocjp = $_POST["ocjp"];}
	if (isset($_POST["toeic750"])) {$toeic750 = $_POST["toeic750"];}
	if (isset($_POST["toeic800"])) {$toeic800 = $_POST["toeic800"];}
	if (isset($_POST["english_level1"])) {$english_level1 = $_POST["english_level1"];}
	if (isset($_POST["english1"])) {$english1 = $_POST["english1"];}
	if (isset($_POST["bookkeeping3"])) {$bookkeeping3 = $_POST["bookkeeping3"];}
	if (isset($_POST["bookkeeping2"])) {$bookkeeping2 = $_POST["bookkeeping2"];}
	if (isset($_POST["wish"])) {$wish = $_POST["wish"];}
	if (isset($_POST["pr"])) {$pr = $_POST["pr"];}

?>

    <div id="body-inner">

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

        <div id="breadcrumb-wrapper" class="clearfix">
            <nav id="breadcrumb">
                <ul>
                    <li><a href="../index.html">HOME</a></li>
                    <li><a href="../recruit/recruit.html">採用情報</a></li>
                    <li><a href="../recruit/entrycon.html">個人情報取扱い案内及び同意書</a></li>
                    <li class="current"><a href="../recruit/entryform.php">採用エントリーフォーム</a></li>
                </ul>
            </nav>
        </div>

        <main class="clearfix">
            <article>
                <section id="contents" class="responsive-list-wrapper">
                    <h1>採用エントリーフォーム<span><font color="red">赤字</font>は入力必須項目です。</span></h1>
                    <form name="entryForm" method="post" action="./sendEntryMail.php" enctype="multipart/form-data">
                        <?php
                            if(!empty($_errors)){
                                foreach($_errors as $err){
                        ?>
                        <font class="require">・<?php echo $err ?></font><br>
                        <?php
                                }
                            }
                        ?>
                        <dl class="responsive-list">
                        
                            <!--  希望職種 -->
                            <h2><font class="require">希望職種</font></h2> 
                            <dd>
                                <input type="checkbox" name="se" value="SE職" <?php if ($se == "SE職") {echo 'checked';}?>>SE職
                                <input type="checkbox" name="english" value="英語職" <?php if ($english == "英語職") {echo 'checked';}?>>英語職
                                <input type="checkbox" name="webdesign_somu" value="webデザイナー 総務職" <?php if ($webdesign_somu == "webデザイナー 総務職") {echo 'checked';}?>>webデザイナー 総務職
                                <input type="checkbox" name="keiri" value="経理職" <?php if ($keiri == "経理職") {echo 'checked';}?>>経理職
                                <input type="checkbox" name="sogo" value="総合職" <?php if ($sogo == "総合職") {echo 'checked';}?>>総合職
                            </dd>
                            
                            <!-- 氏名(全角) -->
                            <h2><font class="require">氏名(全角)</font></h2>
                            <dd><input class="w200" type="text" name="shimei" class="simei"
                                       value="<?= htmlspecialchars($shimei, ENT_QUOTES, 'UTF-8'); ?>"
                                       title="氏名は、10文字以内で入力してください。"
                                       placeholder="10文字以内"></dd>

                            <!-- 氏名(かな) -->
                            <h2><font class="require">かな(全角)</font></h2>
                            <dd><input class="w200" type="text" name="shimeiKana" class="simei"
                                       value="<?= htmlspecialchars($shimeiKana, ENT_QUOTES, 'UTF-8'); ?>"
                                       title="かなは、20文字以内で入力してください。"
                                       placeholder="20文字以内"></dd>

                            <!-- 年齢 -->
                            <h2><font class="require">年齢</font></h2>
                            <dd>
                                <select size=1 name="old">
                                <?php
                                    for($old=18; $old<=59; $old++){
                                    	if ($old == $age) {
                                    		echo '<option selected value="'.$old.'">'.$old.'</option>';
                                    	} else {
                                        	echo '<option value="'.$old.'">'.$old.'</option>';
                                    	}
                                    }
                                ?>
                                </select>
                            </dd>

                            <!-- 性別 -->
                            <h2><font class="require">性別</font></h2>
                            <dd>
                                <select size=1 name="gender" required>
                                	<?php
                                		if ($gender == "女性") {
                                			echo '<option value="男性">男性</option>';
                                			echo '<option selected value="女性">女性</option>';
                                		} else {
                                			echo '<option selected value="男性">男性</option>';
                                			echo '<option value="女性">女性</option>';
                                		}
                                	?>
                                </select>
                            </dd>

                            <!-- 住所 -->
                            <h2><font class="require">住所(全角)</font></h2>
                            <dd><input class="w400" type="text" name="address"
                                       value="<?= htmlspecialchars($address, ENT_QUOTES, 'UTF-8'); ?>"
                                       title="住所は、50文字以内で入力してください。"
                                       placeholder="50文字以内"></dd>

                            <!-- 電話番号 -->
                            <h2><font class="require">電話番号(半角)</font></h2>
                            <dd><input class="w200" type="text" name="tel" maxlength="14"
                                       value="<?= htmlspecialchars($tel, ENT_QUOTES, 'UTF-8'); ?>"
                                       placeholder="(例)000-0000-0000"
                                       title="電話番号は、000-0000-0000 の形式で入力してください。"
                                       > 携帯電話可</dd>

                            <!-- 電子メール -->
                            <h2><font class="require">メールアドレス(半角)</font></h2>
                            <dd><input class="w200" type="text" name="mailAddress" maxlength="50"
                                       value="<?= htmlspecialchars($mailAddress, ENT_QUOTES, 'UTF-8'); ?>"
                                       placeholder="(例)xxxx@xx.xx"
                                       title="メールアドレスは、xxxx@xx.xx の形式で入力してください。(50文字以内)"
                                       ></dd>

                            <!-- 学歴1 -->
                            <h2><font class="require">学歴1(全角)</font></h2>
                            <dd>
                                <input class="w315" type="text" name="career1"
                                       value="<?= htmlspecialchars($career1, ENT_QUOTES, 'UTF-8'); ?>"
                                       title="学歴1は、50文字以内で入力してください。"
                                       placeholder="(例)XX県立YY高等学校　普通科">
                                <select size=1 name="career_state1">
                                    <option <?php if ($career_state1 == '卒業') {echo 'selected';}?> value="卒業">卒業</option>
                                    <option <?php if ($career_state1 == '卒業見込') {echo 'selected';}?> value="卒業見込">卒業見込</option>
                                    <option <?php if ($career_state1 == '中退') {echo 'selected';}?> value="中退">中退</option>
                                </select>
                            </dd>
                            <!-- 学歴2 -->
                            <h2>学歴2(全角)</h2>
                            <dd>
                                <input class="w315" type="text" name="career2"
                                       value="<?= htmlspecialchars($career2, ENT_QUOTES, 'UTF-8'); ?>"
                                       title="学歴2は、50文字以内で入力してください。"
                                       placeholder="(例)XX県立YY高等学校　普通科">
                                <select size=1 name="career_state2">
                                    <option <?php if ($career_state2 == '卒業') {echo 'selected';}?> value="卒業">卒業</option>
                                    <option <?php if ($career_state2 == '卒業見込') {echo 'selected';}?> value="卒業見込">卒業見込</option>
                                    <option <?php if ($career_state2 == '中退') {echo 'selected';}?> value="中退">中退</option>
                                </select>
                            </dd>

                            <!-- 取得資格 -->
                            <h2>取得資格</h2>
                            <dd>
                                <input type="checkbox" name="kihon" value="基本情報" <?php if ($kihon == "基本情報") {echo 'checked';}?>>基本情報
                                <input type="checkbox" name="ouyou" value="応用情報" <?php if ($ouyou == "応用情報") {echo 'checked';}?>>応用情報
                                <input type="checkbox" name="ccna" value="CCNA" <?php if ($ccna == "CCNA") {echo 'checked';}?>>CCNA
                                <input type="checkbox" name="oracle" value="Oracle" <?php if ($oracle == "Oracle") {echo 'checked';}?>>Oracle
                                <input type="checkbox" name="ocjp" value="OCJ-P" <?php if ($ocjp == "OCJ-P") {echo 'checked';}?>>OCJ-P
                                <input type="checkbox" name="toeic750" value="TOEIC 750～" <?php if(toeic750 == "TOEIC 750～") {echo 'checked';}?>>TOEIC 750～
                                <input type="checkbox" name="toeic800" value="TOEIC 800～" <?php if(toeic800 == "TOEIC 800～") {echo 'checked';}?>>TOEIC 800～
                                <input type="checkbox" name="english_level1" value=""英検 準1級 <?php if(english_level1 == "英検 準1級") {echo 'checked';}?>>英検 準1級
                                <input type="checkbox" name="english1" value=""英検 1級 <?php if(english1 == "英検 1級") {echo 'checked';}?>>英検 1級
                                <input type="checkbox" name="bookkeeping3" value=""簿記 3級 <?php if(bookkeeping3 == "簿記 3級") {echo 'checked';}?>>簿記 3級
                                <input type="checkbox" name="bookkeeping2" value="簿記 2級" <?php if(bookkeeping2 == "簿記 2級") {echo 'checked';}?>>簿記 2級
                                
                            </dd>

                            <!-- 採用試験希望日時 -->
                            <h2><font color="red">採用試験 希望日時</font></h2>
                            <dd><input class="w200" type="text" name="wish"
                                       value="<?= htmlspecialchars($wish, ENT_QUOTES, 'UTF-8'); ?>"
                                       title="採用試験希望日時は、30文字以内で入力してください。"
                                       placeholder="(例)YYYY/MM/DD HH:mm"></dd>

                            <!-- 職歴・自己PR -->
                            <h2>職歴・自己PR<br>(500文字以内)</h2>
                            <dd>
                                <textarea class="w400 h200" name="pr" maxlength="500" placeholder="500文字以内"><?php if ($pr !== "") {echo $pr;} ?></textarea>
                            </dd>

                            <!-- 履歴書添付 -->
                            <h2>履歴書・職務経歴書 <br>(複数添付する場合はCtrlキーを押しながら選択)</h2>
		<dd>
			<input type="file" name="rireki[]"multiple size="30"accept="image/*,application/pdf,docx,xlsx">
		</dd>

                            <dd class="text-center"><input type="submit" value="送信"></dd>
                        </dl>
                    </form>
                </section>
            </article>

            <aside id="side-menu">
                <nav>
                    <ul>
                        <li class="current">
                            <a href="../recruit/entryform.php">採用エントリーフォーム</a>
                        </li>
                        <li class="upstair">
                            <a href="../recruit/entrycon.html">戻る</a>
                        </li>
                    </ul>
                </nav>
            </aside>

        </main>

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
                        <li><a href="../solution/software.html">ソフトウェア開発</a></li>
                        <li><a href="../solution/assist.html">システム・エンジニアリング支援</a></li>
                        <li><a href="../solution/offshore.html">オフショアー開発</a></li>
                        <li><a href="../solution/translation.html">オンサイト技術翻訳</a></li>
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
        <a href="#" id="page-top"><i class="fa fa-arrow-circle-up fa-3x"></i></a>

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
