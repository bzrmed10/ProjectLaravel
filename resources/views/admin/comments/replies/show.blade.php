@extends('layouts.admin')

@section('content')
    
<h1>Replies</h1>

@if (count($replies) > 0 )
@if (Session::has('deleted_reply'))
    
    <p class="bg-danger">{{session('deleted_reply')}}</p>
@endif

<table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Author</th>
        <th scope="col">email</th>        
        <th scope="col">Body</th>
        <th scope="col">Post</th>   
        {{-- <th scope="col">Created</th>
        <th scope="col">Updated</th> --}}
        {{-- <th scope="col">Action</th> --}}
      </tr>
    </thead>
    <tbody>
        @if($replies)

        @foreach ($replies as $reply)
        <tr>
            <td>{{$reply->id}}</td>
            <td>{{$reply->author }}</td>
            <td>{{$reply->email}} </td>
            <td>{{str_limit($reply->body, 30)}}</td> 
           <td><a href="{{route('home.post',$reply->comment->post->id)}}">View post</a> </td>
                          
            {{-- <td>{{$comment->created_at->diffForHumans()}}</td>
            <td>{{$comment->updated_at->diffForHumans()}}</td> --}}
            <td>
@if ($reply->is_active == 1)
        {!! Form::open(['methode'=>'POST','action'=>['CommentRepliesController@update',$reply->id],'files'=>true]) !!}
        {{ method_field('PUT')}}
            <input type="hidden" name="is_active" value="0">
            <div class="form-group">
                {!!Form::submit('Unapprove' ,['class' => 'btn btn-warning'])!!}
            </div>
        {!! Form::close() !!}
@else
        {!! Form::open(['methode'=>'POST','action'=>['CommentRepliesController@update',$reply->id],'files'=>true]) !!}
        {{ method_field('PUT')}}
            <input type="hidden" name="is_active" value="1">
            <div class="form-group">
                {!!Form::submit('Approve' ,['class' => 'btn btn-success'])!!}
            </div>
        {!! Form::close() !!}
@endif
                
</td>
<td>

            
              {!! Form::open(['methode'=>'POST','action'=>['CommentRepliesController@destroy',$reply->id]]) !!}
              {{ method_field('DELETE')}}
              
              {!!Form::submit('Delete Reply' ,['class' => 'btn btn-danger'])!!}
          
              
              {!! Form::close() !!}
            </td>
          </tr>
        @endforeach
     
      @endif
    </tbody>
  </table>

@else
    
<h1 class="text-center">No Replies</h1>


@endif




@endsection