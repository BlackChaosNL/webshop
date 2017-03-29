@extends('layouts.master')
@section('content')
    <div class="well well-lg">
        <div class="nName">Name: {{ $product->name }}</div>
        <hr />
        <div class="nPicture"><img src="../img/products/{{ $product->picture }}" height="500" width="500"/></div>
        <div class="nDescription">Description: {!! $product->large_desc !!}</div>
        <div class="nPrice"><span class="glyphicon glyphicon-euro"></span> {{ $product->price }}</div>
        <a href="{{ URL::previous() }}" class="btn btn-raised">Back</a>
        @if($product->piece != 0)
            <a href="{{ url('/cart/add/'. $product->id ) }}" class="btn btn-raised btn-primary" >Buy!</a>
        @else
            <a class="btn btn-raised btn-primary" >Sold Out!</a>
        @endif
    </div>
@stop