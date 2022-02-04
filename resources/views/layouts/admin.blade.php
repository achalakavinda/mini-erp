<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Information Management  System | IMS</title>
    <link rel="shortcut icon" href="{!! asset('img/logo.png') !!}" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {!! Html::style('admin/bower_components/bootstrap/dist/css/bootstrap.min.css?v='.env('APP_VERSION') ) !!}
    <!-- Font Awesome -->
    {!! Html::style('admin/bower_components/font-awesome/css/font-awesome.min.css?v='.env('APP_VERSION')) !!}
    <!-- Ionicons -->
    {!! Html::style('admin/bower_components/Ionicons/css/ionicons.min.css?v='.env('APP_VERSION')) !!}
    <!-- Theme style -->
    {!! Html::style('admin/css/AdminLTE.min.css?v='.env('APP_VERSION')) !!}
    {!! Html::style('admin/css/skins/skin-blue.min.css?v='.env('APP_VERSION')) !!}
    {!! Html::style('admin/css/main-app.css?v='.env('APP_VERSION')) !!}
    <style>
        .form-group{
            padding-left:5px;
            padding-right: 5px;
        }
    </style>

    @yield('style')

    <script type="text/javascript">
        var pageDate = {
            base_url: '{{ url('/') }}',
            api_url: '{{ url('api') }}',
            _token: '{{ csrf_token() }}',
            api_token: '{{ Auth::user()->api_token }}'
        };
    </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    {!! Html::style('admin/css/semantic.min.css?v='.env('APP_VERSION')) !!}
</head>


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
        @include('layouts.components.main-header')
    <!-- /Main Header -->
    <!-- Left side column. contains the logo and sidebar -->
    <!-- main sidebar -->
        @include('layouts.components.main-sidebar')
    <!-- /main sidebar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           @yield('main-content-header')
        </section>
        <!-- Main content -->
        <section class="content container-fluid">
            @yield('main-content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Main Footer -->
        @include('layouts.components.main-footer')
    <!-- /Main Footer -->
    @yield('model')
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 3 -->
{!! Html::script('admin/bower_components/jquery/dist/jquery.min.js?v='.env('APP_VERSION')) !!}
<!-- Bootstrap 3.3.7 -->
{!! Html::script('admin/bower_components/bootstrap/dist/js/bootstrap.min.js?v='.env('APP_VERSION')) !!}
<!-- AdminLTE App -->
{!! Html::script('admin/js/adminlte.min.js?v='.env('APP_VERSION')) !!}
{!! Html::script('admin/js/semantic.min.js?v='.env('APP_VERSION')) !!}

<script src="{{ mix('js/app.js') }}"></script>


@yield('js')
@stack('js-stack')
</body>
</html>
