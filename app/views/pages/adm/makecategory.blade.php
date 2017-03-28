@extends('layouts.admin')
@section('adminPanel')
    @if(Session::has('feedback'))
        <div class="alert-box information">
            <h2>{{ Session::get('feedback') }}</h2>
        </div>
    @endif
    <form class="well well-lg form-horizontal" method="POST" target="/add">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" >
        <fieldset>
            <legend>CREATE CATEGORY</legend>
            <div class="form-group">
                <label class="control-label" for="name">Category Name</label>
                <input type="text" class="form-control" id="cat_name" name="cat_name" value="">
                <span class="material-input"></span>
            </div>
            <div class="form-group">
                <label for="parent" class="control-label"> Parent: </label>
                <div class="">
                    <select id="parent" class="form-control" name="parent">
                        <option value="NULL">None</option>
                        @foreach($categories as $parent)
                            <option value="{{ $parent->id }}">{{ $parent->cat_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-10 col-md-offset-2">
                    <a href="{{ URL::previous() }}" class="btn btn-default">Cancel</a>
                    <input type="submit" class="btn btn-default btn-raised btn-primary" value="Create" />
                </div>
            </div>
        </fieldset>
    </form>
@endsection