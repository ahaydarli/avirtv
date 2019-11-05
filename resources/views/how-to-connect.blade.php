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
                        @if(isset($content))
                            {!! $content->content !!}
                        @endif
                    </div>
                </div>
            </div>


        </div>
    </div>


@endsection()
