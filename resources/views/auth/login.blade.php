<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Login Template Credits to  Colorlib -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Kreston MNS & Co | PMIS</title>
    <link rel="shortcut icon" href="{!! asset('img/logo.png') !!}" />
    <!--===============================================================================================-->
    {!! Html::style('admin/bower_components/bootstrap/dist/css/bootstrap.min.css') !!}
    <!--===============================================================================================-->
    <!-- Font Awesome -->
    {!! Html::style('admin/bower_components/font-awesome/css/font-awesome.min.css') !!}

    {!! Html::style('css/util.css') !!}
    {!! Html::style('css/login.css') !!}
    <!--===============================================================================================-->
</head>
    <body>
        <div class="limiter">
            <div class="container-login100">

                <div class="login100-more" style="background-image: url('{!! asset('img/bg-01.jpg') !!}');"></div>

                <div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">

                    <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                        @csrf
                            <span class="login100-form-title p-b-59">
                                Sign In
                            </span>

                        <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                            <span class="label-input100">Email</span>
                            <input id="email" type="email" class="input100" name="email" value="{{ old('email') }}" required autofocus>
                            <span class="focus-input100"></span>
                        </div>


                        <div class="wrap-input100 validate-input" data-validate = "Password is required">
                            <span class="label-input100">Password</span>
                            <input id="password" type="password" class="input100" name="password" required>
                            <span class="focus-input100"></span>
                        </div>


                            @if ($errors->has('email'))
                                <div>
                                    <span style="color: red" class="invalid-feedback" role="alert">
                                                    <strong>*{{ $errors->first('email') }}</strong>
                                                </span>
                                    <br/>
                                </div>
                            @endif


                            @if ($errors->has('password'))
                                <div>
                                    <span style="color: red" class="invalid-feedback" role="alert">
                                                <strong>*{{ $errors->first('password') }}</strong>
                                            </span>
                                    <br/>
                                </div>
                             @endif



                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button type="submit" class="login100-form-btn">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>

                    </form>


                </div>
            </div>
        </div>

    <!-- jQuery 3 -->
    {!! Html::script('admin/bower_components/jquery/dist/jquery.min.js') !!}
    <!-- Bootstrap 3.3.7 -->
    {!! Html::script('admin/bower_components/bootstrap/dist/js/bootstrap.min.js') !!}
    </body>
</html>
