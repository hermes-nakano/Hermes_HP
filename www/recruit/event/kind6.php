<?php
	$captions = array(
						"",
						"ホテル玄関前",
						"綺麗な玄関でした。",
						"卓球楽しかったです。",
						"夕食の時間です。",
						"皆もくもくと食べています。",
						"揚げ物がとても美味しかったです。",
						"とても豪華でした。",
						"捗ってますね～"
					);
?>
<li style="float: none; list-style: none; width: 540px; position: absolute; z-index: 50;">
	<img src="../img/event/kind6/1.jpg">
	<div class="bx-caption">
		<span><?php echo $captions[1]; ?></span>
	</div>
</li>

<?php for($pic_no=2; $pic_no<=8; $pic_no++){ ?>
<li style="float: none; list-style: none; width: 540px; position: absolute; z-index: 0; display: none;">
	<img src="../img/event/kind6/<?php echo $pic_no; ?>.jpg">
	<div class="bx-caption">
		<span><?php echo $captions[$pic_no]; ?></span>
	</div>
</li>
<?php } ?>