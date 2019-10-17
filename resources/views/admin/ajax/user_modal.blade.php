<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">User</th>
        <th scope="col">Package</th>
        <th scope="col">Payment Status</th>
        <th scope="col">Account Number</th>

    </tr>
    </thead>
    <tbody>


        @foreach($orders as $order)
            <tr>
           <td>{{$order->id}}</td>
          <td>{{$order->user->name}}</td>
          <td>{{$order->package->name}}</td>
          <td>{{$order->payment_status}}</td>
          <td>{{$order->account_number}}</td>
            </tr>
        @endforeach

    </tbody>
</table>