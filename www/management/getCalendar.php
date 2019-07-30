<?php
// 呼び出し用
function getCalendar($selectFromYear, $selectFromMonth, $selectFromDay, $selectToYear, $selectToMonth, $selectToDay){
	// 取得するカレンダーのIDを指定する
//	define('CALENDAR_ID','orijitest@gmail.com');
	define('CALENDAR_ID','kvulstr5fs8pqmes7kchasr3bo@group.calendar.google.com');
	// 取得するカレンダーがひもづいたGoogleアカウントのAPIキーを指定する
	define('API_KEY', 'AIzaSyBbi4e8gOYZHVNopvYf6ZqJ6Zz-OGXgLDU');
	define('API_URL', 'https://www.googleapis.com/calendar/v3/calendars/'.CALENDAR_ID.'/events?key='.API_KEY.'&singleEvents=true');
	date_default_timezone_set('Asia/Tokyo');
	// ここでデータを取得する範囲を決める
	$from = mktime(0, 0, 0, $selectFromMonth, $selectFromDay, $selectFromYear);
	$to = mktime(24, 0, 0, $selectToMonth, $selectToDay, $selectToYear);
	 
	$params = array();
	// 開始日時時刻の昇順で取得する
	$params[] = 'orderBy=startTime';
	// 最大取得件数を指定する
	$params[] = 'maxResults=999';
	$params[] = 'timeMin='.urlencode(date('c', $from));
	$params[] = 'timeMax='.urlencode(date('c', $to));
	
	$url = API_URL.'&'.implode('&', $params);

	// 文字列形式でカレンダーの中身を取得する
	$results = file_get_contents($url);

	// PHP変数の形式に変換する
	$json = json_decode($results, true);
	// 予定情報を格納した部分を抜き出す
	$items = $json['items'];

	// 必要な項目を格納する配列の初期化
	$record = array(
				'summary' => null,
				'startDate' => null,
				'startTime' => null,
				'endDate' => null,
				'endTime' => null,
				'location' => null,
				'description' => null);
	$records = array($record);

	// 各日付に対応した曜日の文字列を渡すための配列を用意する
	$weekday = array( '(日)', '(月)', '(火)', '(水)', '(木)', '(金)', '(土)' );
	$i = 0;
	foreach($items as $item){

		// 各必要な項目を配列に格納する
		if(isset($item['summary'])){
			$records[$i]['summary'] = $item['summary'];
		}else{
			$records[$i]['summary'] = null;
		}
		// 開始・終了日時及び時刻はGoogleカレンダーで終日フラグを指定したかどうかによって取得する配列キーが異なる.
		// それによって分岐処理を行う.
		if(isset($item['start']['dateTime'])){
			$startDate = strtotime($item['start']['dateTime']);
			$records[$i]['startDate'] = date('Y年m月d日', $startDate).$weekday[date('w', $startDate)];
			$records[$i]['startTime'] = substr($item['start']['dateTime'], 11, 5);
		}else{
			$startDate = strtotime($item['start']['date']);
			$records[$i]['startDate'] = date('Y年m月d日', $startDate).$weekday[date('w', $startDate)];
			$records[$i]['startTime'] = '終日';
			}
		if(isset($item['end']['dateTime'])){
			$endDate = strtotime($item['end']['dateTime']);
			$records[$i]['endDate'] = date('Y年m月d日', $endDate).$weekday[date('w', $endDate)];
			$records[$i]['endTime'] = substr($item['end']['dateTime'], 11, 5);
		}else{
			$endDate = strtotime($item['end']['date']);
			$records[$i]['endDate'] = date('Y年m月d日', $endDate).$weekday[date('w', $endDate)];
			$records[$i]['endTime'] = '終日';
		}
		
		if(isset($item['location'])){
			$records[$i]['location'] = $item['location'];
		}else{
			$records[$i]['location'] = null;
		}	
		if(isset($item['description'])){
			$records[$i]['description'] =  $item['description'];
		}else{
			$records[$i]['description'] = null;
		}
		$i++;
	}
	return $records;
}
?>

