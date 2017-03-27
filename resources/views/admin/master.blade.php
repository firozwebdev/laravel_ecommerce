<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <link rel='stylesheet' href='assets/css/theme.css'>
    <link rel='stylesheet' href="{{ asset('admin_asset/css/theme.css') }}">
    <link rel='stylesheet' href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
    <script src="//cdn.ckeditor.com/4.5.9/standard/ckeditor.js"></script>

    <link href='http://fonts.googleapis.com/css?family=Oswald:300,400,700|Open+Sans:400,700,300' rel='stylesheet' type='text/css'>

    <link href="assets/favicon.ico" rel="shortcut icon">
    <link href="assets/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    @javascript html5shiv respond.min
    <![endif]-->

    <title>Responsive Admin template based on Bootstrap 3</title>

</head>

<body>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-42863888-3', 'pinsupreme.com');
    ga('send', 'pageview');

</script>

<div class="all-wrapper">
    <div class="row">
        <div class="col-md-3">
            @include('admin.partials.sidebar')
        </div>
        <div class="col-md-9">

            <div class="content-wrapper wood-wrapper">
                <div class="content-inner">
                    <div class="page-header">
                        <div class="header-links hidden-xs">
                            <a href="notifications.html"><i class="icon-comments"></i> User Alerts</a>
                            <a href="index.html#"><i class="icon-cog"></i> Settings</a>
                            <a href="{{ route('logout') }}"><i class="icon-signout"></i> Logout</a>
                        </div>
                        <h1><i class="icon-bar-chart"></i> Dashboard</h1>
                    </div>
                   <!-- <ol class="breadcrumb">
                        <li><a href="index.html#">Home</a></li>
                        <li><a href="index.html#">Bread</a></li>
                        <li><a href="index.html#">Crumbs</a></li>
                        <li class="active">Example</li>
                    </ol>-->
                    <div class="main-content">
                        @if(Session::get('message'))
                            <div class="alert alert-success">
                                {{ Session::get('message') }}
                            </div>
                            {{ Session::put('message','') }}
                        @endif
                        @if(Session::get('error'))
                            <div class="alert alert-danger">
                                {{ Session::get('error') }}
                            </div>
                            {{ Session::put('error','') }}
                        @endif
                            @yield('main_content')
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@include('admin.partials.footer')