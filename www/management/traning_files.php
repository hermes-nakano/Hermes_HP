<?php
	$icons = array(
					"none" => '',
					"new" => '<img src="../img/common/new.gif" name="s_navi4" alt="・" />',
					"pdf" => '<img src="../img/common/icon_pdf.gif" alt="pdf" />'
			);

	$files = array(
					array(
							"new" => $icons["none"],
							"date" => '2017/02/09',
							"url" => './doc/etc/20170209_translation.pdf',
							"title" => '2017年 翻訳グループ内定者研修課題<br/>2017年2月1日～9日に実施された翻訳グループ内定者研修「ジョージ･ワシントン就任演説」「ドナルド･トランプ就任演説」の翻訳と設問に関する報告書です。',
							"icon" => $icons["pdf"]
					)
					/* array(
							"new" => $icons["none"],
							"date" => '2016/07/12',
							"url" => './doc/etc/20160628ANA.pdf',
							"title" => 'ANAホールディングス株式会社 株主総会<br/>2016年6月28日に開催されたANAホールディングス株式会社の第71回定時株主総会に関する報告書です。',
							"icon" => $icons["pdf"]
					),
					array(
							"new" => $icons["none"],
							"date" => '2014/07/03',
							"url" => './doc/etc/20140626mitsubishi.pdf',
							"title" => '三菱重工株式会社 株主総会<br/>2014年6月26日に開催された三菱重工株式会社の第89回定時株主総会に関する報告書です。',
							"icon" => $icons["pdf"]
					),
					array(
							"new" => $icons["none"],
							"date" => '2014/07/03',
							"url" => './doc/etc/20140626touden.pdf',
							"title" => '東京電力株式会社 株主総会<br/>2014年6月26日に開催された東京電力株式会社の第90回定時株主総会に関する報告書です。',
							"icon" => $icons["pdf"]
					),
					array(
							"new" => $icons["none"],
							"date" => '2014/07/03',
							"url" => './doc/etc/20140623ANA.pdf',
							"title" => 'ANAホールディングス株式会社 株主総会<br/>2014年6月23日に開催されたANAホールディングス株式会社の第69回定時株主総会に関する報告書です。',
							"icon" => $icons["pdf"]
					),
					array(
							"new" => $icons["none"],
							"date" => '2013/10/07',
							"url" => './doc/etc/20131004.pdf',
							"title" => 'CEATEC JAPAN 2013<br/>2013年10月1日～5日に開催されたCEATEC JAPAN 2013に関する報告書です。',
							"icon" => $icons["pdf"]
					),
					array(
							"new" => $icons["none"],
							"date" => '2013/07/03',
							"url" => './doc/etc/20130627kurita.pdf',
							"title" => '栗田工業株式会社 株主総会<br/>2013年6月27日に開催された栗田工業株式会社の第77回定時株主総会に関する報告書です。',
							"icon" => $icons["pdf"]
					),
					array(
							"new" => $icons["none"],
							"date" => '2013/07/03',
							"url" => './doc/etc/20130627ANA.pdf',
							"title" => 'ANAホールディングス株式会社 株主総会<br/>2013年6月27日に開催されたANAホールディングス株式会社の第68回定時株主総会に関する報告書です。',
							"icon" => $icons["pdf"]
					),
					array(
							"new" => $icons["none"],
							"date" => '2013/07/03',
							"url" => './doc/etc/20130625shin_nittetu.pdf',
							"title" => '新日鐵住金株式会社 株主総会<br/>2013年6月25日に開催された新日鐵住金株式会社の第88期株主総会に関する報告書です。',
							"icon" => $icons["pdf"]
					),
					array(
							"new" => $icons["none"],
							"date" => '2013/07/02',
							"url" => './doc/etc/20130625chiyoda.pdf',
							"title" => '千代田化工建設株式会社 株主総会<br/>2013年6月25日に開催された千代田化工建設株式会社の株主総会に関する報告書です。',
							"icon" => $icons["pdf"]
					),
					array(
							"new" => $icons["none"],
							"date" => '2013/07/02',
							"url" => './doc/etc/20130625toshiba.pdf',
							"title" => '株式会社東芝 株主総会<br/>2013年6月25日に開催された株式会社東芝の第174期定時株主総会に関する報告書です。',
							"icon" => $icons["pdf"]
					),
					array(
							"new" => $icons["none"],
							"date" => '2013/07/02',
							"url" => './doc/etc/20130626tokyo.pdf',
							"title" => '東京電力株式会社 株主総会<br/>2013年6月26日に開催された東京電力株式会社の第89回定時株主総会に関する報告書です。',
							"icon" => $icons["pdf"]
					),
					
					array(
							"new" => $icons["none"],
							"date" => '2013/07/02',
							"url" => './doc/etc/20130626mitsubishi.pdf',
							"title" => '三菱重工株式会社 株主総会<br/>2013年6月12日に開催された三菱重工株式会社の株主総会に関する報告書です。<br/>※当社では、社内研修の一環として上場<br/>企業の株主総会にご出席頂いています。',
							"icon" => $icons["pdf"]
					),
					array(
							"new" => $icons["none"],
							"date" => '2012/06/15',
							"url" => './doc/etc/sokai20120615.pdf',
							"title" => '第27回 ＣＳＡＪ定時総会報告書',
							"icon" => $icons["pdf"]
					),
					array(
							"new" => $icons["none"],
							"date" => '2011/05/10',
							"url" => 'http://www.itpass.net/csaj/',
							"title" => '[CSAJ]研修ポータルサイト(研修コース一覧)',
							"icon" => $icons["pdf"]
					),
					array(
							"new" => $icons["none"],
							"date" => '2010/04/23',
							"url" => 'http://www.csaj.jp/member/video/2010/100423_1/index.html',
							"title" => '[CSAJ]2010年4月23日開催「クラウドサービス利用の基礎知識<ソフトベンダ編>」',
							"icon" => $icons["pdf"]
					),
					array(
							"new" => $icons["none"],
							"date" => '2010/04/23',
							"url" => 'http://www.csaj.jp/member/video/2010/100423_2/index.html',
							"title" => '[CSAJ]2010年4月23日開催「新世代モバイル向けリナックス『MeeGo』の全貌」<br/>※閲覧に以下のID,PWが必要です。<br/>　ID(アカウント):itvendor<br/>　パスワード:cool2010',
							"icon" => $icons["pdf"]
					),
					array(
							"new" => $icons["none"],
							"date" => '2010/03/11',
							"url" => 'http://www.csaj.jp/member/video/2010/100311/',
							"title" => '[CSAJ]ビデオ・アーカイブ「情報システム取引のトラブル実態と契約のポイント」ビデオ公開のお知らせ<br/>※閲覧に以下のID,PWが必要です。<br/>　ID(アカウント):csajsite<br/>　パスワード:cloud365<br/>',
							"icon" => $icons["pdf"]
					) */
			);
?>