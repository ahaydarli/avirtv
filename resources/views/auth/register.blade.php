@extends('login-layout')
@section('page', 'signup-page')
@section('title', __('site.register') )
@section('content')
    <div class="page-header header-filter" filter-color="yellow" style="background-image: url('img/register.jpg'); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-5 ml-auto mr-auto">
                    <div class="card card-signup">
                        <h2 class="card-title text-center"> {{ __('site.register') }} </h2>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mr-auto">
                                    <form class="form" method="POST" action="{{ route('register') }}">
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
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                    </span>
                                               {{ __('site.register agree') }}

                                                <a href="#something">{{ __('site.register more') }}</a>

                                            </label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-danger btn-round">
                                                {{ __('site.register button') }}
                                            </button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
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
