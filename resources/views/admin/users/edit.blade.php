@extends('layouts.admin')

@section('title')
    Edit User
@stop
@section('content')
    <div class="row">
        <div style="margin-bottom: 30px;" class="col-sm-9">
            <img width="20%" class="img-responsive" src="{{asset('/images/'. ($users->image))}}" alt="">
        </div>
    </div>

    {!! Form::model($users, ['method'=>'PATCH', 'action'=> ['AdminUsersController@update', $users->id],'files'=>true]) !!}


          <div class="form-group">
                 {!! Form::label('name', 'Name:') !!}
                 {!! Form::text('name', null, ['class'=>'form-control'])!!}
           </div>


           <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::email('email', null, ['class'=>'form-control'])!!}
           </div>

            <div class="form-group">
                {!! Form::label('role_id', 'Role:') !!}
                {!! Form::select('role_id', [''=>'Choose Options'] + $roles , null, ['class'=>'form-control'])!!}
            </div>


            <div class="form-group">
                {!! Form::label('is_active', 'Status:') !!}
                {!! Form::select('is_active', array(1 => 'Active', 0=> 'Not Active'), 0 , ['class'=>'form-control'])!!}
             </div>


            <div class="form-group">
                {!! Form::label('photo_id', 'Photo:') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
             </div>



            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', ['class'=>'form-control'])!!}
             </div>


             <div class="form-group">
                {!! Form::submit('Update User', ['class'=>'btn btn-primary']) !!}
             </div>

           {!! Form::close() !!}
 @stop