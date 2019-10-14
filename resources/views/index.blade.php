@extends('layout')
@section('page', 'landing-page')
@section('title', 'Avinet Iptv')
@section('content')
    <div class="page-header header-filter" data-parallax="true" style="background-image: url('/img/bg9.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="title">Watch the best of live streaming TV  and On Demand shows on your favorite devices</h2>
                    <h4></h4>
                    <br>
                    <a href="" target="_blank" class="btn btn-danger btn-raised btn-lg">
                        <i class="fa fa-play"></i> Watch video
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="main main-raised">
        <div class="container">
            <div class="section text-center">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <h2 class="title">Why choose us</h2>
                        <h4 class="description">Stream TV live and on demand — anytime, anywhere, all on your</h4>
                    </div>
                </div>
                <div class="features">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-info">
                                    <i class="material-icons">tv</i>
                                </div>
                                <h4 class="info-title">200+ channels</h4>
                                <p> Ən çox baxılan 200-dən çox müxtəlif kanallar və radiolar</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-warning">
                                    <i class="material-icons">language</i>
                                </div>
                                <h4 class="info-title">İnternational channels</h4>
                                <p> Rus, Türk, İngilis dilli və müxtəlif janrlarda olan geniş seçim imkanı</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-danger">
                                    <i class="material-icons">hd</i>
                                </div>
                                <h4 class="info-title">HD sports</h4>
                                <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-success">
                                    <i class="material-icons">extension</i>
                                </div>
                                <h4 class="info-title">Compatibility</h4>
                                <p>MAG, Dreamlink T1, Avov, Android, WebTV (browser), and XBMC/KODI are the supported platforms.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-primary">
                                    <i class="material-icons">subscriptions</i>
                                </div>
                                <h4 class="info-title">NO SATELLITE OR CABLE</h4>
                                <p> Heç bir peyk anteninə və ya əlavə kabel çəkilişinə ehtiyac olmadan quraşdırılma </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-rose">
                                    <i class="material-icons">contact_support</i>
                                </div>
                                <h4 class="info-title">Great support</h4>
                                <p>Our live chat is accessible M-F 24/5, and support ticketing system is available 24/7 to assistance you when</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="pricing-3 section-image" data-parallax="true"  style="background-image: url('/img/price-screen.jpg'); margin: -60px 0 0;" id="pricing-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto text-center">
                    <h2 class="title">Pick the best plan for you</h2>
                    <h5 class="description">You have Free Unlimited Updates and Premium Support on each package.</h5>
                    <div class="section-space"></div>
                </div>
            </div>
            <div class="row">
                @foreach($packages as $package)
                <div class="col-md-4 ml-auto">
                    <div class="card card-pricing">
                        <div class="card-body ">
                            <h6 class="card-category">{{ $package->getTranslation('name', app()->getLocale()) }}</h6>
                            <h1 class="card-title">
                                <small>₼</small>{{ $package->price }}
                                <small>/mo</small>
                            </h1>
                            <ul>
                                <li>
                                    <b>51</b> Channels</li>
                                <li>
                                    <b>10</b> Team Members</li>
                                <li>
                                    <b>50</b> Personal Contacts</li>
                                <li>
                                    <b>500</b> Messages</li>
                            </ul>
                            <a href="{{ route('order.subscribe', ['package_id' => $package->id]) }}" class="btn btn-danger btn-round">
                                Get Started
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
{{--                <div class="col-md-4 mr-auto">--}}
{{--                    <div class="card card-pricing card-raised bg-danger">--}}
{{--                        <div class="card-body">--}}
{{--                            <h6 class="card-category">HD</h6>--}}
{{--                            <h1 class="card-title">--}}
{{--                                <small>$</small>199--}}
{{--                                <small>/mo</small>--}}
{{--                            </h1>--}}
{{--                            <ul>--}}
{{--                                <li>--}}
{{--                                    <b>47</b> Channels</li>--}}
{{--                                <li>--}}
{{--                                    <b>100</b> Team Members</li>--}}
{{--                                <li>--}}
{{--                                    <b>550</b> Personal Contacts</li>--}}
{{--                                <li>--}}
{{--                                    <b>50.000</b> Messages</li>--}}
{{--                            </ul>--}}
{{--                            <a href="#pablo" class="btn btn-white btn-round">--}}
{{--                                Get Started--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

            </div>
        </div>
    </div>
    <div class="section section-blog">
        <div class="container">
            <h2 class="section-title">Latest Articles</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-blog">
                        <div class="card-header card-header-image">
                            <a href="#pablo">
                                <img src="assets/img/comparibility-1.jpg" alt="">
                            </a>
                            <div class="colored-shadow" style="background-image: url(assets/img/comparibility-1.jpg); opacity: 1;"></div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#pablo">Set box is relased</a>
                            </h4>
                            <p class="card-description">
                                Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-blog">
                        <div class="card-header card-header-image">
                            <a href="#pablo">
                                <img src="assets/img/comparibility-1.jpg" alt="">
                            </a>
                            <div class="colored-shadow" style="background-image: url(&quot;../assets/img/dg10.jpg&quot;); opacity: 1;"></div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#pablo">Set box is relased</a>
                            </h4>
                            <p class="card-description">
                                Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-blog">
                        <div class="card-header card-header-image">
                            <a href="#pablo">
                                <img src="assets/img/comparibility-1.jpg" alt="">
                            </a>
                            <div class="colored-shadow" style="background-image: url(&quot;../assets/img/dg9.jpg&quot;); opacity: 1;"></div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#pablo">Set box is relased</a>
                            </h4>
                            <p class="card-description">
                                Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
