<?php
if(!Auth::user()->role == 1){
    return back();
}
?>
@extends('layouts.master')
@section('content')
    <div id="adm-pnl-left" class="col-xs-4 col-md-2">
        <div class="btn-group-vertical">
            <div class="btn btn-raised"><a href="{{ url('/admin/dashboard') }}" >DashBoard</a></div>
            <div class="btn btn-raised"><a href="{{ url('/admin/users') }}">Users</a></div>
            <div class="btn btn-raised"><a href="{{ url('/admin/products') }}">Products</a></div>
            <div class="btn btn-raised"><a href="{{ url('/admin/categories') }}">Categories</a></div>
            <div class="btn btn-raised"><a href="{{ url('/admin/pages') }}">Pages</a></div>
        </div>
    </div>
    <div id="adm-pnl-right" class="col-xs-14 col-md-10">
        @yield('adminPanel')
    </div>
@stop