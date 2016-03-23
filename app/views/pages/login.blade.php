@extends('layouts.master')
@section('content')
    <br />
    @if(Session::has('err'))
        <h2>{{ Session::get('err') }}</h2>
    @endif
    <form method="POST" action="./login" novalidate>
        <div class="form-group">
            <label >Gebruikersnaam</label>
            <input type="text" id="username" class="form-control" name="username" placeholder="Gebruikersnaam" >
        </div>
        <div class="form-group">
            <label >Wachtwoord</label>
            <input type="password" id="password" class="form-control" name="password" placeholder="Wachtwoord" >
            <input type="checkbox" name="remember">Remember me<br>
        </div>
        <div class="form-group">
            <button type="submit">Login</button>
        </div>
    </form>
@stop