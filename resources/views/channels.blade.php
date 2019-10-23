@extends("layout")
@section('page', 'profile-page')
@section('title', __('Channels'))
@section('content')
    <div class="page-header header-filter" data-parallax="true" style="background-image: url('/img/city-profile.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <h1 class="title">{{ __('Tv Channels') }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="main main-raised" style="min-height: 80vh;">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-md-12 ml-auto mx-auto">
                        <div class="row">
                            <div class="social-line social-line-big-icons social-line-white">
                                <div class="container">
                                    <div class="row">
                                        @foreach($channels as $channel)
                                            <div class="col-md-2 col-4" style="margin-bottom: 30px">
                                                <a href="" class="btn btn-link btn-just-icon btn-twitter" style="height: unset">
                                                   <img src="http://ministra.avirtel.az/stalker_portal/misc/logos/320/{{ $channel->logo}}">
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection
