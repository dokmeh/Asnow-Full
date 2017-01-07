<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Panel | Register</title>


    <link rel="stylesheet" href="/css/admin/login.css">


</head>

<body>

<div class="login_wrapper">
    <div class="form login-form">
        <section class="login_content">

            <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                {{ csrf_field() }}
                <h3>Create Account</h3>

                <div>

                    <input id="name" type="text" class="form-control" placeholder="Full Name" name="name"
                           value="{{ old('name') }}"
                           required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
                <div>

                    <input placeholder="Email" id="email" type="email" class="form-control" name="email"
                           value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
                <div>

                    <input placeholder="Password" id="password" type="password" class="form-control"
                           name="password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
                <div>

                    <input placeholder="Confirm Password" id="password-confirm" type="password"
                           class="form-control"
                           name="password_confirmation" required>
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">
                        Register
                    </button>
                </div>
            </form>

            <div class="separator">


                <div class="clearfix"></div>
                <br/>
                @if (count($errors))

                    <p class="change_link">
                    <ul>
                        @foreach ($errors as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>
                    </p>
                @endif

                <div>
                    <h1><img src="/Dokmeh-logo.svg" alt=""></h1>
                    <small>©2016 All Rights Reserved.
                        <a href="http://www.dokmeh-studio.com" style="text-decoration: none;">Dokmeh Studio</a> Privacy and Terms
                    </small>
                </div>
            </div>
            </form>
        </section>
    </div>
</div>
<script src='/js/admin/jquery-new.js'></script>
<script src="/js/admin/login.js"></script>

</body>
</html>
