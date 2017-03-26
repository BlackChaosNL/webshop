@extends('layouts.master')
@section('content')
    <h1>{{ strtoupper($category->cat_name) }}</h1>
    <hr />
    @foreach($products as $product)
        <div class="pCard">
            <div class="pPicture"><img src="img/big/{{ $product->picture }}" /></div>
            <div class="pPadding">
                Name
                <hr >
                <div class="pName">{{ $product->name }}</div>
                <br />
                Description
                <hr >
                <div class="pDescription">{{ $product->small_desc }}</div>
                <br /> <br />
                <a href="{{ url('/product/'. $product->id ) }}" class="btn btn-raised" >Read More!</a>
                @if($product->piece != 0)
                    <a href="{{ url('/cart/add/'. $product->id ) }}" class="btn btn-raised btn-primary" >Buy!</a>
                @endif
            </div>
            <div class="pPrice"><span class="glyphicon glyphicon-euro"></span>{{ $product->price }}</div>
        </div>
        <br />
    @endforeach
    {{ $products->links() }}
@stop