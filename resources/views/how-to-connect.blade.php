@extends('layout')
@section('page', 'about-us')
@section('title', __('site.How to connect us'))
@section('content')

    <div class="page-header header-filter header-small" data-parallax="true" style="background-image: url('/img/about-us.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <h1 class="title">@lang('site.How to connect us')</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="main main-raised">
        <div class="container">
            <div class="about-description text-center">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        @include('flash-message')
                        @if($subscription !==0 && $subscription->user_id == Auth::id())
                            <div class="tab-pane" id="subscriptions">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>{{ __('site.package') }}</th>
                                            <th>{{ __('site.payment_date') }}</th>
                                            <th>{{ __('site.payment_status') }}</th>
                                            <th class="text-right">{{ __('site.price') }}</th>
                                            <th class="text-right">{{ __('site.period') }}</th>
                                            <th class="text-right">{{ __('site.payed') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>{{ $subscription->tariff->name }}</td>
                                            <td>{{ $subscription->created_at }}</td>
                                            <td>
                                                       <span class="badge badge-pill {{ $subscription->payment_status ? 'badge-success' : 'badge-danger' }}">
                                                           {{ $subscription->payment_status ? __('site.payed') : __('site.not-payed') }}
                                                       </span>
                                            </td>
                                            <td class="text-right">{{ $subscription->tariff->price }} ₼</td>
                                            <td class="text-right">{{ $subscription->month->month }} {{ __('site.month') }}</td>
                                            <td class="text-right">{{ $subscription->amount }} ₼</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                @endif
                        @if(isset($content))
                            {!! $content->content !!}
                        @endif
                    </div>
                </div>
            </div>


        </div>
    </div>


@endsection()
