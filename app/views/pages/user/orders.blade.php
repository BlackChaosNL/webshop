<?php
$orders = App\Order::where('customer_id', Auth::user()->id)->paginate(15);
?>
@extends('layouts.user')
@section('userPanel')
    <table class="table table-bordered" >
        <thead>
        <th>Order ID</th>
        <th>Customer</th>
        <th>Sum</th>
        <th>Paid</th>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <th scope="row" class="#">{{ $order->order_id }}</th>
                <td>{{ Auth::user()->name }}</td>
                <td></td>
                <td>{{ (is_numeric($order->paid)) ? "Y" : "N" }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection