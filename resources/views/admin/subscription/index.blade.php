@extends("admin.layout")
@section('title', 'Subscriptions')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">

            <form action="" method="get" style="text-align: center;">

                <input type="text" name="from" class="subscription_date" autocomplete="off"
                       value=" @if(request()->from) {{ request()->from }} @endif">

                <input type="text" name="to" class="subscription_date" autocomplete="off"
                       value=" @if(request()->to) {{ request()->to }} @endif ">
                <select name="payment_status" style="padding: 1.5px;">
                    <option value="3">Sec</option>
                    <option value="2" @if(request()->get('payment_status')==2) selected @endif>Ödənilib</option>
                    <option value="1" @if(request()->has('payment_status') and request()->get('payment_status')==1) selected @endif>Ödənilməyib</option>
                </select>
                <select name="status" style="padding: 1.5px;">
                    <option value="3">Sec</option>
                    <option value="2" @if(request()->get('status')==2) selected @endif>Aktiv</option>
                    <option value="1" @if(request()->get('status')==1) selected @endif>Deaktiv</option>
                </select>

                <input type="hidden" name="filter" value="filter">
                <input type="submit" class="btn btn-secondary btn-sm">
            </form>


            <div class="table-responsive">


                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Tariff id</th>
                        <th>Payment status</th>
                        <th>Status</th>
                        <th>Account Number</th>
                        <th>Created at</th>
                        <th>Operations</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Tariff id</th>
                        <th>Payment status</th>
                        <th>Status</th>
                        <th>Account Number</th>
                        <th>Created at</th>
                        <th>Operations</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($subscriptions as $sub)
                        <tr>
                            <td>{{ $sub->id }}</td>
                            <td>{{ $sub->user->name }}</td>
                            <td>{{ $sub->tariff->name }}</td>
                            <td>{{ $sub->payment_status}}</td>
                            <td>{{ $sub->status }}</td>
                            <td>{{ $sub->account_number }}</td>
                            <td class="created">{{ $sub->created_at->format('m/d/Y') }}</td>
                            <td>
                                <form id="delete-form" action="{{ route('service.destroy', $sub->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('subscription.show', $sub->id)}}"
                                       class="btn btn-primary btn-circle btn-sm">
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <button class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i>
                                    </button>
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
        $(function () {

            $('.subscription_date').datepicker();

        });
    </script>
@endpush
