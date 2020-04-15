@extends('layouts.admin')

@section('content')


    <h1>Medias</h1>

    <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
            <th scope="col">Action</th>
            
          </tr>
        </thead>
        <tbody>
            @if($photos)

            @foreach ($photos as $photo)
            <tr>
                <td>{{$photo->id}}</td>
                <td>{{$photo->file }}</td>
                <td><img height="30" src="{{$photo->file ? $photo->file : 'http://placehold.it/400x400'}}" alt=""></td>              
                <td>{{$photo->created_at->diffForHumans()}}</td>
                <td>{{$photo->updated_at->diffForHumans()}}</td>
                <td>
                  {!! Form::open(['methode'=>'POST','action'=>['AdminMediasController@destroy',$photo->id]]) !!}
                  {{ method_field('DELETE')}}
                  
                  {!!Form::submit('Delete' ,['class' => 'btn btn-danger'])!!}
              
                  
                  {!! Form::close() !!}
                </td>
              </tr>
            @endforeach
         
          @endif
        </tbody>
      </table>
@endsection