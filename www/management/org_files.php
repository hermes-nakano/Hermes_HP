<?php
	include 'org_data.php';
	$icons = array(
					"none" => '',
					"new" => '<img src="../img/common/new.gif" name="s_navi4" alt="・" />',
					"pdf" => '<img src="../img/common/icon_pdf.gif" alt="pdf" />'
			);

	$files = array(
					array(
							"new" => $icons["new"],
							"date" => $GLOBALS['date'],
							"url" => './doc/document/'.$GLOBALS['filename'],
							"title" => '会社・人員組織表',
							"icon" => $icons["pdf"]
					),
					array(
							"new" => $icons["none"],
							"date" => '2016/10/05',
							"url" => './doc/document/organization_20161005.pdf',
							"title" => '組織図',
							"icon" => $icons["pdf"]
					),
			);
?>