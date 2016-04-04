<?php
$user = App\User::where('id', Auth::user()->id)->firstOrFail();
?>
@extends('layouts.user')
@section('userPanel')
    <form class="well well-lg form-horizontal" method="POST" target="profile">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" >
        <input type="hidden" name="id" value="{{ $user->id }}" >
        <fieldset>
            <legend>CHANGE USER</legend>
            <div class="form-group">
                <label class="control-label" for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                <span class="material-input"></span>
            </div>
            <div class="form-group">
                <label class="control-label" for="name">Surname</label>
                <input type="text" class="form-control" id="surname" name="surname" value="{{ $user->surname }}">
                <span class="material-input"></span>
            </div>
            <div class="form-group">
                <label class="control-label" for="name">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}">
                <span class="material-input"></span>
            </div>
            <div class="form-group">
                <label class="control-label" for="name">House Number</label>
                <input type="text" class="form-control" id="housenr" name="housenr" value="{{ $user->housenr }}">
                <span class="material-input"></span>
            </div>
            <div class="form-group">
                <label class="control-label" for="name">Place</label>
                <input type="text" class="form-control" id="place" name="place" value="{{ $user->place }}">
                <span class="material-input"></span>
            </div>
            <div class="form-group">
                <label class="control-label" for="name">Country</label>
                <input type="text" class="form-control" id="country" name="country" value="{{ $user->country }}">
                <span class="material-input"></span>
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