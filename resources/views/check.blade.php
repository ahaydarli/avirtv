
@extends('login-layout')
@section('page', 'login-page')
@section('title', 'Avirnet Login')
@section('content')

    <div class="page-header header-filter"  filter-color="yellow" style="background-image: url('img/register.jpg'); background-size: cover; background-position: top center; margin-top: 0px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 ml-auto mx-auto">
                    <div class="card card-nav-tabs mar-t-10">
                        <div class="card-header card-header-danger">
                            <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                        <li class="nav-item text-center " style="display: inline-block !important; width: 50% !important">
                                            <a class="nav-link active show" href="#login" data-toggle="tab">
                                                <i class="material-icons">dashboard</i> {{ __('site.login') }}
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item text-center" style="display: inline-block !important; width: 50% !important">
                                            <a class="nav-link" href="#register" data-toggle="tab">
                                                <i class="material-icons">account_box</i> {{ __('site.register') }}
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="tab-content text-center">
                                <div class="tab-pane active show" id="login">
                                    <div class="row">
                                        <div class="col">
                                            <form class="form" method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                  <span class="input-group-text">
                                                    <i class="material-icons">email</i>
                                                  </span>
                                                        </div>
                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                                               name="email" value="{{ old('email') }}" required  autofocus placeholder="@lang('site.login_email')">
                                                    </div>
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                  <span class="input-group-text">
                                                    <i class="material-icons">lock_outline</i>
                                                  </span>
                                                        </div>
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                                               name="password" required placeholder="@lang('site.login_password')">
                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                @if (Route::has('password.request'))
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                                @lang('site.forgot_password')
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endif
                                                <button type="submit" class="btn btn-danger btn-lg">
                                                    @lang('site.login')
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>




                                <div class="tab-pane " id="register">
                                    <div class="row">
                                        <div class="col">
                                            <form class="register-form" method="POST" action="{{ route('register') }}">
                                                @csrf
                                                <div class="form-group has-danger">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                        <i class="material-icons">face</i>
                                                      </span>
                                                        </div>
                                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
                                                               required autocomplete="name" autofocus placeholder=" {{ __('site.register name') }} ">
                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                        <i class="material-icons">mail</i>
                                                      </span>
                                                        </div>
                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                                                               required autocomplete="email" placeholder=" {{ __('site.register email')  }} ">
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group has-danger">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                        <i class="material-icons">lock_outline</i>
                                                      </span>
                                                        </div>
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{ __('site.register password') }}">
                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                        <i class="material-icons">lock_outline</i>
                                                      </span>
                                                        </div>
                                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder=" {{ __('site.register confirm') }} ">
                                                    </div>
                                                </div>
                                                {{--                                        <div class="form-check">--}}
                                                {{--                                            <label class="form-check-label" data-toggle="modal" data-target="#exampleModal">--}}
                                                {{--                                                <input class="form-check-input" type="checkbox" value="" id="condition">--}}

                                                {{--                                                <span class="form-check-sign">--}}
                                                {{--                                                    <span class="check"></span>--}}
                                                {{--                                                    </span>--}}
                                                {{--                                               {{ __('site.register agree') }}--}}

                                                {{--                                                <a href="#something">{{ __('site.register more') }}</a>--}}
                                                {{--                                                <span type="button" data-toggle="modal" data-target="#exampleModal">--}}
                                                {{--                                                    { __('site.register agree') }}--}}
                                                {{--                                                </span>--}}
                                                {{--                                            </label>--}}

                                                {{--                                        </div>--}}

                                                <div class="form-group" style="padding-left:40px;">
                                                    <div class="input-group">
                                                        <label data-toggle="modal" class="form-check-label" data-target="#exampleModal">
                                                            <input type="checkbox" class="form-check-input" name="condition" id="condition" style="margin-top:0px;" value="1">
                                                            <span class="form-check-sign">
{{--                                                            <span class="check" style="width:20px; height: 20px; display: inline-block;border:1px solid rgba(0, 0, 0, .54); overflow: hidden; border-radius: 3px"></span>--}}
                                                            </span>
                                                            {{ __('site.register agree') }}
                                                            <a href="#something">{{ __('site.register more') }}</a>
                                                        </label>

                                                        <span class="invalid-feedback hidden" id="condition-error" role="alert">
                                                    <strong id="condition-error-text"> </strong>
                                                </span>

                                                    </div>
                                                </div>
                                                {{--                                                    <button type="submit"  id="register" class="btn btn-danger btn-round">--}}
                                                {{--                                                        {{ __('site.register button') }}--}}
                                                {{--                                                    </button>--}}

                                                <a href="#" id="register" class="btn btn-danger btn-round">                                                        {{ __('site.register button') }}
                                                </a>
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
    </div>



    <div class="modal fade" style="" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! $conditions->content !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="disagree" data-dismiss="modal">{{__('site.close')}}</button>
                    <button type="button" class="btn btn-danger"  data-dismiss="modal" id="agree">{{__('site.accept')}}</button>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <nav class="float-left">
                <ul>
                    <li>
                        <a href="">
                            Avirnet
                        </a>
                    </li>
                    <li>
                        <a href="">
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Blog
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Licenses
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright float-right">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>
                <a href="" target="_blank">Avirnet</a>
            </div>
        </div>
    </footer>
    </div>
@endsection

@push('js')
    <script>
        $('#register').click(function(){
            $('.register-form').submit();

            // if( $('input[type=checkbox]').attr('checked') ){
            //     $('.form').submit();
            // }
            // else {
            //     $('#condition-error').show();
            //     $('#condition-error-text').html('Şərtlərin seçilməsi mütləqdir');
            // }

        })
    </script>



@endpush

