@extends('layouts.blog-post')

@section('content')
<div class="row">

    <!-- Blog Post Content Column -->
    <div class="col-lg-8">

        <!-- Blog Post -->

        <!-- Title -->
    <h1>{{ $post->title}}</h1>

        <!-- Author -->
        <p class="lead">
            by <a href="#">{{ $post->user->name}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

        <hr>

        <!-- Preview Image -->
        {{-- <img class="img-responsive" src="http://placehold.it/900x300" alt=""> --}}
        <img  class="img-responsive"src="{{$post->photo ? $post->photo->file : 'http://placehold.it/900x300'}}" alt="">
        <hr>

        <!-- Post Content -->
        <p class="lead">{{ $post->body}}</p>

        <hr>

        <!-- Blog Comments -->
@if (Session::has('comment_add'))
    {{session('comment_add')}}
@endif
@if (Session::has('reply_add'))
    {{session('reply_add')}}
@endif

@if (Auth::check())
    <!-- Comments Form -->
    <div class="well">
        {{-- <h4>Leave a Comment:</h4> --}}
        {!! Form::open(['methode'=>'POST','action'=>'PostCommentsController@store']) !!}
        <input type="hidden" name="post_id" value="{{ $post->id}}">
        <div class="form-group">
            {!!Form::label('body','Leave a Comment:')!!}
            {!!Form::textarea('body',null ,['class' => 'form-control','rows'=>3])!!}
        </div>
        <div class="form-group">
            {!!Form::submit('Add Comment' ,['class' => 'btn btn-primary'])!!}
    
        </div>
        {!! Form::close() !!}
    </div>

@endif
        
        <hr>

        <!-- Posted Comments -->
@if (count($comments) > 0 )

@foreach ($comments as $comment)


<div class="media">
    <a class="pull-left" href="#">
        <img height="64" class="media-object" src="{{$comment->photo ? $comment->photo : 'http://placehold.it/64x64'}}" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading">{{$comment->author }}
            <small>{{$comment->created_at->diffForHumans()}}</small>
        </h4>
        {{$comment->body}}

            @if ( count($comment->replies) > 0 )
                @foreach ($comment->replies as $reply)

                @if ($reply->is_active == 1)
                     <!-- Nested Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img height="40" class="media-object" src="{{$reply->photo ? $reply->photo : 'http://placehold.it/64x64'}}" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$reply->author }}
                            <small>{{$reply->created_at->diffForHumans()}}</small>
                        </h4>
                        {{$reply->body}}
                    </div>
                        
                </div>
                @endif
            
                @endforeach
            @endif
                <div class="reply-comment-container">

                    <button class="toggle-reply btn btn-primary pull-right">Reply</button>

                    <div class="rely-form col-sm-9" >
                        {!! Form::open(['methode'=>'POST','action'=>'CommentRepliesController@createReply']) !!}
                        <input type="hidden" name="comment_id" value="{{ $comment->id}}">
                        <div class="form-group">
                        {!!Form::label('body','Leave a reply:')!!}
                        {!!Form::textarea('body',null ,['class' => 'form-control','rows'=>1])!!}
                        </div>
                        <div class="form-group">
                        {!!Form::submit('Add reply' ,['class' => 'btn btn-primary'])!!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                    


                </div>


                    
                </div>
                    <!-- End Nested Comment -->
</div>


@endforeach

@endif
        <!-- Comment -->
        



    </div>

    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">

        <!-- Blog Search Well -->
        <div class="well">
            <h4>Blog Search</h4>
            <div class="input-group">
                <input type="text" class="form-control">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <span class="glyphicon glyphicon-search"></span>
                </button>
                </span>
            </div>
            <!-- /.input-group -->
        </div>

        <!-- Blog Categories Well -->
        <div class="well">
            <h4>Blog Categories</h4>
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.row -->
        </div>

        <!-- Side Widget Well -->
        <div class="well">
            <h4>Side Widget Well</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
        </div>

    </div>

</div>
@endsection

@section('scripts')
    <script>

        $(".toggle-reply").click(function(){
            $(this).next().slideToggle("slow");
        });
    </script>
@endsection