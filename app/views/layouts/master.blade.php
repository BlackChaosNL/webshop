<!DOCTYPE html>
<html lang="en">
<html>
    <head>
        @include('includes.head')
    </head>
    <body>
    @include('includes.menu')
    <div class="container">
        @yield('content')
    </div>
    @include('includes.footer')
    </body>
</html>