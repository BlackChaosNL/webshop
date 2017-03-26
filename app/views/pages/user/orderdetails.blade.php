@extends('layouts.user')
@section('userPanel')
    <table class="table table-bordered" >
        <thead>
        <th>Product</th>
        <th>Amount</th>
        <th>Sum</th>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <th scope="row" class="#">{{ App\Product::where('id', $order->id)->first()->name }}</th>
                    <td>{{ $order->pieces }}</td>
                    <td><span class="glyphicon glyphicon-euro"></span> {{ $order->amount }}</td>
                </tr>
            @endforeach
            {{ $orders->links() }}
        </tbody>
    </table>
@endsection