@extends('admin.layout')
@section('title', 'Create License')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Create License</h6>
        </div>
        <div class="card-body">
            <div class="col-md-6 offset-md-3">
                <form class="user" method="POST" action="{{ route('license.store') }}">
                    @csrf

                    <div class="tab-content pt-2 pl-1" id="pills-tabContent">

                        <div class="form-group">
                            <input id="question" type="text" class="form-control @error('license') is-invalid @enderror"
                                   name="license" value="{{ old('license') }}"
                                   placeholder="License">
                            @error('license')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" checked value="1" name="is_active" class="form-check-input" id="exampleCheck1" {{ old('is_active') ? 'checked' : '' }}>
                                <label class="form-check-label" for="exampleCheck1">{{ __('Active') }}</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        {{ __('Save') }}
                    </button>
                </form>
            </div>
        </div>
    </div>


@endsection
