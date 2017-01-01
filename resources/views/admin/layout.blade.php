<!DOCTYPE html>
<html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script>
    $(window).load(function () {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");

    });
</script>
<style>
    .no-js #loader { display : none; }

    .js #loader { display : block; position : absolute; left : 100px; top : 0; }

    .se-pre-con {
        position   : fixed;
        left       : 0px;
        top        : 0px;
        width      : 100%;
        height     : 100%;
        z-index    : 9999;
        background : url('/img/Preloader_2.gif') center no-repeat #fff;
        }
</style>
<div class="se-pre-con"></div>
<script>
    window.onload = function () {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");

    };
</script>
<head>
    <title>Asnow - Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link href="/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/gentelella/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/gentelella/vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="/gentelella/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <link href="/gentelella/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css"
          rel="stylesheet">
    <link href="/gentelella/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <link href="/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="/gentelella/vendors/switchery/dist/switchery.min.css" rel="stylesheet">

    <link href="/gentelella/vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">
    <link href="/gentelella/build/css/custom.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/admin/sweetalert.css">


    <style>
        .grid-actions {
            text-align : right;
            float      : right;
            }

        .grid-actions .btn {
            margin-left : 16px;
            }

        .sortable-handle {
            cursor : move;
            width  : 40px;
            color  : #ddd;
            }

        .id-column {
            width : 40px;
            }

        /** notifications style */
        .alert {
            font-size : 14px;
            }

        .bootstrap-growl .close {
            margin-left : 10px;
            }

        /** forms */
    </style>
    <!-- scripts-->
    <script src="/gentelella/vendors/jquery/dist/jquery.min.js"></script>
    <script src="/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/js/admin/jquery-ui.js"></script>
    <script src="/js/admin/tether.js"></script>
    {{--<script src="/js/admin/bootstrap-4.js"></script>--}}
    <script src="/js/admin/bootstrap-select.js"></script>
    <script src="/js/admin/bootstrap-switch.js"></script>
    <script src="/js/admin/bootstrap-growl.js"></script>
    <script src="/gentelella/vendors/switchery/dist/switchery.min.js"></script>
    <!-- /scripts-->
</head>
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="index.html" class="site_title"><img height="35px" width="35px" src="/logo-sign.png"
                                                                 alt="">
                        <span>Dokmeh Studio</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="/gentelella/production/images/aznow.png" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2>{{ auth()->user()->name  }}</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li><a href="/admin"><i class="fa fa-home"></i> Home </a>
                            </li>
                            <li><a><i class="fa fa-building-o"></i> Projects <span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="/admin/project">All Projects</a></li>
                                    <li><a href="/admin/project/create">Create project</a></li>
                                    <li><a href="/admin/project/sort">Sort projects</a></li>

                                </ul>
                            </li>
                            <li><a><i class="fa fa-newspaper-o"></i> Publications <span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="/admin/publications">All Publications</a></li>

                                </ul>
                            </li>
                            <li><a><i class="fa fa-trophy"></i> Awards <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="/admin/awards">All Awards</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-calendar-o"></i> Events <span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="/admin/events">All Events</a></li>
                                    <li><a href="/admin/events/create">Create Event</a></li>

                                </ul>
                            </li>

                        </ul>
                    </div>
                    <div class="menu_section">
                        <h3>Additional</h3>
                        <ul class="nav side-menu">
                            <li><a href="/admin/category/create"><i class="fa fa-list"></i> Categories</a></li>
                            <li><a href="/admin/status/create"><i class="fa fa-check-square-o"></i> Statuses</a></li>
                            <li><a href="/admin/client/create"><i class="fa fa-users"></i> Clients</a></li>
                            <li><a href="/admin/requests"><i class="fa fa-pencil-square-o"></i>
                                    Requests
                                    @if (count(App\Request::all()) == 0)

                                        <span class="badge">{{ count(App\Request::all()) }}</span>
                                    @else
                                        <span class="label label-danger">{{ count(App\Request::all()) }}</span>

                                    @endif
                                </a></li>


                        </ul>
                    </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <img src="/gentelella/production/images/aznow.png" alt="">{{ auth()->user()->name }}
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="/register"> <i class="fa fa-pencil-square-o pull-right"></i> Register </a>
                                </li>

                                <li><a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out pull-right"></i> Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>


                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->


        <!-- page content -->
        <div class="right_col" role="main">


            @yield('content')

        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Powered By Dokmeh Studio
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>
<script src="/gentelella/vendors/fastclick/lib/fastclick.js"></script>
<script src="/gentelella/vendors/nprogress/nprogress.js"></script>

<script src="/gentelella/vendors/DateJS/build/date.js"></script>

<script src="/gentelella/vendors/moment/min/moment.min.js"></script>
<script src="/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="/gentelella/build/js/custom.min.js"></script>

<script src="/js/admin/dropzone.js"></script>
<script src="/js/admin/sweetalert.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.0/tinymce.min.js"></script>
<script src="/gentelella/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
<script src="/gentelella/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="/gentelella/vendors/google-code-prettify/src/prettify.js"></script>
<script>
    $(document).ready(function () {
        $('.datetime').daterangepicker({
            singleDatePicker: true,
            calender_style  : "picker_4"
        }, function (start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#editor').bind("DOMSubtreeModified", function () {
            $('#description').html(
                $("#editor").html()
            );
        });
        function initToolbarBootstrapBindings() {
            var fonts      = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
                    'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
                    'Times New Roman', 'Verdana'
                ],
                fontTarget = $('[title=Font]').siblings('.dropdown-menu');
            $.each(fonts, function (idx, fontName) {
                fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
            });
            $('a[title]').tooltip({
                container: 'body'
            });
            $('.dropdown-menu input').click(function () {
                return false;
            })
                .change(function () {
                    $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
                })
                .keydown('esc', function () {
                    this.value = '';
                    $(this).change();
                });

            $('[data-role=magic-overlay]').each(function () {
                var overlay = $(this),
                    target  = $(overlay.data('target'));
                overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
            });

            if ("onwebkitspeechchange" in document.createElement("input")) {
                var editorOffset = $('#editor').offset();

                $('.voiceBtn').css('position', 'absolute').offset({
                    top : editorOffset.top,
                    left: editorOffset.left + $('#editor').innerWidth() - 35
                });
            } else {
                $('.voiceBtn').hide();
            }
        }

        function showErrorAlert(reason, detail) {
            var msg = '';
            if (reason === 'unsupported-file-type') {
                msg = "Unsupported format " + detail;
            } else {
                console.log("error uploading file", reason, detail);
            }
            $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
                '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
        }

        initToolbarBootstrapBindings();

        $('#editor').wysiwyg({
            fileUploadError: showErrorAlert
        });

        window.prettyPrint;
        prettyPrint();
    });
</script>
<!-- /bootstrap-wysiwyg -->

@include('partials.flash')


</body>
</html>
