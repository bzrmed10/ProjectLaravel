@extends('layouts.admin')

@section('content')
    
<h1>Comments</h1>

@if ($comments)
@if (Session::has('deleted_cmt'))
    
    <p class="bg-danger">{{session('deleted_cmt')}}</p>
@endif

<table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Author</th>
        <th scope="col">email</th>        
        <th scope="col">Body</th>
        <th scope="col">Post</th>   
        <th scope="col">Replies</th>   
        {{-- <th scope="col">Created</th>
        <th scope="col">Updated</th> --}}
        {{-- <th scope="col">Action</th> --}}
      </tr>
    </thead>
    <tbody>
        @if($comments)

        @foreach ($comments as $comment)
        <tr>
            <td>{{$comment->id}}</td>
            <td>{{$comment->author }}</td>
            <td>{{$comment->email}} </td>
            <td>{{str_limit($comment->body, 30)}}</td> 
           <td><a href="{{route('home.post',$comment->post->id)}}">View post</a> </td>
           <td><a href="{{route('admin.comment.replies.show',$comment->id)}}">View replies</a> </td>
                          
            {{-- <td>{{$comment->created_at->diffForHumans()}}</td>
            <td>{{$comment->updated_at->diffForHumans()}}</td> --}}
            <td>
@if ($comment->is_active == 1)
        {!! Form::open(['methode'=>'POST','action'=>['PostCommentsController@update',$comment->id],'files'=>true]) !!}
        {{ method_field('PUT')}}
            <input type="hidden" name="is_active" value="0">
            <div class="form-group">
                {!!Form::submit('Unapprove' ,['class' => 'btn btn-warning'])!!}
            </div>
        {!! Form::close() !!}
@else
        {!! Form::open(['methode'=>'POST','action'=>['PostCommentsController@update',$comment->id],'files'=>true]) !!}
        {{ method_field('PUT')}}
            <input type="hidden" name="is_active" value="1">
            <div class="form-group">
                {!!Form::submit('Approve' ,['class' => 'btn btn-success'])!!}
            </div>
        {!! Form::close() !!}
@endif
                
</td>
<td>

            
              {!! Form::open(['methode'=>'POST','action'=>['PostCommentsController@destroy',$comment->id]]) !!}
              {{ method_field('DELETE')}}
              
              {!!Form::submit('Delete' ,['class' => 'btn btn-danger'])!!}
          
              
              {!! Form::close() !!}
            </td>
          </tr>
        @endforeach
     
      @endif
    </tbody>
  </table>

@else
    
<h1 class="text-center">No Comment</h1>


@endif




@endsection