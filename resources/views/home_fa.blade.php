@extends('layout_fa')

@section('content')
    <script>
        $(document).ready(function () {

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
        })

    </script>
@endsection
