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
    <div class="animate form login_form">
        <section class="login_content">
            <form role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <h1>Login Form</h1>
                <div>
                    <input class="form-control" id="email" type="email" class="form-control" name="email"
                           value="{{ old('email') }}" required autofocus
                           aria-describedby="basic-addon1" placeholder="Email Address">
                </div>
                <div>
                    <input type="password" id="password" name="password" class="form-control"
                           placeholder="Password"
                           aria-describedby="basic-addon2">
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-default submit" value="Login">
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
