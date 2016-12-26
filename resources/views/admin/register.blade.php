<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Panel | Login </title>

    <!-- Bootstrap -->
    <link href="/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/gentelella/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/gentelella/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="/gentelella/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/gentelella/build/css/custom.min.css" rel="stylesheet">
</head>
<body class="login">

<div class="login_wrapper">
    <div class="form login-form">
        <section class="login_content">

            <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                {{ csrf_field() }}
                <h1>Create Account</h1>

                <div>

                    <input id="name" type="text" class="form-control" placeholder="Full Name" name="name"
                           value="{{ old('name') }}"
                           required autofocus>
                </div>
                <div>

                    <input placeholder="Email" id="email" type="email" class="form-control" name="email"
                           value="{{ old('email') }}" required>
                </div>
                <div>

                    <input placeholder="Password" id="password" type="password" class="form-control"
                           name="password" required>
                </div>
                <div>

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

            <div class="separator">
                <p class="change_link">Aznow Panel Login
                </p>

                <div class="clearfix"></div>
                <br/>

                <div>
                    <h1><i class="fa fa-paw"></i> Dokmeh Studio</h1>
                    <p>©2016 All Rights Reserved. Dokmeh Studio Privacy and Terms
                    </p>
                </div>
            </div>
            </form>
        </section>
    </div>
</div>
</body>
</html>
