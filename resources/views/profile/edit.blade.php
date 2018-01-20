<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Edit Profile</title>

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



    <div class="row col-sm-offset-1 profile-edit">
        <div class="row">

            <div style="margin-bottom: 30px;" class="col-sm-9">
                <img width="50%" class="img-responsive" src="{{asset('/images/'. ($users->image))}}" alt="">
            </div>
        </div>

        {!! Form::model($users, ['method'=>'PATCH', 'action'=> ['UserProfileController@update', $users->id],'files'=>true]) !!}


        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control'])!!}
        </div>


        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::email('email', null, ['class'=>'form-control'])!!}
        </div>


        <div class="form-group">
            {!! Form::label('image', 'Photo:') !!}
            {!! Form::file('image', null, ['class'=>'form-control'])!!}
        </div>



        <div class="form-group">
            {!! Form::label('password', 'Password:') !!}
            {!! Form::password('password', ['class'=>'form-control'])!!}
        </div>


        <div class="form-group">
            {!! Form::submit('Update User', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div></div>




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
