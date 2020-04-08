@extends('layouts.admin')


@section('content')

<h1>Edit User</h1>
<div class="row">
    <div class="col-sm-3">
        <img class="img-responsive img-rounded" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt="">
    </div>
    <div class="col-sm-9">
        {!! Form::model($user,['methode'=>'POST','action'=>['AdminUsersController@update',$user->id],'files'=>true]) !!}
        {{ method_field('PUT')}}
        <div class="form-group">
            {!!Form::label('name','Name :')!!}
            {!!Form::text('name',null ,['class' => 'form-control'])!!}
        </div>
        <div class="form-group">
            {!!Form::label('email','Email :')!!}
            {!!Form::email('email',null ,['class' => 'form-control'])!!}
        </div>
        <div class="form-group">
            {!!Form::label('role_id','Role :')!!}
            {!!Form::select('role_id', $roles ,null ,['class' => 'form-control'])!!}
        </div>
        <div class="form-group">
            {!!Form::label('is_active','Status :')!!}
            {!!Form::select('is_active', array(1 => 'Active', 0  => 'Not active' ) , null ,['class' => 'form-control'])!!}
        </div>
        <div class="form-group">
            {!!Form::label('photo_id','Picture :')!!}
            {!!Form::file('photo_id'  ,['class' => 'form-control'])!!}
        </div>
        <div class="form-group">
            {!!Form::label('password','Password :')!!}
            {!!Form::password('password' ,['class' => 'form-control'])!!}
        </div>
        <div class="form-group">
            {!!Form::submit('Update User' ,['class' => 'btn btn-primary col-sm-2'])!!}
    
        </div>
        {!! Form::close() !!}

        {!! Form::open(['methode'=>'POST','action'=>['AdminUsersController@destroy',$user->id]]) !!}
        {{ method_field('DELETE')}}
        <div class="form-group">
            &nbsp;{!!Form::submit('Delete User' ,['class' => 'btn btn-danger'])!!}
    
        </div>
        {!! Form::close() !!}

    </div>

</div>


  @include('includes.form-err')

@endsection