@extends('admin.layout')
@section('title', 'Edit License')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Create License</h6>
        </div>
        <div class="card-body">
            <div class="col-md-6 offset-md-3">
                <form class="user" method="POST" action="{{ route('license.update', $license->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="tab-content pt-2 pl-1" id="pills-tabContent">
                        <div class="form-group">
                            <input id="question" type="text" class="form-control @error('license') is-invalid @enderror"
                                   name="license" value="{{ $license->license }}"
                                   placeholder="License">
                            @error('license')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <select name="user_id" id="" class="form-control" required>
                                <option value="">Select User</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}" @if($license->user_id == $user->id) selected @endif>{{$user->id}}- {{$user->name}}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <select name="status"  class="form-control">
                                <option value="">Select Status</option>
                                <option value="1" @if($license->status) selected @endif>Active</option>
                                <option value="0" @if($license->status == 0) selected @endif>Deactive</option>

                            </select>
                            @error('user_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" value="1" name="is_active" class="form-check-input" id="exampleCheck1" {{ $license->is_active ? 'checked' : '' }}>
                                <label class="form-check-label" for="exampleCheck1">{{ __('Active') }}</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        {{ __('Edit') }}
                    </button>
                </form>
            </div>
        </div>
    </div>


@endsection
