<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>災害情報</title>
	<link rel="stylesheet" href="/css/bootstrap.css">
</head>
<body>
	<table class="table">
		<tr>
			<th width=100>更新日時</th>
			<th width=250>配信元</th>
			<th>タイトル</th>
		</tr>
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
	$rss = simplexml_load_file($xml);
	if ($rss['version'] == 2.0) {
		foreach ($rss->channel->item as $item) {
			$items[] = array(
				'title' => (string)$item->title,
				'link' => (string)$item->link,
				'timestamp' => strtotime((string)$item->pubDate),
				'source' => (string)$rss->channel->title,
			);
		}
	} else {
		foreach ($rss->item as $item) {
			$items[] = array(
				'title' => (string)$item->title,
				'link' => (string)$item->link,
				'timestamp' => strtotime((string)$item->children('http://purl.org/dc/elements/1.1/')->date),
				'source' => (string)$rss->channel->title,
			);
		}
	}
}
usort($items, function ($a, $b) {
	return $b['timestamp'] - $a['timestamp'];
});
foreach ($items as $item) {
	echo '<tr>';
	echo '<td>' .date('Y-m-d', $item['timestamp']). '</td>';
	echo '<td>' .$item['source']. '</td>';
	echo '<td><a href="' .$item['link']. '">' .$item['title']. '</a></td>';
	echo '</tr>';
}
?>
	</table>
</body>
</html>
