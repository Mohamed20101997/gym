<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminGYM</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/font-awesome.min.css') }}">


    {{--<!-- iCheck -->--}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/icheck/all.css') }}">

    {{--<!-- Bootstrap 3.3.7 -->--}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/bootstrap.min.css') }}">


    <link rel="stylesheet" href="{{ asset('dashboard_files/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/skin-blue.min.css') }}">


    <link rel="stylesheet" href="{{ asset('dashboard_files/css/AdminLTE.min.css') }}">
    <script src="{{ asset('dashboard_files/js/jquery.min.js') }}"></script>


    {{--html in  ie--}}
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

</head>
<style>
    .login-card-body, .register-card-body {
        background-color: #11183c;
        border-top: 0;
        color: #666;
        padding: 20px;


    }

    .login-page{
        min-height:100%;
        background:linear-gradient(0deg, rgb(0 0 0 / 77%), rgb(6 0 70 / 51%)), url({{asset('dashboard_files/img/gym_login.jpg')}});
        background-size:cover;
        background-position: center; /* Center the image */
        background-repeat: no-repeat; /* Do not repeat the image */
    }

    .login-logo a, .register-logo a ,.login-box-msg, .register-box-msg ,#remember_text{
        color: #fff;
    }


</style>
<body class="hold-transition  login-page">

<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Admin</b>GYM</a>
    </div>


    <div class="card">

        <div class="card-body login-card-body ">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="{{route('login')}}" method="post">
                @csrf
                <div class="form-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">

                </div>
                <div class="form-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">

                </div>

                <div class="row">
                    <div class="col-md-8">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember" id="remember_text">
                            Remember Me
                        </label>
                    </div>

                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>

                </div>

            </form>

        </div>

    </div>

</div>


<script src="{{ asset('dashboard_files/js/jquery.min.js') }}"></script>


{{--<!-- Bootstrap 3.3.7 -->--}}
<script src="{{ asset('dashboard_files/js/bootstrap.min.js') }}"></script>


{{--<!-- AdminLTE App -->--}}
<script src="{{ asset('dashboard_files/js/adminlte.min.js') }}"></script>


</body>
</html>
