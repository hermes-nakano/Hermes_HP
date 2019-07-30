//トップ画像切り替え用関数
jQuery(function(){
	//トップ画像の設定
	setImages();

	delay_time = 4000;
	show_time = 3000;
	
	//HTML要素の置換
	jQuery("#image_fade").html(jQuery("#image_fade a").get().reverse());

	//画像切り替え関数
	function crossFade(){
		//delay(n)のnの数値を多くすることで、画像の切り替えが遅くなる。
		//詳細はjQueryのアニメーションイベント参照
		jQuery("#image_fade a:last").delay(delay_time).fadeOut(function(){
			jQuery(this).prependTo("#image_fade").show(show_time);
			crossFade();
		})
	}

	//画像切り替え関数の実行
	crossFade();
});

//トップ画像設定
function setImages() {
	var month = getMonthNumber();
	var element_id = "image_fade";
	document.getElementById(element_id).innerHTML = createDom(month);
	//jQuery(element_id).html(createDom(month));
}

//月取得
function getMonthNumber(){
	var now = new Date();
	return now.getMonth() + 1; 
}

//タグの取得
function createDom(month) {
	var TAG_A_PREFIX = '<a href="#" style="display: block; ">';
	var TAG_A_SUFFIX = '</a>';
	var TAG_IMG_PREFIX = '<img src="./img/top/';
	var TAG_IMG_TYPE = '.jpg"';
	var TAG_IMG_SUFFIX = ' width="750" height="200"/>';

	var tag_img = "";
	var set_tags = "";

	for(i=1; i<11; i++){
		tag_img = TAG_IMG_PREFIX + month +'/' + i + TAG_IMG_TYPE + Math.random() + TAG_IMG_SUFFIX;
		set_tags = set_tags + TAG_A_PREFIX + tag_img  + TAG_A_SUFFIX;
	}
	return set_tags;
}