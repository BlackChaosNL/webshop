<?php
$items = App\Page::where('active', 1)->get();
$categories = App\Category::all();
?>
<a href="{{ url('/') }}">
<div id="bannerCard">
    <div id="bannerTitle">PetStore</div>
    <div id="bannerSlang">Where every pets need come to life!</div>
</div>
</a>
<div id="banner"></div>
<nav class="navbar navbar-default shadow-z-1">
    <div class="container-fluid">
        <div class="navbar-header">
            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand collapsed" href="{{ url('/') }}">
                <span>PETSTORE</span>
            </a>
        </div>

        <div class="navbar-collapse collapse navbar-responsive-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li class="link"><a href="{{ url('/') }}">Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Products <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        @foreach($categories as $category)
                            @if($category->hasNoParent())
                                @if(!$category->isFirst())
                                    <li class="divider"></li>
                                @endif
                                <li class="dropdown-header"><a href="{{ url($category->getId()) }}">{{ $category->getName() }}</a></li>
                                @foreach($categories as $cat)
                                    @if($cat->isSubOf($category->getId()))
                                        <li class="link"><a href="{{ url($cat->getId()) }}">{{ $cat->getName() }}</a></li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </ul>
                </li>
                @foreach($items as $item)
                    <li class="link">
                        <a href="{{ url('/p/'.$item->route) }}">{{ $item->name }}</a>
                    </li>
                @endforeach
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <li class="link"><a href="{{ url('/cart') }}">Cart <span class="glyphicon glyphicon-shopping-cart"></span></a></li>
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li class="link"><a href="{{ url('/login') }}">Login</a></li>
                    <li class="link"><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Welkom {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            @if(Auth::user()->role == 1)
                                <li><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-btn">Admin</i></a></li>
                            @endif
                            <li><a href="{{ url('/user/dashboard') }}">Dashboard</a></li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>