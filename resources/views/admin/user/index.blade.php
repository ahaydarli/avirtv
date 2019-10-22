@extends("admin.layout")
@section('title', 'Users')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                @if(session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                    @endif
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Account Number</th>
                        <th>Created at</th>
                        <th>Operations</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Account Number</th>
                        <th>Created at</th>
                        <th>Operations</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td><a id="{{ $user->id }}" class="a_modal" href="#" data-toggle="modal" data-target="#exampleModal">{{ $user->name }}</a></td>
                            <td>{{$user->email}}</td>
                            <td>{{ $user->phone }}</td>

                            <td>{{$user->account_number}}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>

                                <form style="display: inline-block;" id="delete-form" action="{{ route('user.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
{{--                                    <a href="{{route('user.show',$user->id)}}" class="btn btn-primary btn-circle btn-sm">--}}
{{--                                        <i class="far fa-eye"></i>--}}
{{--                                    </a>--}}
                                    <button class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
                                </form>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>



    {{--modal user ucun scriptionslari cixartmaq ucun--}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Subscriptions</h5>
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
    
    @push('scripts')
        <script>
            $(function () {
                $('body').on('click','.a_modal',function () {
                    var id=$(this).attr('id');

                    $("#modal_body").html('');
                    $.ajax({
                        'url':'{{route('admin.modal')}}',
                        'data':{'_token':'{{csrf_token()}}','id':id},
                        'type':'post',
                        'success':function (e) {

                            $("#modal_body").html(e);

                        }
                    })

                })
            })
        </script>
    @endpush
@endsection
