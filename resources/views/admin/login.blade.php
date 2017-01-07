<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Panel | Login</title>


    <link rel="stylesheet" href="/css/admin/login.css">


</head>

<body>

<div class="login_wrapper">
    <div class="animate form login_form">
        <section class="login_content">
            <form role="form" method="POST" action="{{ url('/login') }}" class="login-form">
                {{ csrf_field() }}
                <h3>Login</h3>


                <div>
                    <input class="form-control" id="email" type="email" class="form-control" name="email"
                           value="{{ old('email') }}" required autofocus
                           aria-describedby="basic-addon1" placeholder="Email Address">
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
                <div>
                    <input type="password" id="password" name="password" class="form-control"
                           placeholder="Password"
                           aria-describedby="basic-addon2">
                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">
                        Login
                    </button>
                </div>
            </form>


            <div class="separator">


                <div class="clearfix"></div>
                <br/>

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
