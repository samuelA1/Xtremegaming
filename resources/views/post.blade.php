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
                    <a class="nav-link" href="{{url('search')}}">
                  <span  class="fa-stack">
                    <i class="fa fa-search fa-stack-2x "></i>
                  </span>
                    </a>
                </li>
                @if(Auth::check())
                    @if(Auth::user()->isAdmin())
                        <li><a style="color: red; position: relative; top: 3px; font-weight: 900; font-size: medium; text-decoration: none; margin-right: 10px;" href="{{url('/admin')}}">Admin</a></li>
                    @endif
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{url('about')}}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
                @if (Route::has('login'))
                    <div class=" links ">
                        @auth
                            <li class="dropdown nav-link ">
                                <a  style="color: black; position: relative; bottom: 3px; font-weight: 900; font-size: medium; text-decoration: none" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                {{--<a style="color: black; font-weight: 900; font-size: small; text-decoration: none" href="">{{ Auth::user()->name }}</a>--}}
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
                                        <hr>
                                    <li><a style="font-size: small" href="{{url('profile')}}">Profile</a></li>
                                    </li>
                                </ul>
                            </li>


                        @else
                            <li class="nav-item pull-right" ><a class="nav-link" style="color: red; position: relative; top: 3px;  font-weight: 900; font-size: medium; text-decoration: none; margin-right: 10px;" href="{{ route('login') }}">Login</a></li>

                            <li class="nav-item pull-right" ><a class="nav-link"  style="color: red; position: relative; top: 3px; font-weight: 900; font-size: medium; text-decoration: none; margin-right: 10px;"  href="{{ route('register') }}">Register</a></li>
                        @endauth
                    </div>
                @endif
            </ul>
        </div>
    </div>
</nav>
<!-- Page Header -->
<header class="masthead" style="background-image: url('../img/GRW_NW_1920x1080.jpg')">
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

                    <div class="post-preview">

                            <h2 style="font-size: 36px" class="post-title">
                                {{$post->title}}
                            </h2>



                        <img class="img-responsive" style=" max-height: 300px; margin: 30px 0;" src="{{asset('/images/' . ($post->image))}}" alt="">
                        <p class="post-meta">Posted by
                            <a href="#">{{$post->user->name}}</a>
                            {{$post->created_at->diffForHumans()}}</p>
                    </div>
                    <p>{!!$post->content !!}</p>
                    <hr>

            {{--Comments--}}
            @if($comments)
                <span style="font-size: 18px; font-weight: bold">{{count($comments)}} comments </span>


                {!! Form::open(['method'=>'POST', 'action'=> 'PostCommentsController@store']) !!}


                <input type="hidden" name="post_id" value="{{$post->id}}">


                <div class="form-group">
                    {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>3])!!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Post', ['class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
                <span style="color: #005cbf; font-size: 15px; font-weight: bold;">NEWEST</span>
            <hr>

                    @foreach($comments as $comment)

                    <div class="media">
                        <img height="64" width="64" class="mr-3" src="{{asset('/images/'. ($comment->post->user->image))}}" alt="Generic placeholder image">
                        <div style="font-weight: 200" class="media-body">
                            <h5 class="mt-0">{{$comment->commenter}}</h5>
                             <p id="{{$comment->id}}" class="comment-content">{{$comment->content}}</p>

                             <div id="{{$comment->id}}" style="display: none" class="edit-content">
                                 {!! Form::model($comment,['method'=>'PATCH', 'action'=> ['PostCommentsController@update', $comment->id]]) !!}


                                 <div class="form-group ml-3">
                                     {!! Form::textarea('content', null, ['class'=>'form-control','rows'=>3])!!}
                                 </div>

                                 <div class="form-group">
                                     {!! Form::submit('update', ['class'=>'btn btn-primary']) !!}
                                 </div>
                                 {!! Form::close() !!}
                             </div>
                            {{--reply--}}
                            @if($comment->reply)
                                @foreach($comment->reply as $reply)
                            <div class="media mt-3">
                                <a class="pr-3" href="#">
                                    <img height="64" width="64" src="{{asset('/images/'. ($reply->comment->post->user->image))}}" alt="Generic placeholder image">
                                </a>
                                <div class="media-body">
                                    <h5 class="mt-0">{{$reply->commenter}}</h5>
                                    {{$reply->content}}
                                </div>
                            </div>
                                @endforeach
                            @endif
                        </div>

                    </div>
                    <div class="edit-buttons" style="font-weight: lighter; font-size: medium; display: inline-flex">
                        <span class="comment-reply"><a  href="#">Reply</a></span>
                        {{--Reply--}}
                        <div class="comment-reply-container">
                            {!! Form::open(['method'=>'POST', 'action'=> 'CommentRepliesController@store']) !!}


                            <input type="hidden" name="comment_id" value="{{$comment->id}}">


                            <div class="form-group ml-3">
                                {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>3])!!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('reply', ['class'=>'btn btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>

                        @if(Auth::user()->name == $comment->commenter)

                        <span class="comment-edit"><a href=""role="button">Edit</a></span>



                            {!! Form::open(['method'=>'DELETE', 'action'=> ['PostCommentsController@destroy',$comment->id]]) !!}

                            <div class="form-group ml-5">
                                {!! Form::submit('DELETE', ['class'=>'btn btn-danger btn-sm']) !!}
                            </div>


                            {!! Form::close() !!}
                        @endif




                    </div>

                  @endforeach
               @endif


            <!-- Pager -->

        </div>
    </div>
</div>


<hr>

<!-- Footer -->
<footer>
    <div id="contact" class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <ul class="list-inline text-center">
                    <li class="list-inline-item">
                        <a href="https://twitter.com/essim_b">
                  <span class="fa-stack ">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://github.com/samuelA1">
                  <span class="fa-stack">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="mailto:sessim37@gmail.com">
                  <span class="fa-stack">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-at fa-stack-1x fa-inverse"></i>
                  </span>
                        </a>
                    </li>
                </ul>
                <br>
                <p class="copyright text-muted">All references from wikipedia.org</p>
                <br>
                <p class="copyright text-muted">Copyright &copy; XtremeGamingBlog 2017</p>
                <br>
                <p class="copyright text-muted">Made By Samuel Essim</p>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/clean-blog.min.js')}}"></script>



@yield('scripts')
<script>
    $('.comment-reply').click(function (event) {
        event.preventDefault();
       $(this).next().slideToggle();

    });

    $( document ).on( "click", function( event ) {
        event.preventDefault();
        $( event.target ).closest( '.comment-content' ).toggle(  );
    });



    // $('.comment-edit').click(function (event)  {
    //     event.preventDefault();
    //
    //     // const $id = $('.comment-content').attr('id');
    //         $('.comment-content'). closest(). toggle();
    //         // $('.edit-content'). first().slideToggle();
    //
    //
    //
    //
    // });
</script>

</body>

</html>
