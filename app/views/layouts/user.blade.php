<?php
if(!Auth::user()){
    return back();
}
?>
@extends('layouts.master')
@section('content')
    <div id="usr-pnl-left" class="col-xs-4 col-md-2">
        <div class="btn-group-vertical">
            <div class="btn btn-raised"><a href="{{ url('/user/dashboard') }}" >DashBoard</a></div>
            <div class="btn btn-raised"><a href="{{ url('/user/profile') }}" >Profile</a></div>
            <div class="btn btn-raised"><a href="{{ url('/user/orders') }}" >Orders</a></div>
        </div>
    </div>
    <div id="usr-pnl-right" class="col-xs-14 col-md-10">
        @yield('userPanel')
    </div>
@stop