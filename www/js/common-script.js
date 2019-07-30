/* SP navigation */
$(function () {
  var w = $(this).width(),
    $bodyInner = $('#body-inner'),
    $spnav = $('#spnav'),
    $gnav = $('#gnav'),
    $openHbtn = $('#open-hbtn'),
    $closeHbtn = $('#close-hbtn'),
    $header = $('header');
  if (w < 768) {
    $spnav.append($gnav);
  }

  $('.hbtn').bind('touchstart click', function (event) {
    event.preventDefault();
    $bodyInner.toggleClass('open');
    $spnav.toggleClass('visible');
    $openHbtn.toggleClass('visible');
    $closeHbtn.toggleClass('visible');
    $header.toggleClass('absolute');
  });

  $(window).resize(function () {
    if ($('.hbtn').is(':hidden')) {
      $gnav.prependTo('#wrapper .inner');
    } else {
      $spnav.append($gnav);
    }
  });
});

/* Slider config */
$(window).load(function () {
  $('.slide-body').bxSlider({
    speed: 40000,
    slideWidth: 750,
    minSlides: 3,
    maxSlides: 3,
    moveSlides: 1,
    touchEnabled: true,
    swipeThreshold: 50,
    oneToOneTouch: true,
    preventDefaultSwipeX: false,
    preventDefaultSwipeY: true,
    auto: false,
    pager: false,
    controls: false,
    ticker: true
  });
  setHeight();
});

/* Slider height set */
$(function () {
  var timer = false;
  $(window).resize(function () {
    if (timer !== false) {
      clearTimeout(timer);
    }
    timer = setTimeout(function() {
      setHeight();
    }, 500);
  });
});

function setHeight() {
  var h = $('.bx-viewport').height();
  $('#slide-container').height(h+10);
}


/* Rerurn top button */
$(function() {
    var pageTop = $('#page-top');
    pageTop.hide();
    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            pageTop.fadeIn();
        } else {
            pageTop.fadeOut();
        }
    });
    pageTop.click(function () {
        $('body, html').animate({scrollTop:0}, 500, 'swing');
        return false;
    });
});


/* PC image replace */
$(function(){
    var $setElement = $('a img'),
    pcName = '_pc',
    spName = '_sp',
    replaceWidth = 650;

    $setElement.each(function(){
        var $this = $(this);
        function imgSize(){
            var windowWidth = parseInt($(window).width());
            if(windowWidth >= replaceWidth) {
                $this.attr('src',$this.attr('src').replace(spName,pcName)).css({visibility:'visible'});
            } else if(windowWidth < replaceWidth) {
                $this.attr('src',$this.attr('src').replace(pcName,spName)).css({visibility:'visible'});
            }
        }
        $(window).resize(function(){
          imgSize();
        });

        imgSize();
    });
});


/* Smart rollover */
function smartRollover() {
	if(document.getElementsByTagName) {
		var images = document.getElementsByTagName("img");

		for(var i=0; i < images.length; i++) {
			if(images[i].getAttribute("src").match("_off."))
			{
				images[i].onmouseover = function() {
					this.setAttribute("src", this.getAttribute("src").replace("_off.", "_on."));
				}
				images[i].onmouseout = function() {
					this.setAttribute("src", this.getAttribute("src").replace("_on.", "_off."));
				}
			}
		}
	}
}

if(window.addEventListener) {
	window.addEventListener("load", smartRollover, false);
}
else if(window.attachEvent) {
	window.attachEvent("onload", smartRollover);
}

function agreeclick(textid, ischecked) {
    alert(a);
    <!-- 同意された場合のみ"採用エントリーフォームへ"ボタンを押下可能に-->
    if(ischecked == true) {
        document.getElementById(textid).disabled = false;
    }
}

//window.onbeforeunload = function(event){
//	//if(((event.clientX > document.body.clientWidth) && (event.clientY<0)) || event.altKey){
//	if( event.clientY < 0 || event.altKey ) {
//		return "test？";
//	}
//	//}
//}

//$(function(){
//	var loc=false;
//	$(window).bind("beforeunload", function(e) {
//		// 確認メッセージに表示させたい文字列
//		if (!loc) {
//			return "本当に終了してもよろしいですか？";
//		}
//	});
//
//	$('a').click( function() {loc=true;});
//	$("form").submit(function(){loc=true;});
//});

