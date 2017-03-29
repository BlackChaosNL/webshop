@extends('layouts.admin')
@section('adminPanel')
    <form class="well well-lg form-horizontal" method="POST" target="/add" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" >
        <fieldset>
            <legend>NEW PRODUCT</legend>
            <div class="form-group">
                <label for="category" class="control-label"> Category: </label>
                <div class="">
                    <select id="category" class="form-control" name="category">
                        <option value="NULL">None</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label" for="name">Product name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="">
                <span class="material-input"></span>
            </div>
            <div class="form-group">
                <label class="control-label" for="picture">Picture</label>
                <input type="file" id="picture" name="picture" multiple="">
                <input type="text" readonly="" class="form-control" placeholder="Picture">
            </div>
            <div class="form-group">
                <label class="control-label" for="sdescription">Small description (100 characters only)</label>
                <input type="text" class="form-control" id="sdescription" name="sdescription" value="" max="100">
                <span class="material-input"></span>
            </div>
            <div class="form-group">
                <label class="control-label" for="ldescription">Large description</label>
                <textarea class="form-control" rows="3" id="ldescription" name="ldescription"></textarea>
                <span class="material-input"></span>
            </div>
            <div class="form-group">
                <label class="control-label" for="amount">Amount of products</label>
                <input type="number" class="form-control" id="amount" name="amount" value="0" min="0">
                <span class="material-input"></span>
            </div>
            <div class="form-group">
                <label class="control-label" for="price">Price (In euros) of one product</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="0" min="0">
                <span class="material-input"></span>
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