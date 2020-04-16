@extends('layouts.admin')

@section('content')
    <h1>Categories </h1>


<div class="row">

    <div class="col-sm-6">
        {!! Form::open(['methode'=>'POST','action'=>'AdminCategoriesController@store','files'=>true]) !!}
        <div class="form-group">
            {!!Form::label('name','Category name :')!!}
            {!!Form::text('name',null ,['class' => 'form-control'])!!}
        </div>
        
        
      
        <div class="form-group">
            {!!Form::submit('Creat Category' ,['class' => 'btn btn-primary'])!!}
    
        </div>
        {!! Form::close() !!}
    
    
        @include('includes.form-err')
    
    </div>
    <div class="col-sm-6">
        <p class="bg-danger">{{ session('deleted_Category')}}</p>
        <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @if($categories)
    
                @foreach ($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                <td><a href="{{route('admin.categories.edit',$category->id)}}">{{$category->name }}</a></td>              
                    <td>{{$category->created_at->diffForHumans()}}</td>
                    <td>{{$category->updated_at->diffForHumans()}}</td>
                    <td>
                      {!! Form::open(['methode'=>'POST','action'=>['AdminCategoriesController@destroy',$category->id]]) !!}
                      {{ method_field('DELETE')}}
                      
                      {!!Form::submit('Delete' ,['class' => 'btn btn-danger'])!!}
                  
                      
                      {!! Form::close() !!}
                    </td>
                  </tr>
                @endforeach
             
              @endif
            </tbody>
          </table>
    


    </div>


</div>


<div class="row">
  <div class="col-sm-6 col-sm-offset-5">
    {{$categories->render()}}
  </div>
</div>


@endsection