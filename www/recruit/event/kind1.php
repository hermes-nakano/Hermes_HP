<?php
	$captions = array(
						"",
						"熱海へ出発♪",
						"天気も晴れて話が盛り上がっていました。",
						"インターで休憩中その1",
						"インターで休憩中その2",
						"再度、熱海へ出発♪",
						"夕食の時間です。頂きます♪",
						"皆で食べた夕食は美味しかったです",
						"バス移動で疲れていました ^^;"
					);
?>
<li style="float: none; list-style: none; width: 540px; position: absolute; z-index: 50;">
	<img src="../img/event/kind1/1.jpg">
	<div class="bx-caption">
		<span><?php echo $captions[1]; ?></span>
	</div>
</li>

<?php for($pic_no=2; $pic_no<=8; $pic_no++){ ?>
<li style="float: none; list-style: none; width: 540px; position: absolute; z-index: 0; display: none;">
	<img src="../img/event/kind1/<?php echo $pic_no; ?>.jpg">
	<div class="bx-caption">
		<span><?php echo $captions[$pic_no]; ?></span>
	</div>
</li>
<?php } ?>