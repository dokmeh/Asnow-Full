$(document).ready(function () {
	window[$('body').attr('data-page')]();
	$('body').find('nav.menu ul li').click(function () {
		menu($(this));
		$('title').text($(this).find('a').attr('data-title'));
		$('body').attr('data-page', $(this).find('a').attr('data-page'));
		window.history.pushState({}, $(this).find('a').attr('data-title'), $(this).find('a').attr('href'));
		loadAjax($(this).find('a').attr('href'));
		return false;
	});
	$(window).on('popstate', function () {
		url = window.location.href.replace($('base').attr('href'), '');
		loadAjax(url);
	});
	$('.menu-but').click(function () {
		$(this).toggleClass('menu-bt-op');
		if ($('.linehand').hasClass('active')) {
			$('.linehand').attr('class', 'linehand').css('background-color', 'none');
			$('.lng-bar,.logo').removeClass('op');
		}
		else {
			$('.linehand').attr('class', 'linehand l-3-s active').css('background-color', '#000');
			$('.lng-bar,.logo').addClass('op');
		}
	});
});
var loaded = false;
function loadAjax(url, method = 'post') {
	loaded = false;
	data   = $('meta[name="_token"]').attr('content');
	$.ajax({
		url       : url,
		type      : 'get',
		dataType  : 'html',
		cache     : false,
		beforeSend: function (xhr) {
			$('.inner-ajax *').off();
		},
		success   : function (result, status, xhr) {
			$('.inner-ajax').html(result);
            // console.log(result);

            window[$('body').attr('data-page')]();
            loaded = true;
            setTimeout(function () {
            	$('.loading').removeClass('loading-open');
            }, 5000);

        }
    });
}

//Pages functions
//Home
function home() {
	$('.menu-but').hide();
	for (var i = 0; i < 17; i++) {
		$('.enter-line-h').append("<span></span>");
	}
	setTimeout(function () {
		$('.enter, .enter-text p').click(function () {
			var lang = $(this).attr('data-lang');
			$('body').removeClass('en,fa').addClass(lang);
			$('.enter').addClass('hide');
			setTimeout(function () {
				$('.enter').addClass('hide1');
			}, 400);
			setTimeout(function () {
				$('.enter').addClass('hide2');
			}, 600);
			setTimeout(function () {
				$('.linehand.l-1-s').removeClass('l-1-s').addClass('l-2-s');
			}, 1000);
			setTimeout(function () {
				$('.linehand.l-2-s').removeClass('l-2-s').addClass('l-3-s');
				$('.enter').addClass('hide3');
			}, 1600);
			setTimeout(function () {
				$('.lng-bar,.logo').addClass('op');
			}, 2000);
		});

	}, 4000);
}
function menu(obj) {
	$('.logo').removeClass('op');
	$('.lng-bar').removeClass('op');
	$('body').find('.linehand').addClass('linehand-clicked');
	$('body').find('nav ul li').removeClass('li-clicked');
	obj.addClass('li-clicked');
	setTimeout(function () {
		$('.li-clicked').addClass('li-open');
	}, 1000);
	setTimeout(function () {
		$('.loading').addClass('loading-open');
		$('.enter-line-h').addClass('enter-line-h-hide');
	}, 1500);
	setTimeout(function () {
		if (loaded == true) {
            //var posi = $(document).width() + obj.offset().left + ($(document).width() + obj.offset().left)/2;
            var leftPos = ($(document).width() + obj[0].getBoundingClientRect().left + ($(document).width() / 10));
            $('.loading').removeClass('loading-open').css('left', leftPos + 'px');
            obj.removeClass('li-clicked, li-open');
        }
    }, 3000);
	setTimeout(function () {
		obj.removeClass('li-clicked');
		$('.linehand.l-3-s').removeClass('l-3-s');
		$('.menu-but').show();
	}, 3000);
}

