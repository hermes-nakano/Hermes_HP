<?php
	$captions = array(
						"",
						"島内を観光。記念写真",
						"椿の種",
						"山！",
						"良い眺め！",
						"おーい。どこに行くんですかー。",
						"こっちも良い眺め！",
						"記念写真1",
						"記念写真2"
					);
?>
<li style="float: none; list-style: none; width: 540px; position: absolute; z-index: 50;">
	<img src="../img/event/kind8/1.jpg">
	<div class="bx-caption">
		<span><?php echo $captions[1]; ?></span>
	</div>
</li>

<?php for($pic_no=2; $pic_no<=8; $pic_no++){ ?>
<li style="float: none; list-style: none; width: 540px; position: absolute; z-index: 0; display: none;">
	<img src="../img/event/kind8/<?php echo $pic_no; ?>.jpg">
	<div class="bx-caption">
		<span><?php echo $captions[$pic_no]; ?></span>
	</div>
</li>
<?php } ?>