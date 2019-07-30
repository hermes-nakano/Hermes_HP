<?php
	$captions = array(
						"",
						"旅館の周りを散歩しました。",
						"旅館内では酒が進んでいました。",
						"盛り上がっているようでした。",
						"女性人も結構飲んでいました。",
						"何やら真剣な話をしていました。",
						"なんだか楽しそうな話をしていました。",
						"普段関わる機会の少ない仲間と話を聞いていました。",
						"随分遅くまで笑っていました。"
					);
?>
<li style="float: none; list-style: none; width: 540px; position: absolute; z-index: 50;">
	<img src="../img/event/kind2/1.jpg">
	<div class="bx-caption">
		<span><?php echo $captions[1]; ?></span>
	</div>
</li>

<?php for($pic_no=2; $pic_no<=8; $pic_no++){ ?>
<li style="float: none; list-style: none; width: 540px; position: absolute; z-index: 0; display: none;">
	<img src="../img/event/kind2/<?php echo $pic_no; ?>.jpg">
	<div class="bx-caption">
		<span><?php echo $captions[$pic_no]; ?></span>
	</div>
</li>
<?php } ?>