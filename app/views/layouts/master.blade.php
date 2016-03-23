<!DOCTYPE html>
<html>
    <head>
        @include('includes.head')
    </head>
    <body>
        <div id="header">
            <div class="jumbotron">
                WEBS2 WebShop
            </div>
        </div>
        <div class="container">
            <div class="menu">
                @include('includes.menu')
            </div>
            <div id="content">
                @yield('content')
            </div>
        </div>
        <div id="footer">
            @include('includes.footer')
        </div>
    </body>
</html>