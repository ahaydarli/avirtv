@extends('layout')
@section('page', 'landing-page')
@section('title', 'Avinet Iptv')
@section('content')
    <div class="page-header header-filter" data-parallax="true" style="background-image: url('/img/ip_tv2.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="title">{{__('site.watch')}}</h2>
                    <h4></h4>
                    <br>
                    <a href="" target="_blank" class="btn btn-danger btn-raised btn-lg">
                        <i class="fa fa-play"></i> @lang('site.watch_video')
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
                        <h2 class="title">{{ __('site.why_choose') }}</h2>
                        <h4 class="description">{{ __('site.live') }}</h4>
                    </div>
                </div>
                <div class="features">
                    <div class="row">
                    <?php $i=1; ?>
                    @foreach($contents as $content)
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-danger">
                                    <i class="material-icons">{{ $content->icon }}</i>
                                </div>
                                <h4 class="info-title">{!! $content->title !!}</h4>
                                <p>{!! $content->text !!}</p>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="pricing-3 section-image" data-parallax="true"  style="background-image: url('/img/price-screen.jpg'); margin: -60px 0 0;" id="pricing-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto text-center">
                    <h2 class="title">{{__('site.plan')}}</h2>
                    <h5 class="description">{{__('site.unlimited')}}</h5>
                    <div class="section-space"></div>
                </div>
            </div>
            <div class="row">
                @foreach($packages as $package)
                    <div class="col-lg-3 col-md-3">
                        <div class="card card-pricing">
                            <div class="card-body ">
                                <h4 class="card-title">{{ $package->getTranslation('name', app()->getLocale()) }}</h4>
                                <div class="icon icon-danger">
                                    <i class="material-icons">tv</i>
                                </div>
                                <h3 class="card-title">{{ $package->price }}<small> ₼</small></h3>
                                <p class="card-description">
                                    This is good if your company size is between 2 and 10 Persons.
                                </p>
                                <a href="{{ route('order.subscribe', ['package_id' => $package->id]) }}" class="btn btn-danger btn-round">{{ __('Chose plan') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-12 mx-auto ml-auto text-center">
                    <a class="btn btn-danger btn-round" href="{{ route('pricing') }}">
                        {{ __('All packages') }}
                        <i class="material-icons">keyboard_arrow_right</i>
                        <div class="ripple-container"></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="section section-blog">
        <div class="container">
            <h2 class="section-title">@lang('site.latest_articles')</h2>
            <div class="row">
                @foreach($articles as $article)
                    <div class="col-md-4">
                        <div class="card card-blog">
                            <div class="card-header card-header-image">
                                <a href="#pablo">
                                    <img src="{{asset('uploads/article/'.$article->image)}}" alt="">
                                </a>
                                <div class="colored-shadow"
                                     style="background-image: url(/img/dg9.jpg); opacity: 1;"></div>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="{{ route('front.article.show',[$article->slug]) }}">{{$article->title}}</a>
                                </h4>
                                <p class="card-description">
                                    {!! Str::limit($article->subtitle, 100, ' ...') !!}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
@endsection()
