@extends('layouts.master')
@section('content')
    <h1>{{ strtoupper($category->cat_name) }}</h1>
    <hr />
    @foreach($products as $product)
        @if($product->piece != 0)
            <div class="pCard">
                <div class="pPicture"><img src="img/products/{{ $product->picture }}" /></div>
                <div class="pPadding">
                    <div class="pName"><h1>{{ $product->name }}</h1></div>
                    <br />
                    Description
                    <hr >
                    <div class="pDescription">{{ $product->small_desc }} We have {{ $product->piece }} piece(s) available.</div>
                    <br /> <br />
                    <a href="{{ url('/product/'. $product->id ) }}" class="btn btn-raised" >Read More!</a>
                    <a href="{{ url('/cart/add/'. $product->id ) }}" class="btn btn-raised btn-primary" >Buy!</a>
                </div>
                <div class="pPrice"><span class="glyphicon glyphicon-euro"></span>{{ $product->price }}</div>
            </div>
            <br />
        @endif
    @endforeach
    {{ $products->links() }}
@stop