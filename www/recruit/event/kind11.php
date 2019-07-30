<?php
	$captions = array(
						"",
						"ヨットがたくさん並んでいました。",
						"ヨットの上から見る景色は最高でした。",
						"沖まで行きます。",
						"日がまぶしぃ～",
						"ビールが美味しい！",
						"外人さんカッコイイ。",
						"風邪が強いです。",
						"この後イルカが見えました^^"
					);
?>
<li style="float: none; list-style: none; width: 540px; position: absolute; z-index: 50;">
	<img src="../img/event/kind11/1.jpg">
	<div class="bx-caption">
		<span><?php echo $captions[1]; ?></span>
	</div>
</li>

<?php for($pic_no=2; $pic_no<=8; $pic_no++){ ?>
<li style="float: none; list-style: none; width: 540px; position: absolute; z-index: 0; display: none;">
	<img src="../img/event/kind11/<?php echo $pic_no; ?>.jpg">
	<div class="bx-caption">
		<span><?php echo $captions[$pic_no]; ?></span>
	</div>
</li>
<?php } ?>