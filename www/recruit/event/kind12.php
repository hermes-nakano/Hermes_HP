<?php
	$captions = array(
						"",
						"いぇーーーい！",
						"絵に描いたような景色です。",
						"何かなっていました。",
						"ハイビスカスの色が鮮やか！",
						"ここに。潜ります！",
						"海の中はとても綺麗",
						"祝！海中記念撮影！",
						"魚達もやってきた～♪"
					);
?>
<li style="float: none; list-style: none; width: 540px; position: absolute; z-index: 50;">
	<img src="../img/event/kind12/1.jpg">
	<div class="bx-caption">
		<span><?php echo $captions[1]; ?></span>
	</div>
</li>

<?php for($pic_no=2; $pic_no<=8; $pic_no++){ ?>
<li style="float: none; list-style: none; width: 540px; position: absolute; z-index: 0; display: none;">
	<img src="../img/event/kind12/<?php echo $pic_no; ?>.jpg">
	<div class="bx-caption">
		<span><?php echo $captions[$pic_no]; ?></span>
	</div>
</li>
<?php } ?>