<?php
// 呼び出し用亜種
function getCalendarWithExplosion($selectFromYear, $selectFromMonth, $selectFromDay, $selectToYear, $selectToMonth, $selectToDay){
	// 取得するカレンダーのIDを指定する
	define('CALENDAR_ID','orijitest@gmail.com');
	// define('CALENDAR_ID','kvulstr5fs8pqmes7kchasr3bo@group.calendar.google.com');
	// 取得するカレンダーがひもづいたGoogleアカウントのAPIキーを指定する
	define('API_KEY', 'AIzaSyBbi4e8gOYZHVNopvYf6ZqJ6Zz-OGXgLDU');
	define('API_URL', 'https://www.googleapis.com/calendar/v3/calendars/'.CALENDAR_ID.'/events?key='.API_KEY.'&singleEvents=true');
	date_default_timezone_set('Asia/Tokyo');
	// ここでデータを取得する範囲を決める
	$from = mktime(0, 0, 0, $selectFromMonth, $selectFromDay, $selectFromYear);
	$to = mktime(24, 0, 0, $selectToMonth, $selectToDay, $selectToYear);
	 
	$params = array();
	// 開始日時時刻の昇順で取得する
	$params[] = 'orderBy=startTime';
	// 最大取得件数を指定する
	$params[] = 'maxResults=999';
	$params[] = 'timeMin='.urlencode(date('c', $from));
	$params[] = 'timeMax='.urlencode(date('c', $to));
	 
	$url = API_URL.'&'.implode('&', $params);

	// 文字列形式でカレンダーの中身を取得する
	$results = file_get_contents($url);

	// PHP変数の形式に変換する
	$json = json_decode($results, true);
	// 予定情報を格納した部分を抜き出す
	$items = $json['items'];

	// 必要な項目を格納する配列の初期化
	$record = array(
				'summary' => null,
				'startDate' => null,
				'startTime' => null,
				'endDate' => null,
				'endTime' => null,
				'location' => null,
				'description' => null,
				'descripionPieces' => null);
	$records = array($record);

	// 各日付に対応した曜日の文字列を渡すための配列を用意する
	$weekday = array( '(日)', '(月)', '(火)', '(水)', '(木)', '(金)', '(土)' );
	$i = 0;
	foreach($items as $item){
		// 開始・終了日付をdateTime型に変換しておく
		$startDate = strtotime($item['start']['dateTime']);
		$endDate = strtotime($item['end']['dateTime']);
		
		// 各必要な項目を配列に格納する
		$records[$i]['summary'] = $item['summary'];
		// 用意した曜日の文字列を結合する
		$records[$i]['startDate'] = date('Y年m月d日', $startDate).$weekday[date('w', $startDate)];
		$records[$i]['startTime'] = substr($item['start']['dateTime'], 11, 5);
		$records[$i]['endDate'] = date('Y年m月d日', $endDate).$weekday[date('w', $endDate)];
		$records[$i]['endTime'] = substr($item['end']['dateTime'], 11, 5);
		if(isset($item['location'])){
		// 改行コードをブラウザでの形式に変換する
			$records[$i]['location'] = preg_replace('/\n/', '<br>', $item['location']);
		}else{
			$records[$i]['location'] = null;
		}	
		if(isset($item['description'])){
			$records[$i]['description'] = preg_replace('/\n/', '<br>', $item['description']);
		}else{
			$records[$i]['description'] = null;
		}
		$descriptionPieces = explode('<br>', $item['description']);
		for($a = 0; $a < count($descriptionPieces); $a++){
			$records[$i]['descriptionPieces'][$a] = $descriptionPieces[$a];
		}
		$i++;
	}
	return $records;
}
?>
