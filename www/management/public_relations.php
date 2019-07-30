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
		<td colspan=4 class="m_bar" style="width:540px;">社内広報</td>
	</tr>
	<!-- 縦余白 -->
	<tr>
		<td colspan=4 height="20px">
			<img src="../img/common/h_whitespace.gif" name="h_white_space" alt=""/>
		</td>
	</tr>
</table>

	<?php
	$counter = 0;
	$directory = "data";

	// 読み込むCSVファイル
	$filelist = scandir($directory, 1);
	$temp = tmpfile();
	$csv  = array();

foreach ($filelist as $key => $f_list){
	if($f_list !="." && $f_list !=".."){
		// ExcelはSJIS、PHPはUTF-8なので変換する
		$data = file_get_contents('data/'.$f_list);
		$data = mb_convert_encoding($data, 'UTF-8', 'SJIS-win');
		fwrite($temp, $data);
		rewind($temp);
		
		while (($data = fgetcsv($temp, 5000, ",", '"')) !== FALSE) {
			// Excelのセルにdate型で書いても勝手に変換されてしまうため一旦date型に戻す。
			// date型でないと日付の比較などができない。
			$date     = "{$data[1]}{$data[2]}";
			$year     = explode('年', $date);
			$month    = explode('月', $year[1]);
			$day      = explode('日', $month[1]);
			$datetime = ($year[0].'/'.$month[0].'/'.$day[0]);
			$datetime = date('Y-m-d', strtotime($datetime));
			$today    = date('Y/m/d');
			$date     = date('Y年m月d日', strtotime($datetime));

			// 今日の日付と予定の日付を比較
			// 今日以降の日付の場合
			//if (strtotime($datetime) >= strtotime($today)) {
				echo'<div id="pr_content">';
				echo'<dt class="m_title">';
				echo'<div class="info-icon event m_title_mei">'.$data[0].'</div>';
				echo '<div class="m_day">'.date('Y年m月d日', strtotime($datetime)).'<div>';
				echo'</dt>';
				echo'<dd class="m_mains">';
				echo'<div>'.nl2br($data[3]).'</div>';
				echo'</dd>';
				echo'</div>';
			// 今日以前の日付の場合
			//} elseif (strtotime($datetime) < strtotime($today)) {
			
			//}
		
		}
	}
}
?>