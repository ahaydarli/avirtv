@extends('be.layout')
@section('title','License Keys')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">License table</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>License</th>
                        <th>Is active</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>License</th>
                        <th>Is active</th>
                        <th>Status</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($licenses as $license)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
{{--                                {{ $license->id }}--}}
                            </td>
                            <td>{{ $license->license }}</td>
                            <td>
                                @if($license->is_active)
                                    Active
                                @else
                                    Deactive
                                @endif
                            </td>
                            <td>
                                @if($license->status)
                                    UnAvailable
                                @else
                                    Available
                                @endif
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    @endsection
