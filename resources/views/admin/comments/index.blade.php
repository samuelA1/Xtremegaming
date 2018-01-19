@extends('layouts.admin')

@section('title')
        Comments
@stop
@section('content')

    @if(count($comments) > 0)

        <table class="table">
            <thead>
            <tr>
                <th>id</th>
                <th>Author</th>
                <th>Email</th>
                <th>Content</th>
            </tr>
            </thead>
            <tbody>

            @foreach($comments as $comment)


                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->commenter}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{$comment->content}}</td>
                    <td><a href="{{url('post',$comment->post->slug)}}">View Post</a></td>
                    <td><a href="{{url('admin/reply', $comment->id)}}">View Replies</a></td>

                    <td>

                        @if($comment->is_active == 1)


                            {!! Form::model($comment,['method'=>'PATCH', 'action'=> ['PostCommentsController@update', $comment->id]]) !!}


                            <input type="hidden" name="is_active" value="0">


                            <div class="form-group">
                                {!! Form::submit('Un-approve', ['class'=>'btn btn-success']) !!}
                            </div>
                            {!! Form::close() !!}


                        @else



                            {!! Form::model($comment,['method'=>'PATCH', 'action'=> ['PostCommentsController@update', $comment->id]]) !!}


                            <input type="hidden" name="is_active" value="1">


                            <div class="form-group">
                                {!! Form::submit('Approve', ['class'=>'btn btn-info']) !!}
                            </div>
                            {!! Form::close() !!}




                        @endif



                    </td>

                    <td>


                        {!! Form::open(['method'=>'DELETE', 'action'=> ['PostCommentsController@destroy', $comment->id]]) !!}


                        <div class="form-group">
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}



                    </td>


                </tr>


            @endforeach

            </tbody>
        </table>



    @else


        <h1 class="text-center">No Comments</h1>



    @endif

@stop