<?php
	$icons = array(
					"none" => '',
					"new" => '<img src="../img/common/new.gif" name="s_navi4" alt="・" />',
					"pdf" => '<img src="../img/common/icon_pdf.gif" alt="pdf" />'
			);

	$files = array(
					array(
							"new" => $icons["new"],
							"date" => '2019/1/18',
							"url" => './doc/document/org_20190118.pdf',
							"title" => '会社・人員組織表',
							"icon" => $icons["pdf"]
					),
					array(
							"new" => $icons["none"],
							"date" => '2017/03/01',
							"url" => './doc/document/org_20170301.pdf',
							"title" => '会社・人員組織表',
							"icon" => $icons["pdf"]
					),
					array(
							"new" => $icons["none"],
							"date" => '2016/06/24',
							"url" => './doc/document/organization_20161005.pdf',
							"title" => '組織図',
							"icon" => $icons["pdf"]
					),
			);
?>