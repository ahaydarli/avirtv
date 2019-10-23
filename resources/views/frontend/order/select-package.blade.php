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
                        <div class="row">
                            <div class="col-md-4 order-md-2 mb-4">
                                <div class="card card-nav-tabs mar-t-10">
                                    <div class="card-body ">
                                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                                            {{ __('Selected packages') }}
                                        </h4>
                                        <ul class="list-group mb-3">
                                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                                <div>
                                                    <h6 class="my-0"></h6>
                                                    <small class="text-muted">{{ __('Base package') }}</small>
                                                </div>
                                                <span class="text-muted"> ₼</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between">
                                                <span>Total (₼)</span>
                                                <strong class="total_price"> ₼</strong>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 order-md-1">
                                <div class="card card-nav-tabs mar-t-10">
                                    <div class="card-body ">
                                        <form class="" method="POST" action="{{ route('frontend.merge-package') }}">
                                            @csrf
                                            <div class="row">
                                                @foreach($packages as $package)
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="checkContainer">
                                                                {{ $package->name }} - {{ $package->price }} ₼
                                                                <input type="checkbox" class="form-control form-check-input"
                                                                       data-ministr="{{ $package->ministra_id }}" data-price="{{ $package->price }}"
                                                                       value="{{ $package->id }}" name="package[]">
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </form>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
