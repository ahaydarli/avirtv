@extends("admin.layout")
@section('title', 'Coupon')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Coupons table</h6>
            <a href="{{ route('coupon.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus text-white-50" id="add"></i> Add new</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Coupon</th>
                        <th>Is Active</th>
                        <th>Status</th>
                        <th>Created at</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Coupon</th>
                        <th>Is Active</th>
                        <th>Status</th>
                        <th>Created at</th>
                    </tr>
                    </tfoot>
                    <tbody>

                    @foreach ($coupons as $coupon)

                        <tr>

                            <td>{{ $coupon->id }}</td>
                            <td>
                                @if($coupon->user_id)
                                    {{$coupon->user->name}}
                                    @endif
                                </td>
                            <td>{{ $coupon->coupon }}</td>
                            <td>
                                @if($coupon->is_active)
                                    Active
                                @else
                                    No Active
                                @endif
                            </td>
                            <td>
                                @if($coupon->status)
                                    Used
                                @else
                                    No Used
                                @endif
                            </td>
                            <td>{{ $coupon->created_at->format('d-M-Y') }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

    <script type="text/javascript">
        // $(document).ready(function() {
        //     $('.add').click(function () {
        //         $.ajaxSetup({
        //             headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             }
        //         });
        //         var id = $(this).data('id');
        //         $.ajax({
        //             type:"POST",
        //             data: { 'id' : id  },
        //             url:'article/activate',
        //             success:function(data){
        //                 location.reload();
        //             }
        //         })
        //     });
        // });

    </script>


@endpush
