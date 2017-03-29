@extends('layouts.user')
@section('userPanel')
    <h1>Order #{{ $orderId }}</h1>
    <table class="table table-bordered" >
        <thead>
        <th>Product</th>
        <th>Amount</th>
        <th>Sum</th>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <th scope="row" class="#">{{ App\Product::where('id', $order->product_id)->first()->name }}</th>
                    <td>{{ $order->pieces }}</td>
                    <td><span class="glyphicon glyphicon-euro"></span> {{ $order->amount }}</td>
                </tr>
            @endforeach
            {{ $orders->links() }}
        </tbody>
    </table>
    <a href="{{ url('/user/orders') }}" class="btn btn-raised" >Back to order overview</a>
@endsection