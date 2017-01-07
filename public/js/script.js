$(document).ready(function () {
    $('body').find('nav.menu ul li').click(function () {
        menu($(this));
        $('title').text($(this).find('a').attr('data-title'));
        $('body').attr('data-page', $(this).find('a').attr('data-page'));
        window.history.pushState({}, $(this).find('a').attr('data-title'), $(this).find('a').attr('href'));
        loadAjax($(this).find('a').attr('href'));
        $('.menu-but').removeClass('menu-bt-op');
        $('.linehand').removeClass('active');
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
        } else {
            $('.linehand').attr('class', 'linehand l-3-s active').css('background-color', '#000');
            $('.lng-bar,.logo').addClass('op');
        }
    });
});
var loaded = false;
function loadAjax(url, method = 'post') {
    loaded = false;
    data = $('meta[name="_token"]').attr('content');
    $.ajax({
        url: url,
        type: 'get',
        dataType: 'html',
        cache: false,
        beforeSend: function (xhr) {
            $('.inner-ajax *').off();
        },
        success: function (result, status, xhr) {
            $('.inner-ajax').html(result);

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
        $('.enter-line-h').append("<span></span>");
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

    }, 0);
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
            var leftPos = ($(window).width() + obj[0].getBoundingClientRect().left + ($(window).width() / 10));
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
    var leftPos = ($(window).width() / 10);
    if ($(window).width() >= 768)
        leftPos *= 3;
    $(document).find('.loading').css('left', leftPos + 'px');
    $('.projects-img').imageloader({
        callback: function (ele) {
            $(ele).parent().addClass('loaded');
        }
    });
    $('body').find('.projects-box').click(function () {
        var leftPos = (($(window).width() / 10) * 3);
        $(document).find('.loading').addClass('loading-open').css('left', leftPos + 'px');
        $('body').attr('data-page', 'project');
        window.history.pushState({}, $(this).attr('data-title'), $(this).attr('href'));
        loadAjax($(this).attr('href'));
        return false;
        setTimeout(function () {
        }, 0);
    });
    $('body').find('.projects-cat-li').click(function () {
        var attr = $(this).attr('data-prcat');
        var eq = $(this).eq();
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
    $(document).find('.project-img').first().addClass('Loaded show');
    var leftPos = (($(window).width() / 10) * 3);
    $(document).find('.loading').css('left', leftPos + 'px');
    $('body').on('click', '.switch-bt', function () {
        $(this).toggleClass('switch-bt-c');
        $('.project-info-container').toggleClass('open-c');
    })
    $(document).on('click', '.arrow.slideshow', function () {
        $(this).toggleClass('op');
        if ($('.arrow.slideshow').hasClass('op')) {
            stopSlideshow();
        } else {
            slideshow = setInterval(function () {
                next_img()
            }, 6000);
        }
    });
    slideshow = setInterval(function () {
        next_img()
    }, 6000);
    $('.arrow.fullscreen').click(function () {
        if (!document.fullscreenElement && !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement) {
            var element = $('.poject-img-container').get(0);
            if (element.requestFullscreen) {
                element.requestFullscreen();
            } else if (element.mozRequestFullScreen) {
                element.mozRequestFullScreen();
            } else if (element.webkitRequestFullscreen) {
                element.webkitRequestFullscreen();
            } else if (element.msRequestFullscreen) {
                element.msRequestFullscreen();
            }
        } else {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            } else if (document.msExitFullscreen) {
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
        //console.log(eq);
        $('.project-img-box').find('img').removeClass('show');
        $('.project-img-box').eq(eq).find('img').addClass('show');
    })
    $('.project-arrow.prev').click(previuos_img);
    $('.project-arrow.next').click(next_img);
    $('.project-gallery').swipe({
        swipeLeft: function () {
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
        } else if (e.which == 39) {
            //right arrow
            next_img();
        }
    });
    
    $('body').find('.back-but').click(function () {
        $('title').text('Projects');
        $('body').attr('data-page', 'projects');
        window.history.pushState({}, $(this).find('a').attr('data-title'), $(this).find('a').attr('href'));
        loadAjax('projects');
        $('.linehand').removeClass('active');
        return false;
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
    var leftPos = (($(window).width() / 10) * 7);
    $('.loading').css('left', leftPos + 'px');
    $('.projects-img').imageloader({
        callback: function (ele) {
            $(ele).parent().parent().addClass('loaded');
        }
    });
    $('body').find('.events-box').click(function () {
        var leftPos = (($(window).width() / 10) * 5);
        $('.loading').addClass('loading-open').css('left', leftPos + 'px');
        $('body').attr('data-page', 'project');
        window.history.pushState({}, $(this).attr('data-title'), $(this).attr('href'));
        loadAjax($(this).attr('href'));
        return false;
        setTimeout(function () {
        }, 0);
    });
}

//Event
function events() {
    var leftPos = (($(window).width() / 10) * 5);
    $('.loading').css('left', leftPos + 'px');
    $('.projects-img').imageloader({
        callback: function (ele) {
            $(ele).parent().parent().addClass('loaded');
        }
    });
    $('body').find('.events-box').click(function () {
        var leftPos = (($(window).width() / 10) * 5);
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
    var leftPos = (($(window).width() / 10) * 5);
    $('.loading').css('left', leftPos + 'px');
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
    var leftPos = (($(window).width() / 10) * 9);
    $('.loading').css('left', leftPos + 'px');
    $.getScript("https://maps.googleapis.com/maps/api/js?key=AIzaSyAohZK1o3-gNzk1hkee21a4miYPWhH_1vA&callback=initMap", function () {
        var rena = new google.maps.LatLng(35.789032, 51.485682);
        var marker;
        // Add a Home control that returns the user to London
        function HomeControl(controlDiv, map) {
            controlDiv.style.padding = '5px';
            var controlUI = document.createElement('div');
            controlUI.style.backgroundColor = '#4F4F4F';
            controlUI.style.color = '#fff';
            controlUI.style.border = '1px solid';
            controlUI.style.cursor = 'pointer';
            controlUI.style.textAlign = 'center';
            controlUI.title = 'Set map to Rena';
            controlDiv.appendChild(controlUI);
            var controlText = document.createElement('div');
            controlText.style.fontFamily = 'sans-serif';
            controlText.style.fontSize = '12px';
            controlText.style.paddingLeft = '4px';
            controlText.style.paddingRight = '4px';
            controlText.innerHTML = '<b>&lt; We are here ... ! &gt;<b>'
            controlUI.appendChild(controlText);

            // Setup click-event listener: simply set the map to London
            google.maps.event.addDomListener(controlUI, 'click', function () {
                map.setCenter(rena);
                map.setZoom(17);
            });

        }
        function initialize() {
            var mapProp = {
                center: rena,
                zoom: 12,
                styles: [
                    {
                        "featureType": "administrative",
                        "elementType": "labels.text.fill",
                        "stylers": [{
                                "featureType": "water",
                                "elementType": "geometry",
                                "stylers": [{"hue": "#71ABC3"}, {"saturation": -10}, {"lightness": -21}, {"visibility": "simplified"}]
                            }, {
                                "featureType": "landscape.natural",
                                "elementType": "geometry",
                                "stylers": [{"hue": "#7DC45C"}, {"saturation": 37}, {"lightness": -41}, {"visibility": "simplified"}]
                            }, {
                                "featureType": "landscape.man_made",
                                "elementType": "geometry",
                                "stylers": [{"hue": "#C3E0B0"}, {"saturation": 23}, {"lightness": -12}, {"visibility": "simplified"}]
                            }, {
                                "featureType": "poi",
                                "elementType": "all",
                                "stylers": [{"hue": "#A19FA0"}, {"saturation": -98}, {"lightness": -20}, {"visibility": "off"}]
                            }, {
                                "featureType": "road",
                                "elementType": "geometry",
                                "stylers": [{"hue": "#FFFFFF"}, {"saturation": -100}, {"lightness": 100}, {"visibility": "simplified"}]
                            }]
                    }
                ],
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
            // Create a DIV to hold the control and call HomeControl()
            var homeControlDiv = document.createElement('div');
            var homeControl = new HomeControl(homeControlDiv, map);
//  homeControlDiv.index = 1;
            map.controls[google.maps.ControlPosition.TOP_RIGHT].push(homeControlDiv);
            var marker = new google.maps.Marker({
                position: rena,
                icon: 'img/pin.png',
                animation: google.maps.Animation.DROP
            });

            marker.setMap(map);
            google.maps.event.addListener(marker, 'click', function () {
                map.setZoom(17);
                map.setCenter(marker.getPosition());
            });
        }
        //google.maps.event.addDomListener(window, 'load', initialize);
        $('document').ready(function () {
            initialize();
        })

    });
}

//About
function about() {
    var leftPos = (($(window).width() / 10) * 1);
    $(document).find('.loading').css('left', leftPos + 'px');
    $('.about-img').imageloader({
        callback: function (ele) {
            $(ele).parent().addClass('loaded');
        }
    });
    $('.about-title').each(function () {
        $(this).css('background-color', 'rgb(' + Math.round(Math.random() * 255) + ', ' + Math.round(Math.random() * 255) + ', ' + Math.round(Math.random() * 255) + ')');
    });
}