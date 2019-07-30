<?php
	$captions = array(
						"",
						"バスに乗り込めー！",
						"移動中",
						"結構遠いな～",
						"一回休憩",
						"ぞろぞろ・・",
						"さようなら。さようなら。",
						"海が綺麗☆",
						"フェリーに乗って東京に帰ります。"
					);
?>
<li style="float: none; list-style: none; width: 540px; position: absolute; z-index: 50;">
	<img src="../img/event/kind5/1.jpg">
	<div class="bx-caption">
		<span><?php echo $captions[1]; ?></span>
	</div>
</li>

<?php for($pic_no=2; $pic_no<=8; $pic_no++){ ?>
<li style="float: none; list-style: none; width: 540px; position: absolute; z-index: 0; display: none;">
	<img src="../img/event/kind5/<?php echo $pic_no; ?>.jpg">
	<div class="bx-caption">
		<span><?php echo $captions[$pic_no]; ?></span>
	</div>
</li>
<?php } ?>