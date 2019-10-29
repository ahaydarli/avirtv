@extends('login-layout')
@section('page', 'login-page')
@section('title', 'Reset password')
@section('content')
<div class="page-header header-filter" style="background-image: url('/img/login.jpg'); background-size: cover; background-position: top center;">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
                <div class="card card-login card-hidden">
                    <div class="card-header card-header-danger text-center">
                        <h4 class="card-title">{{ __('site.reset password') }}</h4>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group row">
                                <label for="email" class="col-md-12 col-form-label text-center">{{ __('E-Mail Address') }}</label>
                                <div class="col-md-12 float-center">
                                    <input id="email" type="email" class="form-control pl-3  @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-12 col-form-label text-center">{{ __('site.password') }}</label>

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control pl-3 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-12 col-form-label text-center">{{ __('site.confirm') }}</label>

                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control pl-3" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12 offset-md-3">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('site.reset') }}
                                    </button>
                                </div>
                            </div>

{{--                            <div class="card-footer justify-content-center">--}}
{{--                                <button type="submit" class="btn btn-default ">--}}
{{--                                    {{ __('Reset Password') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
