<!DOCTYPE html>
<html lang="en" style="
    height: 400px;
    width: 100%;
    background-size: cover;
    background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('img/recore.jpg');
position: relative;" >

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Profile</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <script src="{{asset('css/libs.css')}}"></script>
    <link href="{{asset('css/admin.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a style="font-size: x-large" class="navbar-brand" href="{{url('/')}}">XGamingBlog</a>
    </div>
</nav>

<div id="wrapper">


    <div id="row"  style="
    color: #fff;
    position: absolute;
   " class="row text-center">
        <h1 style="margin-bottom: 55px;" class="text-center mb-5">{{Auth::user()->name}}</h1>


        <div class="col-sm-5 ">
            <div style="margin-bottom: 30px;margin-left: 50px;">
                <img width="50%" class="img-responsive" src="{{asset('/images/'.(Auth::user()->image))}}" alt="">
            </div>
        </div>
        <div style="font-size: 15px" class="col-sm-6">
            <form>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">NAME:</label>
                    <div class="col-sm-10">
                        {{Auth::user()->name}}
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">EMAIL:</label>
                    <div class="col-sm-10">
                        {{Auth::user()->email}}
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">ID#:</label>
                    <div class="col-sm-10">
                        {{Auth::user()->id}}
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">JOIN:</label>
                    <div class="col-sm-10">
                        {{Auth::user()->created_at}}
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">UPDATED:</label>
                    <div class="col-sm-10">
                        {{Auth::user()->updated_at}}
                    </div>
                </div>
                <a class="btn btn-primary" href="{{url('profile/'. Auth::user()->id. '/edit')}}" role="button">Edit Profile</a>

            </form>

        </div>

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->


<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/metisMenu.min.js')}}"></script>
<script src="{{asset('js/raphael.min.js')}}"></script>
<script src="{{asset('js/morris.min.js')}}"></script>
<script src="{{asset('js/morris-data.js')}}"></script>

<script src="{{asset('js/sb-admin-2.min.js')}}"></script>




</body>

</html>
