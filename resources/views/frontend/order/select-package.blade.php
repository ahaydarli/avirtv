@extends('layout')
@section('page', 'profile-page')
@section('title', __('Subscribe'))
@section('content')
    <div class="page-header header-filter" data-parallax="true" style="background-image: url('/img/city-profile.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <h1 class="title">{{ __('Select package') }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="main main-raised" style="min-height: 80vh;">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-md-12 ml-auto mx-auto">
                        <div class="col-md-8 order-md-1">
                                    <form class="" method="POST" action="{{ route('frontend.index') }}">
                                        @csrf
                                        <div class="row">
                                        @foreach($packages as $package)
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="checkContainer">
                                                            {{ $package->name }}
                                                            <input type="checkbox" class="form-control form-check-input" value="{{ $package->id }}" name="package">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                        @endforeach
                                        </div>
                                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
