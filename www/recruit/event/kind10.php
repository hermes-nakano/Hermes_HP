<?php
	$captions = array(
						"",
						"空港で記念写真",
						"バスに乗ってホテルへ",
						"出迎えご苦労",
						"ホテルの前で記念写真",
						"ホテル玄関前",
						"海とつながっていました♪",
						"ロビーで休憩",
						"ロビーで記念写真"
					);
?>
<li style="float: none; list-style: none; width: 540px; position: absolute; z-index: 50;">
	<img src="../img/event/kind10/1.jpg">
	<div class="bx-caption">
		<span><?php echo $captions[1]; ?></span>
	</div>
</li>

<?php for($pic_no=2; $pic_no<=8; $pic_no++){ ?>
<li style="float: none; list-style: none; width: 540px; position: absolute; z-index: 0; display: none;">
	<img src="../img/event/kind10/<?php echo $pic_no; ?>.jpg">
	<div class="bx-caption">
		<span><?php echo $captions[$pic_no]; ?></span>
	</div>
</li>
<?php } ?>