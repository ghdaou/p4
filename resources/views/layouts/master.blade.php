<!DOCTYPE html>
<html>
<head>
    <title>
        {{-- Yield the title if it exists, otherwise default to 'Stadium Transportation' --}}
        @yield('title','Stadium Transportation')
    </title>

    <meta charset='utf-8'>

    <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' rel='stylesheet'>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/lumen/bootstrap.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="/css/custom.min.css">


    {{-- Yield any page specific CSS files or anything else you might want in the head --}}
    @yield('head')

</head>
<body>

    <section>
        <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="/"><i>Stadium Transportation</i></a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
              <ul class="nav navbar-nav">
                <li class="active"><a href="/">HOME <span class="sr-only">(current)</span></a></li>
                <li><a href="/excursions/create">RESERVATIONS</a></li>
                <li><a href="#">TESTIMONIALS</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">EVENTS <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                      @foreach (DB::table('events')->get()->toArray() as $event)
                         <li><a href="#">{{ $event->event_name }}</a></li>
                      @endforeach
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">LOCATIONS <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                      @foreach (DB::table('pickup_locations')->get()->toArray() as $location)
                         <li><a href="#">{{ $location->pickup_loc_name}}</a></li>
                      @endforeach
                   </ul>
                  </ul>
                </li>
              </ul>

              <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
              </form>
              <ul class="nav navbar-nav navbar-right">
                    @if(Auth::check())
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }}<span class="caret"></span></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="/excursions/show">Show My Bookings</a></li>
                        <li class="divider"></li>
                        <li><a href="/logout">Logout</a></li>
                      </ul>
                    </li>
                    @else
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Login <span class="caret"></span></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="/login">login</a></li>
                        <li class="divider"></li>
                        <li><a href="/register">Register</a></li>
                      </ul>
                    </li>
                    @endif
              </ul>
            </div>
          </div>
        </nav>

        @if(Session::get('flash_message') != null))
            <div class='flash_message'>{{ Session::get('flash_message') }}</div>
        @endif

        {{-- Main page content will be yielded here --}}
        @yield('content')
    </section>
    </br></br>
    <footer>
        &copy; {{ date('Y') }}
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="/js/custom.js"></script>

    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')

</body>
</html>
