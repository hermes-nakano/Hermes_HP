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
		<td colspan=4 class="m_bar" style="width:540px;">会長ブログ</td>
	</tr>

	<!-- 縦余白 -->
	<tr>
		<td colspan=4 height="20px">
			<img src="../img/common/h_whitespace.gif" name="h_white_space" alt=""/>
		</td>
	</tr>

	<!-- ファイル一覧読み込み -->
	<?php include "shatyoublog_files.php"; ?>

	<!-- ファイル表示 -->
	<?php for($i=0; $i < count($files); $i++){ ?>
		<tr>
			<!-- New アイコン-->
			<td width="40">
				<?php echo $files[$i]["new"]; ?>
			</td>
			<!-- 日付 -->
			<td class="secret_cell1">
				<img src="../img/common/right_arrow_cursor.jpg" class="file-right-arrow-cursor" name="s_navi1" alt="・"/><?php echo $files[$i]["date"]; ?>
			</td>
			<!-- ファイル名 -->
			<td class="secret_cell2">
				<a href="<?php echo $files[$i]["url"]; ?>" target="blank" value="<?php echo $files[$i]["title"]; ?>"><?php echo $files[$i]["title"]; ?></a>
			</td>
			<!-- ファイルサイズ -->
			<td class="secret_cell3">
				<?php echo $files[$i]["icon"]; ?></a>
			</td>
		</tr>

		<!-- 線 -->
		<tr>
			<td colspan=4><hr class="hr-dot"></td>
		</tr>
	<?php } ?>
	
</table>