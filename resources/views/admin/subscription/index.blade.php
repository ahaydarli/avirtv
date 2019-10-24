@extends("admin.layout")
@section('title', 'Subscriptions')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <input id="subscription-date" style="margin:  0 auto; display: block" type="text" name="daterange" value="01/01/2018 - 01/15/2018" />
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Package id</th>
                        <th>Payment status</th>
                        <th>Status</th>
                        <th>Account Number</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Operations</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Package id</th>
                        <th>Payment status</th>
                        <th>Status</th>
                        <th>Account Number</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Operations</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($subscriptions as $sub)
                        <tr>
                            <td>{{ $sub->id }}</td>
                            <td>{{ $sub->user->name }}</td>
                            <td>{{ $sub->tariff->name }}</td>
                            <td>{{$sub->payment_status}}</td>
                            <td>{{$sub->status}}</td>
                            <td>{{$sub->account_number}}</td>
                            <td class="created">{{ $sub->created_at->format('m/d/Y') }}</td>
                            <td>{{ $sub->updated_at }}</td>

                            <td>

                                <form id="delete-form" action="{{ route('service.destroy', $sub->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('subscription.show',$sub->id)}}" class="btn btn-primary btn-circle btn-sm">
                                        <i class="far fa-eye"></i>
                                    </a>
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

@endsection

@push('scripts')


    <script>
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });

            $('body').on('click','.applyBtn',function () {
               let value=$("#subscription-date").val();
                var d1 = value.split("-");
                var from=$.trim(d1[0]);
                var to=$.trim(d1[1]);


                from=new Date(from);
                to=new Date(to);


                $('.created').each(function() {
                    var date=new Date($(this).text());
                   if(from < date && date < to){

                   }else{
                       $(this).parent().hide();
                   }
                });


            })
        });
    </script>
    @endpush
