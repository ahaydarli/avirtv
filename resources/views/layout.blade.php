<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>
        @yield('title')
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <link rel="canonical" href="#"/>
    <!--  Social tags      -->
    <meta name="keywords" content="iptv, baki, ip, tv, kanal">
    <meta name="description" content="Avirnet iptv">
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Iptv">
    <meta itemprop="description" content="Avirnet iptv">
    <meta itemprop="image" content="#">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@avirnet">
    <meta name="twitter:title" content="Avirnet iptv">
    <meta name="twitter:description" content="Avirnet iptv">
    <meta name="twitter:creator" content="@avirnet">
    <meta name="twitter:image" content="#">
    <!-- Open Graph data -->
    <meta property="fb:app_id" content="#">
    <meta property="og:title" content="Avirnet iptv"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="3"/>
    <meta property="og:image" content=""/>
    <meta property="og:description" content="Avirnet iptv"/>
    <meta property="og:site_name" content="Avirnet"/>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->

<!--
    <link href="{{ asset('css/material-kit.min1036.css?v=2.1.1') }}" rel="stylesheet"/>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/custom.css') }}demo/demo.css" rel="stylesheet"/>
    <link href="{{ asset('demo/vertical-nav.css')}}" rel="stylesheet"/>

    -->

    <link href="/css/material-kit.min1036.css?v=2.1.1" rel="stylesheet"/>
    <link rel="stylesheet" href="/css/custom.css">
    <link rel="stylesheet" href="/demo/demo.css">
    <link rel="stylesheet" href="/demo/vertical-nav.css">
</head>

<body class="@yield('page') sidebar-collapse">
<nav class="navbar bg-dark  fixed-top navbar-expand-lg " id="sectionsNav">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="#">
                <img alt="logo" class="img-fluid index-logo" src="/img/iptvlogo2.png"/> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="dropdown nav-item">
                    <a href="{{ url('/') }}" class="nav-link">
                        <i class="material-icons">home</i> @lang('site.home')
                    </a>

                </li>
                <li class="dropdown nav-item">
                    <a href="{{route('about')}}" class="nav-link">
                        <i class="material-icons">information</i> @lang('site.about_us')
                    </a>

                </li>
                <li class="dropdown nav-item">
                    <a href="{{route('pricing')}}" class="nav-link">
                        <i class="material-icons">stars</i> @lang('site.pricing')
                    </a>
                </li>
                <li class="dropdown nav-item">
                    <a href="{{route('frontend.faq')}}" class="nav-link">
                        <i class="material-icons">question_answer</i> @lang('site.faq')
                    </a>
                </li>
                <li class="dropdown nav-item">
                    <a href="{{route('frontend.contact')}}" class="nav-link">
                        <i class="material-icons">contactless</i> @lang('site.contact_us')
                    </a>
                </li>
                <li class="dropdown nav-item">
                    <a href="#pablo" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false">
                        <i class="material-icons">language</i>
                        <b class="caret"></b>
                        <div class="ripple-container"></div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        @foreach($languages as $language)
                            <a href="{{ route('set-locale', ['locale' => $language->code]) }}"
                               class="dropdown-item">{{ $language->name }}</a>
                        @endforeach

                    </div>
                </li>
                <li class="button-container nav-item iframe-extern">
                @auth
                    <li class="button-container dropdown nav-item iframe-extern">
                        <a href="#" class="dropdown-toggle btn btn-danger btn-round btn-block" data-toggle="dropdown"
                           aria-expanded="true">
                            <i class="material-icons">account_box</i> Account
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
                            <a href="#pablo" class="dropdown-item">Profile</a>
                            <a href="#pablo" class="dropdown-item">Subscription</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="material-icons">logout</i>
                                {{ __('Logout') }}
                            </a>
                        </div>
                    </li>
                @endauth
                @guest
                    <li class="button-container nav-item iframe-extern">
                        <a href="{{ route('login') }}" class="btn  btn-danger btn-round btn-block">
                            <i class="material-icons">fingerprint</i> @lang('site.login')
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<footer class="footer footer-white footer-big">
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-md-3">
                    <a href="#pablo">
                        <h5>Avirnet IpTv</h5>
                    </a>
                    <p>Probably the best UI Kit in the world! We know you've been waiting for it, so don't be shy!</p>
                </div>
                <div class="col-md-2">
                    <h5>@lang('site.about')</h5>
                    <ul class="links-vertical">
                        <li>
                            <a href="#pablo">
                                @lang('site.blog')
                            </a>
                        </li>
                        <li>
                            <a href="#pablo">
                                @lang('site.about_us')
                            </a>
                        </li>
                        <li>
                            <a href="#pablo">
                               @lang('site.presentation')
                            </a>
                        </li>
                        <li>
                            <a href="#pablo">
                               @lang('site.contact_us')
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h5>Market</h5>
                    <ul class="links-vertical">
                        <li>
                            <a href="#pablo">
                               @lang('site.sales_faq')
                            </a>
                        </li>
                        <li>
                            <a href="#pablo">
                                @lang('site.how_register')
                            </a>
                        </li>
                        <li>
                            <a href="#pablo">
                               @lang('site.seel_goods')
                            </a>
                        </li>
                        <li>
                            <a href="#pablo">
                                Receive Payment
                            </a>
                        </li>
                        <li>
                            <a href="#pablo">
                                Transactions Issues
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h5>Legal</h5>
                    <ul class="links-vertical">
                        <li>
                            <a href="#pablo">
                                Transactions FAQ
                            </a>
                        </li>
                        <li>
                            <a href="#pablo">
                                Terms &amp; Conditions
                            </a>
                        </li>
                        <li>
                            <a href="#pablo">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>{{ __('site.subscribe') }}</h5>
                    <p>
                        Join our newsletter and get news in your inbox every week! We hate spam too, so no worries about
                        this.
                    </p>
                    <form class="form form-newsletter" method="" action="#">
                        <div class="form-group bmd-form-group">
                            <input type="email" class="form-control" placeholder="@lang('site.email')...">
                        </div>
                        <button type="button" class="btn btn-danger btn-just-icon" name="button">
                            <i class="material-icons">mail</i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <hr>
        <ul class="social-buttons">
            <li>
                <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter">
                    <i class="fa fa-twitter"></i>
                </a>
            </li>
            <li>
                <a href="#pablo" class="btn btn-just-icon btn-link btn-facebook">
                    <i class="fa fa-facebook-square"></i>
                </a>
            </li>
            <li>
                <a href="#pablo" class="btn btn-just-icon btn-link btn-dribbble">
                    <i class="fa fa-dribbble"></i>
                </a>
            </li>
            <li>
                <a href="#pablo" class="btn btn-just-icon btn-link btn-google">
                    <i class="fa fa-google-plus"></i>
                </a>
            </li>
            <li>
                <a href="#pablo" class="btn btn-just-icon btn-link btn-youtube">
                    <i class="fa fa-youtube-play"></i>
                </a>
            </li>
        </ul>
        <div class="copyright pull-center">
            Copyright ©
            <script>
                document.write(new Date().getFullYear())
            </script>
            2019 Avirnet IpTv Rights Reserved.
        </div>
    </div>
