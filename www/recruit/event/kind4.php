<?php
	$captions = array(
						"",
						"蜜柑狩り一番のり！",
						"蜜柑発見！！",
						"こっちも蜜柑発見！！",
						"何かを発見したようでした。",
						"美味しそうでした。",
						"良い眺めだったそうです。",
						"一休み一休み。",
						"集合写真"
					);
?>
<li style="float: none; list-style: none; width: 540px; position: absolute; z-index: 50;">
	<img src="../img/event/kind4/1.jpg">
	<div class="bx-caption">
		<span><?php echo $captions[1]; ?></span>
	</div>
</li>

<?php for($pic_no=2; $pic_no<=8; $pic_no++){ ?>
<li style="float: none; list-style: none; width: 540px; position: absolute; z-index: 0; display: none;">
	<img src="../img/event/kind4/<?php echo $pic_no; ?>.jpg">
	<div class="bx-caption">
		<span><?php echo $captions[$pic_no]; ?></span>
	</div>
</li>
<?php } ?>