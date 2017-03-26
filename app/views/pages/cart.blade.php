<?php
$fullPrice = 0;
?>
@extends('layouts.master')
@section('content')
    @if(Session::has('product'))
        <div class="alert-box information">
            <h2>{{ Session::get('product') }}</2>
        </div>
    @endif
    <h1>Cart</h1>
    <hr />
    @if(!empty($cart))
        @foreach($cart as $item)
            <?php
                $i = App\Product::where('id', $item[0])->firstOrFail();
                $fullPrice = $fullPrice+$i->price
            ?>
            <div class="pCard">
                <div class="pPicture"><img src="img/big/{{ $i->picture }}" /></div>
                <div class="pPadding">
                    Name
                    <hr >
                    <div class="pName">{{ $i->name }}</div>
                    <br />
                    Description
                    <hr >
                    <div class="pDescription">{{ $i->small_desc }}</div>
                    <br /> <br />
                    <a href="{{ url('/cart/remove/'. $i->id ) }}" class="btn btn-raised btn-primary" >Remove</a>
                    <a href="{{ url('/cart/add/'. $i->id ) }}" class="btn btn-raised btn-primary" >Buy more! <span class="badge">I currently have {{ $item[1] }}</span></a>
                </div>
                <div class="pPrice"><span class="glyphicon glyphicon-euro"></span>{{ ($i->price*$item[1]) }}</div>
            </div>
            <br />
            <hr />
        @endforeach
        <hr >
        @if(Auth::guest())
            <div style="float: right;">
                Total Amount: <span class="glyphicon glyphicon-euro"></span> {{ $fullPrice }}
                VAT/BTW: <span class="glyphicon glyphicon-euro"></span> {{ round($fullPrice/21) }} (21%)
                <a href="{{ url('/login') }}" class="btn btn-raised" >login</a> or <a href="{{ url('/register') }}" class="btn btn-raised" >Register a new account</a>
            </div>
        @else
            <div style="float: right; text-align: right; font-size: 25px;">
                Total Amount: <span class="glyphicon glyphicon-euro"></span> {{ $fullPrice }}<br />
                VAT/BTW: <span class="glyphicon glyphicon-euro"></span> {{ round($fullPrice/21) }} (21%)<br />
                <a href="{{ url('/cart/purchase') }}" class="btn btn-raised btn-primary" >Pay</a> <br /><br /><br /><br />
            </div>
        @endif
    @endif
@stop