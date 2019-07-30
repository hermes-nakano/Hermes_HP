<script type="text/javascript">
	//紹介ページ用スライド
	jQuery(document).ready(function(){
		runIntroPhotoArea(); //社内紹介スライド
		runEventPhotoArea(); //行事紹介スライド
		runThPhotoArea(); //行事(サムネイル)紹介スライド
		console.log(1);
		//行事紹介スライド内容切替
		jQuery(".kind").on("click",function(){
			var kind_no = jQuery(this).find(".kind-value").text();
			var kind_url = "event/kind"+ kind_no +".php";
			jQuery.ajax({
				type: "POST",
				url: kind_url,
				dataType: "html",
				cache: false
			})
			.done(function(data){
				jQuery("#event-photo-area").html(data);
				runEventPhotoArea();
			});
		});

		//社内紹介スライド開始
		function runIntroPhotoArea(){
			jQuery("#intro-photo-area").bxSlider({
				mode: "fade",
				captions: true,
				auto: true,
				pager: false,
				controls: false
			});
		}

		//行事紹介スライド開始
		function runEventPhotoArea(){
			jQuery("#event-photo-area").bxSlider({
				mode: "fade",
				captions: true,
				auto: true,
				pager: false,
				controls: false
			});
		}

		//行事紹介スライド開始
		function runThPhotoArea(){
			jQuery(".th-photo-area").bxSlider({
				minSlides: 3,
				maxSlides: 3,
				slideWidth: 170,
				slideMargin: 10,
				ticker: true,
				speed: 50000
			});
		}
	});
</script>
<table id ="recruit_table" cellspacing="0" cellpadding="0">
	<!-- タイトル -->
	<tr>
		<td class="m_bar">社内紹介</td>
	</tr>
	<!-- 縦余白 -->
	<tr>
		<td>
			<img src="../img/common/h_whitespace.gif" name="h_white_space" alt=""/>
		<td>
	</tr>
	<!-- 写真表示エリア -->
	<tr>
		<td>
			<div id="intro-photo-area">
				<li>
					<img src="../img/recruit/intro1.jpg" 
						title="環境<br>仕事のしやすい環境が整っています。技術書、通信環境も整っています。" />
				</li>
				<li>
					<img src="../img/recruit/intro2.jpg" 
						title="景色<br>9階にあるので見晴らしがいいです。晴れの日には富士山まで見えます。" />
				</li>
				<li>
					<img src="../img/recruit/intro3.jpg" 
						title="社風<br>先輩社員が直接指導を行うので、直ぐに実務についての知識を得ることが出来ます。" />
				</li>
			</div>
		</td>
	</tr>
</table>

<table id ="recruit_table" cellspacing="0" cellpadding="0">
	<!-- 縦余白 -->
	<tr>
		<td>
			<img src="../img/common/h_whitespace.gif" name="h_white_space" alt=""/>
		<td>
	</tr>
</table>

<table id="recruit_table" cellspacing="0" cellpadding="0">
	<!-- タイトル -->
	<tr>
		<td class="m_bar">行事紹介</td>
	</tr>
	<!-- 縦余白 -->
	<tr>
		<td>
			<img src="../img/common/h_whitespace.gif" name="h_white_space" alt=""/>
		<td>
	</tr>
	<!-- 写真表示エリア -->
	<tr>
		<td>
			<div id="event-photo-area">
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
				for($pic_no=1; $pic_no <= 8; $pic_no++){ 
			?>
				<li><img src="../img/event/kind1/<?php echo $pic_no; ?>.jpg"/ title="<?php echo $captions[$pic_no]; ?>"></li>
			<?php } ?>
			</div>
		</td>
	</tr>
	<!-- サムネイル写真表示エリア-->
	<tr>
		<td>
			<ul class="th-photo-area">
				<li>
					<div class="th-photo kind">
					<div class="kind-value">1</div>
					<img src="../img/event/th/kind1.jpg" />
					熱海旅行-出発
					</div>
				</li>
				<li>
					<div class="th-photo kind">
					<div class="kind-value">2</div>
					<img src="../img/event/th/kind2.jpg" />
					熱海旅行-旅館
					</div>
				</li>
				<li>
					<div class="th-photo kind">
					<div class="kind-value">3</div>
					<img src="../img/event/th/kind3.jpg" />
					熱海旅行-BBQ
					</div>
				</li>
				<li>
					<div class="th-photo kind">
					<div class="kind-value">4</div>
					<img src="../img/event/th/kind4.jpg" />
					熱海旅行-蜜柑狩り
					</div>
				</li>
				<li>
					<div class="th-photo kind">
					<div class="kind-value">5</div>
					<img src="../img/event/th/kind5.jpg" />
					伊豆大島旅行-出発
					</div>
				</li>
				<li>
					<div class="th-photo kind">
					<div class="kind-value">6</div>
					<img src="../img/event/th/kind6.jpg" />
					伊豆大島旅行-旅館
					</div>
				</li>
				<li>
					<div class="th-photo kind">
					<div class="kind-value">7</div>
					<img src="../img/event/th/kind7.jpg" />
					伊豆大島旅行-大島公園
					</div>
				</li>
				<li>
					<div class="th-photo kind">
					<div class="kind-value">8</div>
					<img src="../img/event/th/kind8.jpg" />
					伊豆大島旅行-観光
					</div>
				</li>
				<li>
					<div class="th-photo kind">
					<div class="kind-value">10</div>
					<img src="../img/event/th/kind10.jpg" />
					グアム旅行-出発
					</div>
				</li>
				<li>
					<div class="th-photo kind">
					<div class="kind-value">11</div>
					<img src="../img/event/th/kind11.jpg" />
					グアム旅行-観光
					</div>
				</li>
				<li>
					<div class="th-photo kind">
					<div class="kind-value">12</div>
					<img src="../img/event/th/kind12.jpg" />
					グアム旅行-ダイビング/プール
					</div>
				</li>
				<li>
					<div class="th-photo kind">
					<div class="kind-value">13</div>
					<img src="../img/event/th/kind13.jpg" />
					グアム旅行-ポリネシアンショー
					</div>
				</li>
			</ul>
		</td>
	</tr>
</table>
