<!DOCTYPE html>
<html>
<head>
    <title>Aznow - Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--<link rel="stylesheet" type="text/css" href="{{ elixir('css/all.css') }}">--}}
    {{--<link rel="stylesheet" type="text/css"--}}
    {{--href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.5/css/bootstrap.min.css">--}}
    <link rel="stylesheet" type="text/css" href="/css/vendor.css">
    <link rel="stylesheet" type="text/css" href="/css/flat-admin.css">
    <link rel="stylesheet" type="text/css" href="/css/default.css">
    <script src="/js/vendor.js"></script>
    <script src="/js/app.js"></script>

    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.5/js/bootstrap.min.js"></script>--}}
</head>
<body>
<div class="app app-default">

    <div class="app-container app-login">
        <div class="flex-center">
            <div class="app-header"></div>
            <div class="app-body">
                <div class="loader-container text-center">
                    <div class="icon">
                        <div class="sk-folding-cube">
                            <div class="sk-cube1 sk-cube"></div>
                            <div class="sk-cube2 sk-cube"></div>
                            <div class="sk-cube4 sk-cube"></div>
                            <div class="sk-cube3 sk-cube"></div>
                        </div>
                    </div>
                    <div class="title">Logging in...</div>
                </div>
                <div class="app-block">
                    <div class="app-form">
                        <div class="form-suggestion">
                            Create an account.
                        </div>
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}

                            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">
                  <i class="fa fa-paper-plane" aria-hidden="true"></i></span>
                                <input id="name" type="text" class="form-control" placeholder="Full Name" name="name"
                                       value="{{ old('name') }}"
                                       required autofocus>
                            </div>
                            <div class="input-group">
                <span class="input-group-addon" id="basic-addon2">
                  <i class="fa fa-user" aria-hidden="true"></i></span>
                                <input placeholder="Email" id="email" type="email" class="form-control" name="email"
                                       value="{{ old('email') }}" required>
                            </div>
                            <div class="input-group">
                <span class="input-group-addon" id="basic-addon3">
                  <i class="fa fa-key" aria-hidden="true"></i></span>
                                <input placeholder="Password" id="password" type="password" class="form-control"
                                       name="password" required>
                            </div>
                            <div class="input-group">
                <span class="input-group-addon" id="basic-addon4">
                  <i class="fa fa-check" aria-hidden="true"></i></span>
                                <input placeholder="Confirm Password" id="password-confirm" type="password"
                                       class="form-control"
                                       name="password_confirmation" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
            <div class="app-footer">
            </div>
        </div>
    </div>

</div>


</body>
</html>
