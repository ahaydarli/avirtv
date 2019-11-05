@extends('layout')
@section('page', 'about-us')
@section('title', __('site.error'))
@section('content')
    ​
    <div class="page-header header-filter header-small" data-parallax="true">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">

                </div>
            </div>
        </div>
    </div>
    <div class="main main-raised"   >
        <div class="container">
            <div class="about-description text-center">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto" >

                        <p class="display-3">404 Not Found</p>
                        <a class="btn btn-danger" href="{{ url()->previous() }}"> Back </a>

                        ​
                    </div>
                </div>
            </div>
            ​
            ​
        </div>
    </div>
    ​
    ​
@endsection()
