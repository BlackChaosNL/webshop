@extends('layouts.user')
@section('userPanel')
    <table class="table table-bordered" >
        <thead>
        <th>Order ID</th>
        <th>Customer</th>
        <th>Paid</th>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <th scope="row" class="#"><a href="{{ url('user/orders/'. $order->order_id ) }}">{{ $order->order_id }}</a></th>
                    <td>{{ \Auth::user()->name }}</td>
                    <td>{{ (is_numeric($order->paid)) ? "Yes" : "No" }}</td>
                </tr>
            @endforeach
            {{ $orders->links() }}
        </tbody>
    </table>
@endsection