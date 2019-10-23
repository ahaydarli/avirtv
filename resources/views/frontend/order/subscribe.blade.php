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
                                                                <h6 class="my-0">{{ $tariff->name }}</h6>
                                                                <small class="text-muted">{{ __('Base package') }}</small>
                                                            </div>
                                                            <span class="text-muted">{{ $tariff->price }} ₼</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between">
                                                            <span>Total (₼)</span>
                                                            <strong class="total_price">{{ $tariff->price }} ₼</strong>
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
                                        <form class="needs-validation" method="POST" action="{{ route('order.order', $tariff->id) }}">
                                            @csrf
                                            <input type="hidden" class="unit_price" value="{{ $tariff->price }}">
                                            <h4 class="mb-3">Packages</h4>
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
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <div class="form-group bmd-form-group">
                                                        <select class="form-control device @error('device') is-invalid @enderror"
                                                                name="device" data-style="select-with-transition" title="{{ __('Device type') }}" data-size="7">
                                                            <option>{{ __('Choose device') }}</option>
                                                            <option value="1">{{ __('MAG devices') }}</option>
                                                            <option value="0">{{ __('Other') }}</option>
                                                        </select>
                                                        @error('device')
                                                            <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <div class="form-group bmd-form-group">
                                                        <select class="form-control subscribe-period @error('period') is-invalid @enderror"
                                                                name="period" data-style="select-with-transition" title="{{ __('Subscribe period') }}" data-size="7">
                                                            <option>{{ __('Choose period') }}</option>
                                                            @foreach($periods as $period)
                                                                <option data-type="{{ $period->type }}" data-discount="{{ $period->discount }}" data-month="{{ $period->month }}"
                                                                        value="{{ $period->id }}">{{ $period->month }} {{ __('month') }} ( -{{ $period->discount }} %)</option>
                                                            @endforeach
                                                        </select>
                                                        @error('period')
                                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3 mac_address" style="display: none">
                                                    <div class="form-group has-default bmd-form-group">
                                                        <input type="text" name="mac_address" class="form-control" placeholder="{{ __('Mac address of MAG device') }}">
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
