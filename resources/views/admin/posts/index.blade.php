@extends('layouts.admin')

@section('content')
    <h1>Posts</h1>


    <p class="bg-danger">{{ session('deleted_post')}}</p>
    <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Photo</th>
            <th scope="col">Owner</th>
            <th scope="col">Category</th>
            <th scope="col">Tile</th>
            <th scope="col">Body</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @if($posts)

            @foreach ($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td><img height="30" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>
                <td>{{$post->user->name }}</td>
                <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}} </a></td>
                <td>{{str_limit($post->body, 15)}}</td>               
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
                <td>
                  {!! Form::open(['methode'=>'POST','action'=>['AdminPostsController@destroy',$post->id]]) !!}
                  {{ method_field('DELETE')}}
                  
                  {!!Form::submit('Delete Post' ,['class' => 'btn btn-danger'])!!}
              
                  
                  {!! Form::close() !!}
                </td>
              </tr>
            @endforeach
         
          @endif
        </tbody>
      </table>
@endsection