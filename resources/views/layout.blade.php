<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>Aznow</title>
    <base href="{{ url('/') }}">
    <link rel="stylesheet" href="{{ elixir('css/all.css') }}">
    <script src="{{ elixir('js/all.js') }}"></script>
    {{--<link rel="stylesheet" type="text/css" href="css/reset.min.css">--}}
    {{--<link rel="stylesheet" type="text/css" href="css/style.css">--}}
    {{--<script src="js/jquery.min.js"></script>--}}
    {{--<script src="js/jquery.imageloader.js"></script>--}}
    {{--<script src="js/jquery.touchSwipe.min.js"></script>--}}

</head>
<body class="en">
<div class="linehand l-1-s">
    <nav class="menu">
        <ul>
            <li><span class="line"></span><a href="about" data-page="about" data-title="Dokframe-projects"
                                             data-en="About" data-fa="درباره ما"></a></li>
            <li><span class="line"></span><a href="projects" data-page="projects" data-title="Dokframe-projects"
                                             data-en="Projects" data-fa="پروژه ها"></a></li>
            <li><span class="line"></span><a href="events" data-page="events" data-title="Events" data-en="Events"
                                             data-fa="جوایز"></a></li>
            <li><span class="line"></span><a href="publications" data-page="publications"
                                             data-title="Dokframe-Publications" data-en="Publications"
                                             data-fa="در نشریات"></a></li>
            <li><span class="line"></span><a href="contact" data-page="contact" data-title="Dokframe-projects"
                                             data-en="Contact" data-fa="تماس "></a></li>
        </ul>
        <div class="logo">
            <a href="/"><img src="img/logo.svg" alt=""/></a>
        </div>
        <div class="lng-bar">
            <a id="fa">فا</a>
            <a id="en">En</a>
            {{--<button id="fa">فا</button>--}}
        </div>
    </nav>
</div>

@if ($page == 'home')

    <div class="enter">
        <div class="enter-line-h">

        </div>
        <div class="enter-text">
            {{--<p data-lang="en">--}}
            {{--Enter--}}
            {{--</p>--}}
            {{--<p data-lang="fa">--}}
            {{--فا--}}
            {{--</p> --}}
            <p>
                Enter
            </p>
        </div>
    </div>
@endif

<div class="loading">
    <p>
        loading
    <p class="l-dot">.</p>
    <p class="l-dot">.</p>
    <p class="l-dot">.</p>
    </p>

</div>
<div class="menu-spin">
    <div class="menu-spin-img-hl">
        <svg version="1.1" id="menu-spin" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             x="0px" y="0px"
             viewBox="0 0 397.5 397.5" style="enable-background:new 0 0 397.5 397.5;" xml:space="preserve">
                <style type="text/css">
                    .st0 { fill : none; stroke : #FFFFFF; stroke-miterlimit : 10; }
                </style>
            <rect id="XMLID_7_" width="397.5" height="397.5"/>
            <g id="XMLID_2_">
                <line id="XMLID_1_" class="st0" x1="99.2" y1="397.5" x2="99.2" y2="197.5"/>
                <line id="XMLID_3_" class="st0" x1="149.2" y1="397.5" x2="149.2" y2="197.5"/>
                <line id="XMLID_4_" class="st0" x1="198.2" y1="397.5" x2="198.2" y2="197.5"/>
                <line id="XMLID_5_" class="st0" x1="298.2" y1="397.5" x2="298.2" y2="197.5"/>
                <line id="XMLID_6_" class="st0" x1="248.2" y1="397.5" x2="248.2" y2="197.5"/>
            </g>
                </svg>
    </div>
</div>
<section class="inner-ajax" id="pjax">

    @yield('content')


</section>
<!--        <img class="menu-but" src="img/menu-icon.svg">-->
<div class="menu-but">
    <div class="inner-menu-bt">
        <span class="mile"></span><span class="mile"></span><span class="mile"></span>
    </div>
</div>
{{--<script>--}}
{{--$(document).pjax('a', '#pjax');--}}
{{--</script>--}}

<script>
    {{--var path = "{{ Request::path() }}"--}}
    {{--if (path == "fa/home") {--}}
        {{--$('body').removeClass('en');--}}
        {{--$('body').addClass('fa');--}}
    {{--}--}}
    $(document).ready(function () {
        $('#en').hide();
        $('#fa').click(function () {
            $('body').removeClass('en');
            $('body').addClass('fa');
            $('#fa').hide();
            $('#en').show()
        })

        $('#en').click(function () {
            $('body').removeClass('fa');
            $('body').addClass('en');
            $('#en').hide();
            $('#fa').show()
        })
    })

</script>
@include('partials.scripts', [$page => $page])
</body>
</html>
