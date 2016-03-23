<div id="menu">
    <ul>
        <li><a href="./">home</a></li>
        <ul style="float:right; list-style: none;">
            @if(Auth::check())
                <li><a href="{{ asset('login') }}" >Login</a></li>
            @endif
        </ul>
    </ul>
</div>