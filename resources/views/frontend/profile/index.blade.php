@extends('layout')
@section('page', 'profile-page')
@section('title',  __('Profile'))
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('img/city-profile.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto text-center">
                <h1 class="title">Profile</h1>
            </div>
        </div>
    </div>
</div>
<div class="main main-raised" style="min-height: 80vh;">
    <div class="profile-content">
        <div class="container">
            <div class="row">
               <div class="col-lg-9 col-md-12 ml-auto mx-auto">
                   <div class="card card-nav-tabs mar-t-10">
                       <div class="card-header card-header-danger">
                           <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                           <div class="nav-tabs-navigation">
                               <div class="nav-tabs-wrapper">
                                   <ul class="nav nav-tabs" data-tabs="tabs">
                                       <li class="nav-item">
                                           <a class="nav-link" href="#profile" data-toggle="tab">
                                               <i class="material-icons">dashboard</i> Dashboard
                                               <div class="ripple-container"></div></a>
                                       </li>
                                       <li class="nav-item">
                                           <a class="nav-link" href="#account" data-toggle="tab">
                                               <i class="material-icons">account_box</i> Account
                                               <div class="ripple-container"></div></a>
                                       </li>
                                       <li class="nav-item">
                                           <a class="nav-link active show" href="#subscriptions" data-toggle="tab">
                                               <i class="material-icons">done_all</i> Subscriptions
                                               <div class="ripple-container"></div></a>
                                       </li>
                                       <li class="nav-item">
                                           <a class="nav-link" href="#settings" data-toggle="tab">
                                               <i class="material-icons">build</i> {{ __('Change password') }}
                                               <div class="ripple-container"></div></a>
                                       </li>
                                   </ul>
                               </div>
                           </div>
                       </div>
                       <div class="card-body ">
                           <div class="tab-content text-center">
                               <div class="tab-pane" id="profile">

                               </div>
                               <div class="tab-pane" id="account">
                                   <p> I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at.</p>
                               </div>
                               <div class="tab-pane active show" id="subscriptions">
                                   <a href="{{ route('pricing') }}" class="btn btn-success float-right">
                                       <i class="material-icons">add</i>
                                       Add new service
                                   </a>
                                   <div class="table-responsive">
                                       <table class="table">
                                           <thead>
                                           <tr>
                                               <th>{{ __('Package') }}</th>
                                               <th>{{ __('Payment date') }}</th>
                                               <th>{{ __('Payment status') }}</th>
                                               <th class="text-right">{{ __('Price') }}</th>
                                               <th class="text-right">{{ __('Period') }}</th>
                                               <th class="text-right">{{ __('Payed') }}</th>
                                               <th class="text-right">{{ __('Actions') }}</th>
                                           </tr>
                                           </thead>
                                           <tbody>
                                           @foreach($user->orders as $order)
                                               <tr>
                                                   <td>{{ $order->package->name }}</td>
                                                   <td>{{ $order->created_at }}</td>
                                                   <td>
                                                       <span class="badge badge-pill {{ $order->payment_status ? 'badge-success' : 'badge-danger' }}">
                                                           {{ $order->payment_status ? 'Payed' : 'Not payed' }}
                                                       </span>
                                                   </td>
                                                   <td class="text-right">{{ $order->package->price }} ₼</td>
                                                   <td class="text-right">{{ $order->month->month }} {{ __('month') }}</td>
                                                   <td class="text-right">{{ $order->amount }} ₼</td>
                                                   <td class="td-actions text-right">
                                                       @if($order->payment_status)
                                                           <button type="button" data-id="{{ $order->id }}" rel="tooltip" class="btn btn-info btn-sm service-detail"
                                                                   data-original-title="{{ __('View details') }}" title="{{ __('View details') }}"
                                                                   data-toggle="modal" data-target="#customerDetailModal">
                                                               <i class="material-icons">visibility</i>
                                                               {{ __('View details') }}
                                                               <div class="ripple-container"></div>
                                                           </button>
                                                       @else
                                                           <a href="#" class="btn btn-success btn-sm" rel="tooltip"
                                                                   data-original-title="{{ __('Pay') }}" title="{{ __('Pay') }}">
                                                               <i class="material-icons">payment</i>
                                                               {{ __('Pay') }}
                                                               <div class="ripple-container"></div>
                                                           </a>
                                                       @endif
                                                   </td>
                                               </tr>
                                           @endforeach
                                           </tbody>
                                       </table>
                                   </div>
                               </div>
                               <div class="tab-pane" id="settings">
                                   <h3>Change password</h3>

                                   <form action="{{url('change-pass')}}" method="post" class="form">
                                       {{csrf_field()}}
                                       <div class="form-group">
                                           <div class="input-group">
                                               <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                        <i class="material-icons">lock_outline</i>
                                                      </span>
                                               </div>
                                               <input id="current" type="password" class="form-control @error('current') is-invalid @enderror" name="current" required placeholder="Current password">

                                               @error('current')
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
                                               <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required  placeholder="New password">

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
                                               <input type="password" class="form-control @error('confirm') is-invalid @enderror" name="confirm" required  placeholder="Confirm new password">

                                               @error('confirm')
                                               <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                               @enderror
                                           </div>
                                       </div>

                                       <button type="submit" class="btn btn-danger btn-round">
                                           {{ __('Change') }}
                                       </button>
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
<div class="modal fade" id="customerDetailModal" tabindex="-1" role="dialog" aria-labelledby="customerDetailModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal_body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        $(function () {
            $('.service-detail').click(function () {
                var id=$(this).data('id');

                $("#modal_body").html('');
                $.ajax({
                    'url':'{{route('service.detail')}}',
                    'data':{'_token':'{{ csrf_token() }}', 'id':id},
                    'type':'post',
                    'success':function (e) {

                        $("#modal_body").html(e);

                    }
                })

            })
        })
    </script>
@endpush