</footer>

<script src="{{ asset('js/core/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/plugins/moment.min.js') }}"></script>

<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->


<script src="{{ asset('js/plugins/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->


<<<<<<< HEAD
<script src="{{ asset('js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
=======
 <script src="{{ asset('js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
>>>>>>> c439d8f93451a715a73e62200fc4597088d71f0b
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGat1sgDZ-3y6fFe6HD7QUziVC6jlJNog"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="{{ asset('https://buttons.github.io/buttons.js') }}"></script>
<!--	Plugin for Sharrre btn -->
<script src="{{ asset('js/plugins/jquery.sharrre.js') }}" type="text/javascript"></script>
<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="{{ asset('js/plugins/bootstrap-tagsinput.js') }}"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{ asset('js/plugins/bootstrap-selectpicker.js') }}" type="text/javascript"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{ asset('js/plugins/jasny-bootstrap.min.js') }}" type="text/javascript"></script>
<!--	Plugin for Small Gallery in Product Page -->
<script src="{{ asset('js/plugins/jquery.flexisel.js') }}" type="text/javascript"></script>
<!-- Plugins for presentation and navigation  -->
<script src="{{ asset('demo/modernizr.js') }}" type="text/javascript"></script>
<script src="{{ asset('demo/vertical-nav.js') }}" type="text/javascript"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="{{ asset('demo/vertical-nav.js') }}"></script>
<!-- Js With initialisations For Demo Purpose, Don't Include it in Your Project -->
<script src="{{ asset('demo/demo.js') }}" type="text/javascript"></script>
<!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('js/material-kit.min1036.js?v=2.1.1') }}" type="text/javascript"></script>
<script src="{{ asset('js/custom.js?v=1') }}" type="text/javascript"></script>


<script>
    $(document).ready(function () {
        //init DateTimePickers
        materialKit.initFormExtendedDatetimepickers();

        // Sliders Init
        materialKit.initSliders();
    });
</script>
</body>
