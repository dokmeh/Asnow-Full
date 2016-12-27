






@if ($page !== 'home')
    <script>
        var loaded = false;

        $(document).ready(function () {

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

            setTimeout(function () {
                if (loaded == true) {
                    //var posi = $(document).width() + obj.offset().left + ($(document).width() + obj.offset().left)/2;
                    var leftPos = ($(document).width() + obj[0].getBoundingClientRect().left + ($(document).width() / 10));
                    $('.loading').removeClass('loading-open').css('left', leftPos + 'px');
//                    obj.removeClass('li-clicked, li-open');
                }
            }, 3000);
            setTimeout(function () {
                obj.removeClass('li-clicked');
                $('.linehand.l-3-s').removeClass('l-3-s');
                $('.menu-but').show();
            }, 3000);
        })


    </script>
@endif



@if ($page == 'projects')
    <script>
        $(document).ready(function () {
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
        })
    </script>
@endif

@if ($page == 'project')
    <script>
        $(document).ready(function () {
            var cimg = $('.project-img').index($('.project-img')[0]);
            $('.project-img').eq(cimg).addClass('show');
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
        });

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

    </script>
@endif

@if ($page == 'contact')

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAohZK1o3-gNzk1hkee21a4miYPWhH_1vA&callback=initMap"></script>
    <script type="text/javascript">
        var rena = new google.maps.LatLng(35.789032, 51.485682);
        var marker;
        // Add a Home control that returns the user to London
        function HomeControl(controlDiv, map) {
            controlDiv.style.padding        = '5px';
            var controlUI                   = document.createElement('div');
            controlUI.style.backgroundColor = '#4F4F4F';
            controlUI.style.color           = '#fff';
            controlUI.style.border          = '1px solid';
            controlUI.style.cursor          = 'pointer';
            controlUI.style.textAlign       = 'center';
            controlUI.title                 = 'Set map to Rena';
            controlDiv.appendChild(controlUI);
            var controlText                = document.createElement('div');
            controlText.style.fontFamily   = 'sans-serif';
            controlText.style.fontSize     = '12px';
            controlText.style.paddingLeft  = '4px';
            controlText.style.paddingRight = '4px';
            controlText.innerHTML          = '<b>&lt; We are here ... ! &gt;<b>'
            controlUI.appendChild(controlText);

            // Setup click-event listener: simply set the map to London
            google.maps.event.addDomListener(controlUI, 'click', function () {
                map.setCenter(rena);
                map.setZoom(17);
            });

        }
        function initialize() {
            var mapProp        = {
                center   : rena,
                zoom     : 12,
                styles   : [
                    {
                        "featureType": "administrative",
                        "elementType": "labels.text.fill",
                        "stylers"    : [{
                            "featureType": "water",
                            "elementType": "geometry",
                            "stylers"    : [{"hue": "#71ABC3"}, {"saturation": -10}, {"lightness": -21}, {"visibility": "simplified"}]
                        }, {
                            "featureType": "landscape.natural",
                            "elementType": "geometry",
                            "stylers"    : [{"hue": "#7DC45C"}, {"saturation": 37}, {"lightness": -41}, {"visibility": "simplified"}]
                        }, {
                            "featureType": "landscape.man_made",
                            "elementType": "geometry",
                            "stylers"    : [{"hue": "#C3E0B0"}, {"saturation": 23}, {"lightness": -12}, {"visibility": "simplified"}]
                        }, {
                            "featureType": "poi",
                            "elementType": "all",
                            "stylers"    : [{"hue": "#A19FA0"}, {"saturation": -98}, {"lightness": -20}, {"visibility": "off"}]
                        }, {
                            "featureType": "road",
                            "elementType": "geometry",
                            "stylers"    : [{"hue": "#FFFFFF"}, {"saturation": -100}, {"lightness": 100}, {"visibility": "simplified"}]
                        }]
                    }
                ],
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map            = new google.maps.Map(document.getElementById("googleMap"), mapProp);
            // Create a DIV to hold the control and call HomeControl()
            var homeControlDiv = document.createElement('div');
            var homeControl    = new HomeControl(homeControlDiv, map);
//  homeControlDiv.index = 1;
            map.controls[google.maps.ControlPosition.TOP_RIGHT].push(homeControlDiv);
            var marker = new google.maps.Marker({
                position : rena,
                icon     : 'img/pin.png',
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
    </script>
@endif

@if ($page == 'about')
    <script>
        $(document).ready(function () {


            $('.about-img').imageloader({
                callback: function (ele) {
                    $(ele).parent().addClass('loaded');
                }
            });
            $('.about-title').each(function () {
                $(this).css('background-color', 'rgb(' + Math.round(Math.random() * 255) + ', ' + Math.round(Math.random() * 255) + ', ' + Math.round(Math.random() * 255) + ')');
            });
        })
    </script>
@endif

@if ($page == 'events')
    <script>
        $(document).ready(function () {
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
                $(this).attr('href');
                return false;
                setTimeout(function () {
                }, 0);
            });
        })
    </script>
@endif

@if ($page == 'event' || $page == 'publications')
    <script>
        $(document).ready(function () {
            $('.event-img').imageloader({
                callback: function (ele) {
                    $(ele).addClass('loaded');
                }
            });
        })
    </script>
@endif
