<?php
	if ($_SERVER['REQUEST_METHOD'] === 'POST'){
		$from = $_POST['start'];
		$to   = $_POST['end'];

		$fromStamp = strtotime($from);
		$fromYear = idate('Y', $fromStamp);
		$fromMonth = idate('m', $fromStamp);
		$fromDay = idate('d', $fromStamp);
		$toStamp = strtotime($to);
		$toYear = idate('Y', $toStamp);
		$toMonth = idate('m', $toStamp);
		$toDay = idate('d', $toStamp);	
	}
	
	ob_start();
	require_once 'getCalendar.php';
	ob_clean();

	// "getCalendar.php"からgetCalendar()の呼び出し
	$records = getCalendar($fromYear, $fromMonth, $fromDay, $toYear, $toMonth, $toDay);

	// 予定が1件もなかった場合でも1つ目の要素に中身が全部nullの要素ができてしまうので削除
	$records = array_filter($records,'array_filter');
//	var_dump($records);
	// PHPExcelファイルの読み込み
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/lib/Classes/PHPExcel.php');
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/lib/Classes/PHPExcel/IOFactory.php');

	// エクセルファイルの新規作成
	//$excel = new PHPExcel();
	// エクセルファイルのテンプレを読み込んで新規作成
	$objRender = PHPExcel_IOFactory::createReader("Excel2007");
	$templatePath = __DIR__. '/template/template.xlsx';
	$PHPExcel = $objRender->load($templatePath);

	// シートの設定
	$PHPExcel->setActiveSheetIndex(0);//何番目のシートか
	$sheet = $PHPExcel->getActiveSheet();//有効になっているシートを代入

	// シート名を変更する
	$sheet->setTitle('採用活動スケジュール');

	// 期間
	$fromStamp = date('Y/m/d' , $fromStamp);
	$toStamp = date('Y/m/d' , $toStamp);
	$sheet->setCellValue('F1', $fromStamp);
	$sheet->setCellValue('M1', $toStamp);

	$sheet->setCellValue('R1', count($records).'件');
	// '年'、'月'、'日'を'/'に
	$search = array('年','月','日','(/)');
	$replace = array('/','/','','(月)');

	// 値をいれていく
	$row = 3;
	for($i = 0 ; $i < count($records) ; $i++){
		$sheet->setCellValue('A'.$row, $records[$i]['summary']);
		$records[$i]['startDate'] = str_replace($search,$replace,$records[$i]['startDate']);
		$records[$i]['endDate'] = str_replace($search,$replace,$records[$i]['endDate']);
		if($records[$i]['startTime'] == '終日'){
			$sheet->setCellValue('B'.$row, $records[$i]['startDate'].$records[$i]['startTime']);
		}else{
			$sheet->setCellValue('B'.$row, $records[$i]['startDate'].$records[$i]['startTime'].'～'.$records[$i]['endDate'].$records[$i]['endTime']);
		}
		$sheet->setCellValue('R'.$row, $records[$i]['location']);
		$sheet->setCellValue('S'.$row, $records[$i]['description']);
		$row++;
		
	}
	$row--;
	$sheet->getStyle( "A1:S{$row}" )->getBorders()->getAllBorders()->setBorderStyle( PHPExcel_Style_Border::BORDER_THIN );

	// 印刷範囲の設定
	$sheet->getPageSetup()->setPrintArea( "A1:S{$row}");

	// 印刷の中央設定
	$sheet->getPageSetup()->setHorizontalCentered(true);

	// Excel2007形式で出力する
	$writer = PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
	$writer->save(__DIR__. '/file/output.xlsx');

	// これ以降記述しなければ自動でダウンロードされない
	$file_path = __DIR__. '/file/output.xlsx';//ダウンロードさせるファイルのパス
	$file_name = 'schedule.xlsx';//ダウンロードさせるファイル名
	header('Content-Type: application/octet-stream');//ダウンロードの指示
	header('Content-Disposition: attachment; filename="'.$file_name.'"');//ダウンロードするファイル名
	ob_end_clean();
	readfile($file_path);//ダウンロード
?>