<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Kamarieri') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">


    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

</head>
<body>

    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Kamarieri') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    @role('client')
                      <ul class="nav navbar-nav">            
                        <li {{{ (Request::is('/client') ? 'class=active' : '') }}} ><a href="/client">Dashboard <span class="sr-only">(current)</span></a></li>
                        <li {{{ (Request::is('client/menu*') ? 'class=active' : '') }}}><a href="/client/menu">Menu</a></li>
                        <li {{{ (Request::is('client/history*') ? 'class=active' : '') }}}><a href="/client/history">History</a></li>
                        <li {{{ (Request::is('client/profile') ? 'class=active' : '') }}}><a href="/client/profile">My Profile</a></li>
                      </ul>
                    @endrole

                    @role('super-admin')
                      <ul class="nav navbar-nav">            
                        <li {{{ (Request::is('admin/users*') ? 'class=active' : '') }}} ><a href="/admin/users">Users <span class="sr-only">(current)</span></a></li>
                        <li {{{ (Request::is('admin/roles*') ? 'class=active' : '') }}}><a href="/admin/roles">Roles</a></li>
                        <li {{{ (Request::is('admin/permissions*') ? 'class=active' : '') }}}><a href="/admin/permissions">Permissions</a></li>
                      </ul>
                    @endrole

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script> 
    

</body>
</html>
