@extends('layout')
@section('page', 'profile-page')
@section('title', __('Subscribe'))
@section('content')
    <div class="page-header header-filter" data-parallax="true" style="background-image: url('/img/city-profile.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <h1 class="title">{{ __('Subscribe') }}</h1>
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
                                            {{ __('Your items') }}
                                        </h4>
                                        <ul class="list-group mb-3">
                                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                                            <div>
                                                                <h6 class="my-0">{{ $package->name }}</h6>
                                                                <small class="text-muted">Brief description</small>
                                                            </div>
                                                            <span class="text-muted">{{ $package->price }} ₼</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between">
                                                            <span>Total (₼)</span>
                                                            <strong>{{ $package->price }} ₼</strong>
                                            </li>
                                        </ul>
                                        <form class="card p-2">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Promo code">
                                                    <button type="submit" class="btn btn-danger btn-sm">{{ __('Redeem') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 order-md-1">
                                <div class="card card-nav-tabs mar-t-10">
                                    <div class="card-body ">
                                        <h4 class="mb-3">{{ __('Checkout') }}</h4>
                                        <form class="needs-validation" novalidate="" method="POST" action="{{ route('order.order', $package->id) }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <div class="form-group has-default bmd-form-group">
                                                        <select class="selectpicker device" name="device" data-style="select-with-transition" title="{{ __('Device type') }}" data-size="7">
                                                            <option disabled>{{ __('Choose device') }}</option>
                                                            <option value="1">{{ __('MAG devices') }}</option>
                                                            <option value="2">{{ __('Other') }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <div class="form-group has-default bmd-form-group">
                                                        <select class="selectpicker" name="period" data-style="select-with-transition" title="{{ __('Subscribe period') }}" data-size="7">
                                                            <option disabled>{{ __('Choose period') }}</option>
                                                            <option value="1">1 {{ __('month') }}</option>
                                                            <option value="2">2 {{ __('month') }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3 mac_address" style="display: none">
                                                    <div class="form-group has-default bmd-form-group">
                                                        <input type="text" name="mac" class="form-control" placeholder="{{ __('Mac address of MAG device') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="mb-4">
                                            <h4 class="mb-3">Payment</h4>
                                            <div class="d-block my-3">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1"> Visa card
                                                        <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1"> Master Card
                                                        <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <hr class="mb-4">
                                            <button class="btn btn-danger btn-md btn-block" type="submit">Subscribe</button>
                                        </form>
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
