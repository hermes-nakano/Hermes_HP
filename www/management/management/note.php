<table id ="secret_table" cellspacing="0" cellpadding="0">
	<!-- コンテンツタイトル枠 -->
	<tr>
		<td colspan=4 class="m_bar" style="width:540px;">社内通達</td>
	</tr>

	<!-- 縦余白 -->
	<tr>
		<td colspan=4>
			<img src="../img/common/h_whitespace.gif" name="h_white_space" alt=""/>
		</td>
	</tr>

<!-- アイコン情報取得 -->
<?php
	$icons = array(
				"none" => '',
				"new" => '<img src="../img/common/new.gif" name="s_navi4" alt="・" />',
				"pdf" => '<img src="../img/common/icon_pdf.gif" alt=".pdf" />'
			);
			$host = "mysql464.db.sakura.ne.jp";
			$user = "hermessystems";
			$pass = "HI9_234W8pH9";
			$db = "hermessystems_upload_tsutatsu";
			$filepath = "./doc/tsutatsu/";
			$pdf="pdf";
			// MySQLへ接続する
			$link = mysql_connect($host,$user,$pass) or die("MySQLへの接続に失敗しました。");
			// DBを選択する
			$sdb = mysql_select_db($db,$link) or die("データベースの選択に失敗しました。");
			// エンコード
			mysql_set_charset('utf8');
			// クエリを送信する
			$sql = "SELECT* FROM t_info ORDER BY info_date DESC, info_id DESC";
			$result = mysql_query($sql, $link) or die("クエリの送信に失敗しました。<br/>SQL:".$sql);
			// 結果セットの行数を取得する
			$rows = mysql_num_rows($result);
?>

<?php
	// ファイル情報表示
	for($i=0; $i < $rows; $i++){ 
		$row = mysql_fetch_array($result,MYSQL_ASSOC);
		// アップロード先のファイルパス取得
	    $filedate = date("YmdHis", strtotime($row["info_date"]));
		$uploaddir = "$filepath$filedate.$pdf";
		// 表示状態がONの情報のみ表示
		if($row["shown"]==0){
?>

		<tr>
			<!-- New アイコン-->
			<td width="40">
<?php 
			// 判定（アップロード1ヶ月以内ならばNewアイコンを表示）
			if($row["newicon"]== 0 && date("Ymdhis", strtotime('-1 week')) < date("Ymdhis",strtotime($row["info_date"]))){
				echo $icons["new"]; 
			} else {
				echo $icons["none"];
				$sql ="UPDATE t_info SET newicon=0 where info_id = $row[info_id]";
				mysql_query($sql, $link);
			}
?>
			</td>
			<!-- 日付 -->
			<td class="secret_cell1">
				<img src="../img/common/right_arrow_cursor.jpg" class="file-right-arrow-cursor" name="s_navi1" alt="・"/><?php echo date("Y/m/d",strtotime($row["info_date"])); ?>
			</td>
			<!-- ファイル名 -->
			<td class="secret_cell2">
				<!--<?php $info_title = mb_convert_encoding($row["info_title"], 'utf-8'); ?>-->
				<!--<a href="<?php echo $uploaddir; ?>" target= "blank" value="<?php echo $info_title; ?>"><?php echo $info_title; ?></a>-->
				<a href="<?php echo $uploaddir; ?>" target= "blank" value="<?php echo $row["info_title"]; ?>"><?php echo $row["info_title"]; ?></a>
			</td>
			<!-- ファイルサイズ -->
			<td class="secret_cell3">
				<?php echo $icons["pdf"]; ?></a>
			</td>
		</tr>

		<!-- 線 -->
		<tr>
			<td colspan=4><hr class="hr-dot"></td>
		</tr>
<?php 
		} else{
	} 
}
?>

<?php
	// 結果保持用メモリを開放する
	mysql_free_result($result);
	// MySQLへの接続を閉じる
	mysql_close($link) or die("MySQL切断に失敗しました。");
?>

</table>
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
