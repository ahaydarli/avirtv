@extends('layout')
@section('page', 'profile-page')
@section('title', __('Payment'))
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
                <div class="col-lg-8 col-md-8 ml-auto mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <address>
                                        <strong>{{ $subscription->user->name }}</strong>
                                    </address>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                                    <p>
                                        <em>Date: {{ $subscription->created_at }}</em>
                                    </p>
                                    <p>
                                        <em>Receipt #: {{ $subscription->account_number }}</em>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="text-center">
                                    <h3>Receipt</h3>
                                </div>
                                </span>
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>{{ __('Period') }}</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="col-md-9"><em><h4>{{ $subscription->tariff->name }}</h4></em></td>
                                        <td class="col-md-1"> {{ $subscription->month->month }} {{ __('month') }} </td>
                                        <td class="col-md-1 text-center">{{ $subscription->tariff->price }}</td>
                                        <td class="col-md-1 text-center">{{ $subscription->amount }}</td>
                                    </tr>
                                    <tr>
                                        <td>   </td>
                                        <td>   </td>
                                        <td class="text-right">
                                            <p>
                                                <strong>Subtotal: </strong>
                                            </p>
                                            </td>
                                        <td class="text-center">
                                            <p>
                                                <strong>{{ $subscription->amount }}</strong>
                                            </p>
                                            </td>
                                    </tr>
                                    <tr>
                                        <td>   </td>
                                        <td>   </td>
                                        <td class="text-right"><h4><strong>Total: </strong></h4></td>
                                        <td class="text-center text-danger"><h4><strong>{{ $subscription->amount }} ₼</strong></h4></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-success btn-lg btn-block">
                                    Pay Now   <span class="glyphicon glyphicon-chevron-right"></span>
                                </button>
                                </td>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
