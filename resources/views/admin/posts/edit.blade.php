@extends('layouts.admin')
@section('title')
    Edit Post
@stop

@section('content')
    @include('includes.tinyeditor')


    <div class="row">
        <div style="margin-bottom: 30px;" class="col-sm-9">
            <img width="20%" class="img-responsive" src="{{asset('/images/'. ($posts->image))}}" alt="">
        </div>
    </div>


            {!! Form::model($posts, ['method'=>'PATCH', 'action'=> ['AdminPostsController@update', $posts->id], 'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', null, ['class'=>'form-control'])!!}
            </div>


            <div class="form-group">
                {!! Form::label('image', 'Photo:') !!}
                {!! Form::file('image', null, ['class'=>'form-control'])!!}
            </div>


            <div class="form-group">
                {!! Form::label('content', 'Description:') !!}
                {!! Form::textarea('content', null, ['class'=>'form-control'])!!}
            </div>

            <div class="row col-md-7">
                <div class="col-lg-2">
                    <div class="form-group">
                        {!! Form::submit('Update Post', ['class'=>'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>

                <div class="col-lg-2">
                    {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminPostsController@destroy', $posts->id]]) !!}

                    <div class="form-group">
                        {!! Form::submit('Delete Post', ['class'=>'btn btn-danger']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
            <div class="row">


                @include('includes.error')



            </div>


@stop