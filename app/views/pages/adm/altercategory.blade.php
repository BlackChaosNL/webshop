<?php
$parents = App\Category::all();
?>
@extends('layouts.admin')
@section('adminPanel')
    <form class="well well-lg form-horizontal" method="POST" target="/alter">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" >
        <input type="hidden" name="id" value="{{ $category->id }}" >
        <fieldset>
            <legend>CHANGE CATEGORY</legend>
            <div class="form-group">
                <label class="control-label" for="name">Category Name</label>
                <input type="text" class="form-control" id="cat_name" name="cat_name" value="{{ $category->cat_name }}">
                <span class="material-input"></span>
            </div>
            <div class="form-group">
                <label for="parent" class="control-label"> Parent: </label>
                <div class="">
                    <select id="parent" class="form-control" name="parent">
                        <option value="NULL">None</option>
                        @foreach($parents as $parent)
                            <option value="{{ $parent->id }}">{{ $parent->cat_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-10 col-md-offset-2">
                    <a href="{{ URL::previous() }}" class="btn btn-default">Cancel</a>
                    <input type="submit" class="btn btn-default btn-raised btn-primary" value="Change" />
                </div>
            </div>
        </fieldset>
    </form>
@endsection