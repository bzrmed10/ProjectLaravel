@extends('layouts.admin')

@section('content')
    <h1>Edit Categiry</h1>
 
    {!! Form::model($category,['methode'=>'POST','action'=>['AdminCategoriesController@update',$category->id],'files'=>true]) !!}
    {{ method_field('PUT')}}
    <div class="form-group">
        {!!Form::label('name','Category name :')!!}
        {!!Form::text('name',null ,['class' => 'form-control'])!!}
    </div>
    
    

    <div class="form-group">
        {!!Form::submit('Update Category' ,['class' => 'btn btn-primary'])!!}

    </div>
    {!! Form::close() !!}


  


    


    @include('includes.form-err')
@endsection