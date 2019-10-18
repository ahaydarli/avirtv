@extends("layout")
@section('page', 'profile-page')
@section('title', __('Channels'))
@section('content')
    <div class="page-header header-filter" data-parallax="true" style="background-image: url('/img/city-profile.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <h1 class="title">{{ __('Channels') }}</h1>
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
                                            <div class="col-md-2 col-4">
                                                <a href="" class="btn btn-link btn-just-icon btn-twitter">
                                                   <img src="http://ministra.avirtel.az/stalker_portal/misc/logos/320/{{ $channel->id}}.png">
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
