<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery(".secret_cell2 > a").click(function(){
			fileName = jQuery(this).attr("value");
			fileUrl = jQuery(this).attr("href").split("/");
			fileUrl = fileUrl[fileUrl.length-1];

			jQuery.ajax({
				type: "GET",
				url: "send.php",
				data: {
						fileName: fileName,
						fileUrl: fileUrl
					  }
			}).done(function(){});
		});
	});
</script>
<table id ="secret_table" cellspacing="0" cellpadding="0">
	<!-- コンテンツタイトル枠 -->
	<tr>
		<td colspan=4 class="m_bar" style="width:540px;">災害情報</td>
	</tr>

</table>
<?php
$xmls = array(
	'http://rss.weather.yahoo.co.jp/rss/warn/13.xml',
	'http://www.bousai.go.jp/news.xml',
	'http://www.jma-net.go.jp/rss/jma.rss',
	'http://www.kantei.go.jp/index-jnews.rdf',
	'http://www.bousai.metro.tokyo.jp/news.rss',
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
		echo '<td><a href="' .$item['link']. '" target="blank">' .$item['title']. '</a></td>';
		echo '</tr>';
	};
	echo '</table>';
	echo '</div>';
}
?>
