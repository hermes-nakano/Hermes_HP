<?php
	$captions = array(
						"",
						"欲しいものは自分で焼くスタイル。",
						"結構おいしかったです^^",
						"ガールズトークしてました。",
						"女性人も結構飲んでいました。",
						"野菜もおいしい～。",
						"仲間のために焼いていました。",
						"まだかな～まだかな～♪",
						"食べ過ぎです。"
					);
?>
<li style="float: none; list-style: none; width: 540px; position: absolute; z-index: 50;">
	<img src="../img/event/kind3/1.jpg">
	<div class="bx-caption">
		<span><?php echo $captions[1]; ?></span>
	</div>
</li>

<?php for($pic_no=2; $pic_no<=8; $pic_no++){ ?>
<li style="float: none; list-style: none; width: 540px; position: absolute; z-index: 0; display: none;">
	<img src="../img/event/kind3/<?php echo $pic_no; ?>.jpg">
	<div class="bx-caption">
		<span><?php echo $captions[$pic_no]; ?></span>
	</div>
</li>
<?php } ?>