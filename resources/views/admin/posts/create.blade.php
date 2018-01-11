@extends('layouts.admin')
@section('title')
    Create Post
@stop

@section('content')

        {!! Form::open(['method'=>'POST', 'action'=> 'AdminPostsController@store', 'files'=>true]) !!}

        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control'])!!}
        </div>


        <div class="form-group">
            {!! Form::label('image', 'Photo:') !!}
            {!! Form::file('image', null,['class'=>'form-control'])!!}
        </div>


        <div class="form-group">
            {!! Form::label('content', 'Content:') !!}
            {!! Form::textarea('content', null, ['class'=>'form-control'])!!}
        </div>




        <div class="form-group">
            {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}


@stop