<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>災害情報</title>
	<link rel="stylesheet" href="../../css/bootstrap.css">
</head>
<body>
<?php
$xmls = array(
	'http://www.bousai.metro.tokyo.jp/news.rss',
	'http://www.bousai.go.jp/news.xml',
	'http://www.kantei.go.jp/index-jnews.rdf',
	'http://www.jma-net.go.jp/rss/jma.rss',
	'http://www.city.minato.tokyo.jp/bosai-anzen/shinchaku/shinchaku.xml',
	'http://www.pref.kanagawa.jp/rss/10/list1.xml',
	'https://www.pref.chiba.lg.jp/bousai/shinchaku.xml',
);
foreach ($xmls as $xml) {
$items = array();
	$rss = simplexml_load_file($xml);
	if ($rss['version'] == 2.0) {
		foreach ($rss->channel->item as $item) {
			$items[] = array(
				'title' => (string)$item->title,
				'link' => (string)$item->link,
				'timestamp' => strtotime((string)$item->pubDate),
			);
		}
	} else {
		foreach ($rss->item as $item) {
			$items[] = array(
				'title' => (string)$item->title,
				'link' => (string)$item->link,
				'timestamp' => strtotime((string)$item->children('http://purl.org/dc/elements/1.1/')->date),
			);
		}
	}
	echo '<div style="margin:8px;border:1px solid #ccc">';
	echo '<table class="table" style="margin:0">';
	echo '<caption>' .(string)$rss->channel->title. '</caption>';
	echo '<tr>';
	echo '<th width="100">更新日時</th>';
	echo '<th>タイトル</th>';
	echo '</tr>';
	if (empty($items)) {
		echo '<tr><td colspan="2">表示する内容がありません。</td></tr>';
	}
	foreach (array_slice($items, 0, 5, true) as $item) {
		echo '<tr>';
		echo '<td>' .date('Y-m-d', $item['timestamp']). '</td>';
		echo '<td><a href="' .$item['link']. '">' .$item['title']. '</a></td>';
		echo '</tr>';
	};
	echo '</table>';
	echo '</div>';
}
?>

</body>
</html>
