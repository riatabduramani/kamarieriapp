<! DOCTYPE html >
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>
        Kamarieri App
    </title>

    <meta http-equiv="X-UA-Compatible"
          content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0"
          name="viewport"/>
    <meta http-equiv="Content-type"
          content="text/html; charset=utf-8">
    <link rel="stylesheet"
          href="{{ asset('css/app.css') }}"/>
          <script src="{{ asset('js/app.js') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
</head>
<body>
  <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{url('/')}}">Kamarieri App</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        @role('client')
          <ul class="nav navbar-nav">            
            <li {{{ (Request::is('client/dashboard') ? 'class=active' : '') }}} ><a href="/client/dashboard">Dashboard <span class="sr-only">(current)</span></a></li>
            <li {{{ (Request::is('client/menu*') ? 'class=active' : '') }}}><a href="/client/menu">Menu</a></li>
            <li><a href="#">History</a></li>
             <li><a href="#">Generate QRCodes</a></li>
          </ul>
        @endrole

        @role('admin')
          <ul class="nav navbar-nav">            
            <li {{{ (Request::is('users*') ? 'class=active' : '') }}} ><a href="/users">Users <span class="sr-only">(current)</span></a></li>
            <li {{{ (Request::is('roles*') ? 'class=active' : '') }}}><a href="/roles">Roles</a></li>
          </ul>
        @endrole


           <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} ({{ Auth::user()->roles->first()->name }})<span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>

           <!--     
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome, Riat Abduramani <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/dashboard"><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> Dashboard</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Settings</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> My profile</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Sign Out</a></li>
              </ul>
            </li>
          </ul>
          -->

        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container">
