<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Xtreme-Gaming-Blog</title>

    <!-- Bootstrap core CSS -->



    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">


    @yield('styles')

    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->

  </head>

  <body>

    <!-- Navigation -->
    @yield('content')
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a style="font-size: x-large" class="navbar-brand" href="{{url('/')}}">XGamingBlog</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="about.blade.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.blade.php">Contact</a>
            </li>
            @if (Route::has('login'))
              <div class=" links ">
                @auth
                      <li class="dropdown nav-link">
                          <a  style="color: black; position: relative; bottom: 3px; font-weight: 900; font-size: medium; text-decoration: none; margin-right: 10px;" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                              {{ Auth::user()->name }} <span class="caret"></span>
                          </a>

                          <ul class="dropdown-menu">
                              <li>
                                  <a style="font-size: small" href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                      Logout
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      {{ csrf_field() }}
                                  </form>
                              </li>
                          </ul>
                      </li>


                @else
                  <li class="nav-item pull-left" ><a class="nav-link" style="color: red; position: relative; top: 3px;   font-weight: 900; font-size: medium; text-decoration: none; margin-right: 10px;" href="{{ route('login') }}">Login</a></li>

                  <li class="nav-item pull-right" ><a class="nav-link"  style="color: red; position: relative; top: 3px; font-weight: 900; font-size: medium; text-decoration: none; margin-right: 10px;"  href="{{ route('register') }}">Register</a></li>
                @endauth
              </div>
            @endif
          </ul>
        </div>
      </div>
    </nav>
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/GRW_NW_1920x1080.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Xtreme Gaming Blog</h1>
              <span class="subheading">A Gaming Blog For Patriotic Gamers</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->

    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          @if($posts)
            @foreach($posts as $post)
          <div class="post-preview">
            <a href="{{'post/' . $post->slug}}">
              <h2 class="post-title">
                {{$post->title}}
              </h2>

            </a>
            <img class="img-responsive" style=" max-height: 400px; margin: 30px 0;" src="{{asset('/images/' . ($post->image))}}" alt="">
            <p class="post-meta">Posted by
              <a href="#">{{$post->user->name}}</a>
              {{$post->created_at->diffForHumans()}}</p>
          </div>
            <p>{!!$post->content !!}</p>
          <hr>
          @endforeach
        @endif
          <!-- Pager -->

        </div>
      </div>
    </div>


    <hr>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack>
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>
            <p class="copyright text-muted">Copyright &copy; XtremeGamingBlog 2017</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/clean-blog.min.js')}}"></script>


    @yield('scripts')

  </body>

</html>
