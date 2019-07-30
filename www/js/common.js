/*
 * k-yamaguchi
 */
jQuery(function(){
	/*
	 * トップ ヘッダーメニュー画像切替
	 *
	 * 会社案内、事業内容、採用情報のマウスホバー、
	 * ホバーアウトに応じて、画像を切り替える
	 */
	jQuery(".h_company_menu").hover(
		function(){jQuery(this).attr("src","./img/common/navi_cr.gif")},
		function(){jQuery(this).attr("src","./img/common/navi_c.gif")}
	);

	jQuery(".h_solution_menu").hover(
		function(){jQuery(this).attr("src","./img/common/navi_sr.gif")},
		function(){jQuery(this).attr("src","./img/common/navi_s.gif")}
	);

	jQuery(".h_recruit_menu").hover(
		function(){jQuery(this).attr("src","./img/common/navi_rr.gif")},
		function(){jQuery(this).attr("src","./img/common/navi_r.gif")}
	);

	/*
	 * トップ以外 ヘッダーメニュー画像切替
	 *
	 * 会社案内、事業内容、採用情報のマウスホバー、
	 * ホバーアウトに応じて、画像を切り替える
	 */
	jQuery(".h_company_menu_no_top").hover(
		function(){jQuery(this).attr("src","../img/common/navi_cr.gif")},
		function(){jQuery(this).attr("src","../img/common/navi_c.gif")}
	);

	jQuery(".h_solution_menu_no_top").hover(
		function(){jQuery(this).attr("src","../img/common/navi_sr.gif")},
		function(){jQuery(this).attr("src","../img/common/navi_s.gif")}
	);

	jQuery(".h_recruit_menu_no_top").hover(
		function(){jQuery(this).attr("src","../img/common/navi_rr.gif")},
		function(){jQuery(this).attr("src","../img/common/navi_r.gif")}
	);

	/*
	 * トップ以外 英語ページ ヘッダーメニュー画像切替
	 *
	 * 会社案内、事業内容、採用情報のマウスホバー、
	 * ホバーアウトに応じて、画像を切り替える
	 */
	jQuery(".h_company_menu_eng_no_top").hover(
		function(){jQuery(this).attr("src","../../img/english/navi_cr.gif")},
		function(){jQuery(this).attr("src","../../img/english/navi_c.gif")}
	);

	jQuery(".h_solution_menu_eng_no_top").hover(
		function(){jQuery(this).attr("src","../../img/english/navi_sr.gif")},
		function(){jQuery(this).attr("src","../../img/english/navi_s.gif")}
	);

	jQuery(".h_recruit_menu_eng_no_top").hover(
		function(){jQuery(this).attr("src","../../img/english/navi_rr.gif")},
		function(){jQuery(this).attr("src","../../img/english/navi_r.gif")}
	);

	/*
	 * ページのトップへ画像切替
	 *
	 * ページのトップへのマウスホバー、
	 * ホバーアウトに応じて、画像を切り替える
	 */
	jQuery(".to_top_path").hover(
		function(){jQuery(this).attr("src","../img/common/top_pathr.gif")},
		function(){jQuery(this).attr("src","../img/common/top_path.gif")}
	);

	/*
	 * ページのトップへ画像切替 英語ページ
	 *
	 * ページのトップへのマウスホバー、
	 * ホバーアウトに応じて、画像を切り替える
	 */
	jQuery(".to_top_path_eng").hover(
		function(){jQuery(this).attr("src","../../img/english/top_pathr.gif")},
		function(){jQuery(this).attr("src","../../img/english/top_path.gif")}
	);

	/*
	 * フッダー コピーライト出力
	 *
	 * 現在年を取得しフッダーにコピーライトを出力する
	 */
	var copyRightEndYear = new Date(jQuery.now()).getFullYear()
	jQuery(".f_copy").text("Copyright (c) 1991-" + copyRightEndYear + " Hermes Systems Inc. All rights reserved.");
});


/*
 * k-matsui
 * 2017/10/20
 *
 * 資格ピックアップページ
 */
$(function () {
	$('.examTable tr:first-child').on('click',function(e){
	
		$target = $(this).parent().find("a");
		
		if($target.css('display') == 'none'){
			$target.css('display','inline');
		}else{
			$target.css('display','none');
		}

	});
});