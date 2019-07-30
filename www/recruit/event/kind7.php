<?php
	$captions = array(
						"",
						"大島公園到着",
						"ラクダ！？",
						"かわいい。",
						"皆で写真を撮りました",
						"よしよし。",
						"ずーーーっと寝てました。",
						"もぐもぐ",
						"尻尾が長いサルでした。"
					);
?>
<li style="float: none; list-style: none; width: 540px; position: absolute; z-index: 50;">
	<img src="../img/event/kind7/1.jpg">
	<div class="bx-caption">
		<span><?php echo $captions[1]; ?></span>
	</div>
</li>

<?php for($pic_no=2; $pic_no<=8; $pic_no++){ ?>
<li style="float: none; list-style: none; width: 540px; position: absolute; z-index: 0; display: none;">
	<img src="../img/event/kind7/<?php echo $pic_no; ?>.jpg">
	<div class="bx-caption">
		<span><?php echo $captions[$pic_no]; ?></span>
	</div>
</li>
<?php } ?>