<script type="text/javascript">
	//紹介ページ用スライド
	jQuery(document).ready(function(){
		runIntroPhotoArea(); //社内紹介スライド
		runEventPhotoArea(); //行事紹介スライド
		runThPhotoArea(); //行事(サムネイル)紹介スライド
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
	<tr>
		<td colspan=3 class="m_bar">
			社員紹介
		</td>
	</tr>
	<tr>
		<!-- 縦余白 -->
		<td colspan=3>
			<img src="../img/common/h_whitespace.gif" name="h_white_space" alt=""/>
		<td>
	</tr>
	<tr>
		<td class="navi-text">
			<img src="../img/recruit/th_emp1.jpg" name="recruit_p1" alt="社員画像" border="0" width="185" height="185" align="left"/><br>
		</td>
		<td width="20"><!-- スペース用 -->
		</td>
		<td class="navi-text">
			<h2>システム開発部　森藤健太</h2>
			<b>課題を解決したときの喜びは大きく、価値のある知識を身につけた、という自信につながります。</b>
		</td>
	</tr>
	<tr>
		<td colspan=3 class="navi-text">
			<br>
			　プリンタ複合機を動かす組込アプリケーション開発業務をしています。<br><br>

			　プロジェクトとしては、やっと新製品開発の終わりに近づいてきたという時期で、
			実際の試作機を目の前にした検証作業なども行っています。現在の作業は全てチーム
			で行われていて、毎朝、その日の作業内容の細かい指示をいただけるようになっています。
			そのため、迷わず作業に没頭できるのが非常に嬉しいです。<br><br>

			　いちばん大変なのは課題が発生し、その都度検討・対応を行っていかなくてはならない時ですね。
			課題の検討をしていると、新たな課題が発生する場合も多く、なかなか収拾がつかないことにもなって
			しまいます。ただ、その分、解決の目処が立ってきたときの喜びは大きく、また価値のある知識を身に
			つけた、という自信にもつながります。
		</td>
	</tr>
	
	
	<tr>
		<td colspan=3><hr class="hr-dot"></td>
	</tr>
	<tr>
		<td class="navi-text">
			<img src="../img/recruit/th_emp2.jpg" name="recruit_p2" alt="社員画像" border="0" width="185" height="185" align="left"/>
		</td>
		<td width="10"><!-- スペース用 -->
		</td>
		<td class="navi-text" >
			<h2>システム開発部　藤田英理沙</h2>
			<b>いちばん変わったのは、先を見ながら作業を進められるようになったこと。</b>
		</td>
	</tr>
	<tr>
		<td colspan=3 class="navi-text">
			<br>
			　経営情報システムというアプリケーション開発業務をしています。<br><br>

			　開発依頼を受け、打合せ、設計書の作成、プログラミングというのが作業の基本
			的サイクルですが、その合間には、多いときは一日何回もレビューを行います。
			レビューと言うのは、資料をもとに出来上がった成果物を説明する作業で、ここで
			いろいろな意見を聞いて軌道修正しながら作業を進めています。もともとプログラミ
			ングの作業などは大好きでしたから、本当に自分にあった仕事をしているなと感じ
			ています。<br><br>

			　現在の業務を始めてから3年経ったところなのですが、いちばん変わったのは先
			を見ながら作業を進められるようになり無駄が少なくなった、という面ですね。それ
			と、以前は先輩などに聞くことばかりだったのですが、最近では後輩にいろいろな
			事を教える立場になったこと。そうなっていちばん感じたのは、人に理解できるよ
			うに物事を伝える難しさですね。
		</td>
	</tr>
	<tr>
		<td colspan=3><hr class="hr-dot"></td>
	</tr>
	<tr>
		<td class="navi-text">
			<img src="../img/recruit/th_emp3.jpg" name="recruit_p3" alt="社員画像" border="0" width="185" height="185" align="left"/>
		</td>
		<td width="10"><!-- スペース用 -->
		</td>
		<td class="navi-text">
			<h2>システム開発部　村上雅彦</h2>
			<b>プログラミング技術力と同じくらい、しっかりとお客様に説明できる能力が求められます</b>
		</td>
	</tr>
	<tr>
		<td colspan=3 class="navi-text">
			<br>
			　生命保険システムのネットワーク設計業務を行っています。<br><br>

			　現在の作業はネットワークの基本設計書の作成です。これは常に何人かのチー
			ムで行われるもので、工程ごとに設計書を作りながら、お客様とレビューを繰り返し、
			最終的にお客様の希望に合うように仕立て上げていくものです。<br><br>

			　こうした作業では、プログラミングなどの技術はもちろんなのですが、それと同じ
			くらい、文章を相手にわかりやすく書いたり、説明したり、きちんと伝える能力が求
			められてきます。これは学校などでは体験することのできないものなので、今の業
			務先でも先輩に仕様書や手順書の書き方、あるいはしっかりとした伝え方などを
			丁寧に教えてもらえ、大変助かっています。ただ、基本的な作業に関しては自己
			管理が基本で、毎日の作業も自分でスケジュールを企て、管理しています。です
			から、仕事の優先順位や見切りの付け方なども非常に大切だと感じています。<br>
		</td>
	</tr>
</table>


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