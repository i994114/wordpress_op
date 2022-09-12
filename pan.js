/*
$(function() {
    $('#wrapper-story').hover(
        function() {
            $('.li-lesson').css('color','blue');
        }
    );
});
*/

/* こいつがうまくいかん*/
/*
$(function() {
    $('#wrapper-story').hover(function() {
        var $aaa = $(this).find('.li-lesson');
        if($aaa.hasClass('open')) {
            $('h2').hide();
        } else {
            $aaa.css('color','black');
        }
    });
});
*/
/*----------------スクロールするとヘッダーの大きさを変化させる------------------------*/
$(function() {
	$(window).on('load scroll', function() {
		var scrollPos = $(this).scrollTop();
		if ( scrollPos > 100 ) {
			$('header').addClass('is-animation');
            $('header>.header-left>.header-logo>img').addClass('is-img-animation');
		} else {
			$('header').removeClass('is-animation');
            $('header>.header-left>.header-logo>img').removeClass('is-img-animation');
		}
	});
});	

/*
$(function() {
	$(window).on('load scroll', function() {
		var scrollPos = $(this).scrollTop();
		if ( scrollPos > 100 ) {
			$('header').addClass('is-animation');
		} else {
			$('header').removeClass('is-animation');
		}
	});
});	
*/
/*----------------選択するとヘッダーメニューの色が変わるようにする------------------------*/
$(function() {
    $('#wrapper-opti-how').hover(
        function() {
//            $('#gloval_navi>ul>li').addClass('menu-active');
//            $('#gloval_navi>ul>li').eq(0).css('color','red')
            $('.gloval_navi_li').eq(0).css('color','yellow');
            $('.gloval_navi_li').eq(0).css('font-weight','bold');
        },
        function() {
//            $('#gloval_navi>ul>li').removeClass('menu-active');
//            $('#gloval_navi>ul>li').eq(0).css('color','white')
            $('.gloval_navi_li').eq(0).css('color','white');
            $('.gloval_navi_li').eq(0).css('font-weight','normal')
        }
    )

    $('#wrapper-oyatsu').hover(
        function() {
            $('.gloval_navi_li').eq(1).css('color','yellow');
            $('.gloval_navi_li').eq(1).css('font-weight','bold');
        },
        function() {
            $('.gloval_navi_li').eq(1).css('color','white')
            $('.gloval_navi_li').eq(1).css('font-weight','normal')
        }
    )
    
    $('#wrapper-outi').hover(
        function() {
            $('.gloval_navi_li').eq(2).css('color','yellow');
            $('.gloval_navi_li').eq(2).css('font-weight','bold');
        },
        function() {
            $('.gloval_navi_li').eq(2).css('color','white');
            $('.gloval_navi_li').eq(2).css('font-weight','normal');
        }
    )
    
    $('#wrapper-raw').hover(
        function() {
            $('.gloval_navi_li').eq(3).css('color','yellow');
            $('.gloval_navi_li').eq(3).css('font-weight','bold');
        },
        function() {
            $('.gloval_navi_li').eq(3).css('color','white');
            $('.gloval_navi_li').eq(3).css('font-weight','normal');
        }
    )

    $('#wrapper-menu').hover(
        function() {
            $('.gloval_navi_li').eq(4).css('color','yellow');
            $('.gloval_navi_li').eq(4).css('font-weight','bold');
        },
        function() {
            $('.gloval_navi_li').eq(4).css('color','white');
            $('.gloval_navi_li').eq(4).css('font-weight','normal');
        }
    )

    $('#wrapper-profile').hover(
        function() {
            $('.gloval_navi_li').eq(5).css('color','yellow');
            $('.gloval_navi_li').eq(5).css('font-weight','bold');
        },
        function() {
            $('.gloval_navi_li').eq(5).css('color','white');
            $('.gloval_navi_li').eq(5).css('font-weight','normal');
        }
    )

    $('#qa-form').hover(
        function() {
            $('.gloval_navi_li').eq(6).css('color','yellow');
            $('.gloval_navi_li').eq(6).css('font-weight','bold');
        },
        function() {
            $('.gloval_navi_li').eq(6).css('color','white');
            $('.gloval_navi_li').eq(6).css('font-weight','normal');
        }
    )
 
});

