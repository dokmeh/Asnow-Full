<!DOCTYPE html>
<html>
<head>
    {{ $event = NULL }}
    <title>Aznow - Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" type="text/css" href="/css/vendor.css">
    <link rel="stylesheet" type="text/css" href="/css/flat-admin.css">
    <link rel="stylesheet" type="text/css" href="/css/default.css">
    <link rel="stylesheet" type="text/css" href="/css/admin/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="/css/admin/dropzone.css">

    <script src="/js/admin/jquery-new.js"></script>
    <script src="/js/admin/jquery-ui.js"></script>
    <script src="/js/admin/tether.js"></script>
    <script src="/js/admin/bootstrap-4.js"></script>
    <script src="/js/admin/bootstrap-select.js"></script>
    <script src="/js/admin/bootstrap-switch.js"></script>
    <script src="/js/admin/bootstrap-growl.js"></script>
    <script src="/js/admin/dropzone.js"></script>
    <script src="/js/admin/sweetalert.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.0/tinymce.min.js"></script>
    <script>tinymce.PluginManager.add('placeholder', function (editor) {
            editor.on('init', function () {
                var label = new Label;
                onBlur();
                tinymce.DOM.bind(label.el, 'click', onFocus);
                editor.on('focus', onFocus);
                editor.on('blur', onBlur);
                editor.on('change', onBlur);
                editor.on('setContent', onBlur);
                function onFocus() {
                    if (!editor.settings.readonly === true) {
                        label.hide();
                    }
                    editor.execCommand('mceFocus', false);
                }

                function onBlur() {
                    if (editor.getContent() == '') {
                        label.show();
                    } else {
                        label.hide();
                    }
                }
            });
            var Label            = function () {
                var placeholder_text     = editor.getElement().getAttribute("placeholder") || editor.settings.placeholder;
                var placeholder_attrs    = editor.settings.placeholder_attrs || {
                        style: {
                            position     : 'absolute',
                            top          : '2px',
                            left         : 0,
                            color        : '#aaaaaa',
                            padding      : '.25%',
                            margin       : '5px',
                            width        : '80%',
                            'font-size'  : '17px !important;',
                            overflow     : 'hidden',
                            'white-space': 'pre-wrap'
                        }
                    };
                var contentAreaContainer = editor.getContentAreaContainer();
                tinymce.DOM.setStyle(contentAreaContainer, 'position', 'relative');
                this.el = tinymce.DOM.add(contentAreaContainer, "label", placeholder_attrs, placeholder_text);
            }
            Label.prototype.hide = function () {
                tinymce.DOM.setStyle(this.el, 'display', 'none');
            }
            Label.prototype.show = function () {
                tinymce.DOM.setStyle(this.el, 'display', '');
            }
        });

        tinymce.init({selector: "textarea", plugins: ["placeholder"]});
    </script>
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
</head>
<body>
<div class="app app-default">
    <aside class="app-sidebar" id="sidebar">
        <div class="sidebar-header">
            <a class="sidebar-brand" href="/admin"><span class="highlight">D-S</span> CMS</a>
            <button type="button" class="sidebar-toggle">
                <i class="fa fa-times"></i>
            </button>
        </div>

        <div class="sidebar-menu">
            <ul class="sidebar-nav">
                <li class="{{ Request::is('admin') ? 'active' : ' ' }}">
                    <a href="/admin">
                        <div class="icon">
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                        </div>
                        <div class="title">Dashboard</div>
                    </a>
                </li>


                <li class="dropdown @if (Request::is('admin/project/create')))
                    active
                @endif">
                    <a href="/admin/project/create" class="dropdown-toggle" data-toggle="dropdown">
                        <div class="icon">
                            <i class="fa fa-file-o" aria-hidden="true"></i>
                        </div>
                        <div class="title">Projects</div>
                    </a>
                    <div class="dropdown-menu">
                        <ul>
                            <li class="section"><i class="fa fa-file-o" aria-hidden="true"></i> Projects</li>
                            <li><a href="/admin/project/create">Add a new Project</a></li>
                            <li><a href="/admin/category/create">Add a Category</a></li>
                            <li><a href="/admin/status/create">Add a Status</a></li>
                            <li class="line"></li>
                            <li class="section"><i class="fa fa-file-o" aria-hidden="true"></i> Landing</li>
                            <!-- <li><a href="./pages/landing.html">Landing</a></li> -->
                            <li><a href="/admin/project/sort">Sorting</a></li>
                            <li><a href="/admin/publications">Publications</a></li>
                            <li><a href="/admin/awards">Awards</a></li>
                            <!-- <li><a href="./pages/404.html">404</a></li> -->
                        </ul>
                    </div>
                </li>


                <li class="dropdown {{ Request::is('admin/events') ? 'active' : ' ' }}">
                    <a href="/admin/events" class="dropdown-toggle" data-toggle="dropdown">
                        <div class="icon">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                        </div>
                        <div class="title">Events</div>
                    </a>
                    <div class="dropdown-menu">
                        <ul>
                            <li class="section"><i class="fa fa-calendar" aria-hidden="true"></i> Events</li>
                            <li><a href="/admin/events">All events</a></li>
                            <li><a href="/admin/events/create">Add a Event</a></li>

                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <div class="sidebar-footer">
            <ul class="menu">
                <li>
                    <a href="/" class="dropdown-toggle" data-toggle="dropdown">
                        <p>Engineered by Dokmeh-Studio</p>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <script type="text/ng-template" id="sidebar-dropdown.tpl.html">
        <div class="dropdown-background">
            <div class="bg"></div>
        </div>
        <div class="dropdown-container">

        </div>
    </script>
    <div class="app-container">

        <nav class="navbar navbar-default" id="navbar">
            <div class="container-fluid">
                <div class="navbar-collapse collapse in">
                    <ul class="nav navbar-nav navbar-mobile">
                        <li>
                            <button type="button" class="sidebar-toggle">
                                <i class="fa fa-bars"></i>
                            </button>
                        </li>
                        <li class="logo">
                            <a class="navbar-brand" href="#"><span class="highlight">D-S</span> CMS</a>
                        </li>
                        <li>
                            <button type="button" class="navbar-toggle">
                                {{--<img class="profile-img" src="./assets/images/profile.png">--}}
                            </button>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-left">
                        <li class="navbar-title">Aznow Gallery</li>
                        <li class="navbar-search hidden-sm">
                            <input id="search" type="text" placeholder="Search.." autocomplete="off">
                            <button class="btn-search" style="margin-bottom: 9.5px; margin-left: -2.5px;"><i
                                        class="fa fa-search"></i>
                            </button>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">


                        <li class="dropdown profile">
                            <a href="/html/pages/profile.html" class="dropdown-toggle" data-toggle="dropdown">
                                <div class="icon"><i class="fa fa-user fa-4x" aria-hidden="true"></i></div>
                                <div class="title">Profile</div>
                            </a>
                            <div class="dropdown-menu">
                                <div class="profile-info">
                                    @if (auth()->check())

                                        <h4 class="username">{{ Auth::user()->name }}</h4>@endif
                                </div>
                                <ul class="action">
                                    <li>
                                        <a href="/admin/register">
                                            Register new User
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ url('/logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        @yield('content')


        <footer class="app-footer">
            <div class="row">
                <div class="col-xs-12">
                    <div class="footer-copyright">
                        Copyright © 2016 Dokmeh-Studio Co,Ltd.
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
@include('partials.flash')
<script>


    Dropzone.options.myAwesomeDropzone = {
        paramName    : "file",
        acceptedFiles: '.jpg, .jpeg, .png, .JPG, .JPEG, .bmp, .PNG',
        clickable    : true,
//        addRemoveLinks: true,
    }
    ;
</script>
</body>
</html>
