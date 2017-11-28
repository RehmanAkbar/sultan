<div class="col-lg-12" style="background-color: black;">
<div class="container">
<nav class="navbar navbar-default" role="navigation" id="perfume_menu">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        @if(Auth::check())
            <a class="navbar-brand" href="/per_detail" id="perfume_logo">
                <img src="{{URL::asset('images/logo.png')}}" width="200" height="60"  alt="logo"/>
            </a>
        @else
        <a class="navbar-brand" href="/" id="perfume_logo">
            <img src="{{URL::asset('images/logo.png')}}" width="200" height="60"  alt="logo"/>
        </a>
         @endif
    </div>

    <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left">
            <li id="listgap"><a href="/" id="menu_items" >Men</a></li>
            <li id="listgap"><a href="/women" id="menu_items" >Women</a></li>
            <li id="listgap"><a href="/how_it" id="menu_items">How it Works</a></li>
<!--            <li id="listgap"> <a href="/gift_view" id="menu_items">Gifts</a></li>-->
        </ul>
        <ul class="nav navbar-nav navbar-right">
            @if(Auth::check())
            @else
            <li><a href="/login_view" id="menu_login">
                    <span class="glyphicon glyphicon-user"></span>
                    <span  id="menu_items"> &nbsp;Login</span>
                </a>
            </li>
            @endif
            <li><a href="#about"></a></li>

        </ul>
    </div>
</nav>
</div>
</div>