//Projects
function projects() {

	$('.projects-img').imageloader({
		callback: function (ele) {
			$(ele).parent().addClass('loaded');
		}
	});
	$('.projects-title').each(function () {
        //$(this).css('background-color', 'rgb(' + Math.round(Math.random() * 255) + ', ' + Math.round(Math.random() * 255) + ', ' + Math.round(Math.random() * 255) + ')');
    });
	$('body').find('.projects-box').click(function () {
		var leftPos = (($(document).width() / 10) * 3);
		$('.loading').addClass('loading-open').css('left', leftPos + 'px');
		$('body').attr('data-page', 'project');
		window.history.pushState({}, $(this).attr('data-title'), $(this).attr('href'));
		loadAjax($(this).attr('href'));
		return false;
		setTimeout(function () {
		}, 0);
	});
	$('body').find('.projects-cat-li').click(function () {
		var attr = $(this).attr('data-prcat');
		var eq   = $(this).eq();
		$('body').find('.projects-cat-li').removeClass('clicked');
		$(".projects-box").addClass("projects-box-hide");
		$(this).addClass('clicked');
		if (attr != 'all') {
			$(".projects-box[data-page=" + attr + "]").removeClass("projects-box-hide");
		} else {
			$(".projects-box").removeClass("projects-box-hide");
		}
	})
}
//Project
function project() {

    // $('.project-img').imageloader({
    //     callback: function(ele){
    //        $(ele).addClass('loaded');
    //     }
    // });
    $('.switch-bt').click(function () {
    	$(this).toggleClass('switch-bt-c');
    	$('.project-info-container').toggleClass('open-c');
    })
    $('.arrow.fullscreen, .arrow.slideshow').click(function () {
    	$(this).toggleClass('op');
    	if ($('.arrow.slideshow').hasClass('op')) {
    		stopSlideshow();
    	} else {
    		slideshow = setInterval(function () {
    			next_img()
    		}, 5000);
    	}
    });
    slideshow = setInterval(function () {
    	next_img()
    }, 5000);
    $('.arrow.fullscreen').click(function () {
    	if (!document.fullscreenElement && !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement) {
    		var element = $('.poject-img-container').get(0);
    		if (element.requestFullscreen) {
    			element.requestFullscreen();
    		}
    		else if (element.mozRequestFullScreen) {
    			element.mozRequestFullScreen();
    		}
    		else if (element.webkitRequestFullscreen) {
    			element.webkitRequestFullscreen();
    		}
    		else if (element.msRequestFullscreen) {
    			element.msRequestFullscreen();
    		}
    	}
    	else {
    		if (document.exitFullscreen) {
    			document.exitFullscreen();
    		}
    		else if (document.mozCancelFullScreen) {
    			document.mozCancelFullScreen();
    		}
    		else if (document.webkitExitFullscreen) {
    			document.webkitExitFullscreen();
    		}
    		else if (document.msExitFullscreen) {
    			document.msExitFullscreen();
    		}
    	}
    });

    function stopSlideshow() {
    	clearInterval(slideshow);
    	$('.arrow.slideshow').addClass('op');
    }

    $('.project-img-box-t').click(function () {
    	var eq = $(this).index();
    	stopSlideshow();
    	console.log(eq);
    	$('.project-img-box').find('img').removeClass('show');
    	$('.project-img-box').eq(eq).find('img').addClass('show');
    })
    $('.project-arrow.prev').click(previuos_img);
    $('.project-arrow.next').click(next_img);
    $('.project-gallery').swipe({
    	swipeLeft : function () {
    		next_img();
    	},
    	swipeRight: function () {
    		previuos_img();
    	}
    });
    $(window).keyup(function (e) {
    	if (e.which == 37) {
            //left arrow
            previuos_img();
        }
        else if (e.which == 39) {
            //right arrow
            next_img();
        }
    });
}

function previuos_img() {
	var cimg = $('.project-img').index($('.project-img.show')[0]);
	$('.project-img').eq(cimg).removeClass('show');
	cimg--;
	if (cimg < 0) {
		cimg = $('.project-img').length - 1;
	}
	$('.project-img').eq(cimg).addClass('show');
}

function next_img() {
	var cimg = $('.project-img').index($('.project-img.show')[0]);
	$('.project-img').eq(cimg).removeClass('show');
	cimg++;
	if (cimg >= $('.project-img').length) {
		cimg = 0;
	}
	$('.project-img').eq(cimg).addClass('show');
}

//Events
function publications() {
	events();
}

//Event
function events() {
	$('.projects-img').imageloader({
		callback: function (ele) {
			$(ele).parent().parent().addClass('loaded');
		}
	});
	$('body').find('.events-box').click(function () {
		var leftPos = (($(document).width() / 10) * 5);
		$('.loading').addClass('loading-open').css('left', leftPos + 'px');
		$('body').attr('data-page', 'project');
		window.history.pushState({}, $(this).attr('data-title'), $(this).attr('href'));
		loadAjax($(this).attr('href'));
		return false;
		setTimeout(function () {
		}, 0);
	});
}
function event() {
	$('.event-img').imageloader({
		callback: function (ele) {
			$(ele).addClass('loaded');
		}
	});
}
//Awards
function awards() {
	projects();
}

//Award
function award() {
	event();
}

//Contact
function contact() {
	console.log('This is contact page!');
}

//About
function about() {
	$('.about-img').imageloader({
		callback: function (ele) {
			$(ele).parent().addClass('loaded');
		}
	});
	$('.about-title').each(function () {
		$(this).css('background-color', 'rgb(' + Math.round(Math.random() * 255) + ', ' + Math.round(Math.random() * 255) + ', ' + Math.round(Math.random() * 255) + ')');
	});
}
