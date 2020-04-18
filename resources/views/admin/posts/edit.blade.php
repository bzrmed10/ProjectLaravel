@extends('layouts.admin')

@section('content')
    <h1>Edit Posts</h1>
    
<div class="row">
    <div class="col-sm-3">
        <img height="100" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt="">

    </div>
<div class="col-sm-9">
    {!! Form::model($post,['methode'=>'POST','action'=>['AdminPostsController@update',$post->id],'files'=>true]) !!}
    {{ method_field('PUT')}}
    <div class="form-group">
        {!!Form::label('title','Title :')!!}
        {!!Form::text('title',null ,['class' => 'form-control'])!!}
    </div>
    
    <div class="form-group">
        {!!Form::label('category_id','Category :')!!}
        {!!Form::select('category_id',['' => 'Choose Category'] + $categories  ,null ,['class' => 'form-control'])!!}
    </div>
    
    <div class="form-group">
        {!!Form::label('photo_id','Picture :')!!}
        {!!Form::file('photo_id'  ,['class' => 'form-control'])!!}

    </div>
    
    <div class="form-group">
        {!!Form::label('body','Description :')!!}
        {!!Form::textarea('body', null,['class' => 'form-control','row' =>2])!!}
    </div>
    <div class="form-group">
        {!!Form::submit('Update Post' ,['class' => 'btn btn-primary'])!!}

    </div>
    {!! Form::close() !!}
</div>
    
</div>

  


    


    @include('includes.form-err')
@endsection

@section('scripts')

@include('includes.tinyeditor')

@endsection