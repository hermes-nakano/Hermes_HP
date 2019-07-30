<?php
	$icons = array(
					"none" => '',
					"new" => '<img src="../img/common/new.gif" name="s_navi4" alt="・" />',
					"pdf" => '<img src="../img/common/icon_pdf.gif" alt="pdf" />',
					"zip" => '<img src="../img/common/icon_zip.gif" alt="zip" />'
			);

	$files = array(
					array(
							"new" => $icons["none"],
							"date" => '',
							"url" => '',
							"title" => '<strong>経費清算書書式一覧</strong>',
							"icon" => '',
							"target" => ''
					),
					array(
							"new" => $icons["none"],
							"date" => '2017/08/18',
							"url" => './doc/sinsei/koutu.zip',
							"title" => '交通費精算書',
							"icon" => $icons["zip"],
							"target" => '_self'  /* クリックされたときにどのタブを開くか */
					),
					array(
							"new" => $icons["none"],
							"date" => '2014/05/01',
							"url" => './doc/sinsei/shugyo_koutu.zip',
							"title" => '就業場所変更用',
							"icon" => $icons["zip"],
							"target" => '_self'
					),
					array(
							"new" => $icons["none"],
							"date" => '',
							"url" => '',
							"title" => '<strong>報告関連書式一覧</strong>',
							"icon" => '',
							"target" => ''
					),
					array(
							"new" => $icons["none"],
							"date" => '2017/08/03',
							"url" => './doc/sinsei/reportFormat2.zip',
							"title" => '月次報告書',
							"icon" => $icons["zip"],
							"target" => '_self'
					),
					array(
							"new" => $icons["new"],
							"date" => '2019/03/13',
							"url" => './index.php?page=workreport',
							"title" => '学習計画表',
							"icon" => $icons["zip"],
							"target" => '_self'
					),
					array(
							"new" => $icons["none"],
							"date" => '2017/03/31',
							"url" => './doc/sinsei/Businesstrip.zip',
							"title" => '出張申請書',
							"icon" => $icons["zip"],
							"target" => '_self'
					),
					array(
							"new" => $icons["none"],
							"date" => '2017/03/31',
							"url" => './doc/sinsei/Businessreport.zip',
							"title" => '出張報告書',
							"icon" => $icons["zip"],
							"target" => '_self'
					),
					array(
							"new" => $icons["none"],
							"date" => '',
							"url" => '',
							"title" => '<strong>その他書式一覧</strong>',
							"icon" => '',
							"target" => ''
					),/*
					array(
							"new" => $icons["none"],
							"date" => '2013/06/07',
							"url" => './doc/motikabu/motikabu.pdf',
							"title" => '持ち株会申込書',
							"icon" => $icons["pdf"],
							"target" => '_blank'
					),*/
					array(
							"new" => $icons["none"],
							"date" => '2017/08/17',
							"url" => './doc/sinsei/20170814_QualificationAward.pdf',
							"title" => '報奨対象資格一覧',
							"icon" => $icons["pdf"],
							"target" => '_blank'
					),
					array(
							"new" => $icons["none"],
							"date" => '2017/08/17',
							"url" => './index.php?page=fee_application',
							"title" => '資格試験受験料支援申請書ページ',
							"icon" => '',
							"target" => '_self'
					),/*
					array(
							"new" => $icons["none"],
							"date" => '2016/08/01',
							"url" => './doc/sinsei/rec_sinsei_20160801.zip',
							"title" => 'レクリエーション費申請書',
							"icon" =>  $icons["zip"],
							"target" => '_self'
					),*/
			);
?>