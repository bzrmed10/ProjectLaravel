@extends('layouts.admin')

@section('content')


    <h1>Medias</h1>



    <form action="/delete/media" method="post" class="form-inline">
      {{ csrf_field() }}
      <div class="form-group">
          <select name="checkboxArray" id="" class="form-control">
              <option value="delete">Delete</option>
          </select>
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-primary">
      </div>


      <div class="row">
        <table class="table table-striped table-bordered" style="margin-top: 20px;">
          <thead>
            <tr>
              <th scope="col"><input type="checkbox" name="" id="options"></th>
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
                  <td><input class="checkboxes" type="checkbox" name="checkboxArray[]" value="{{$photo->id}}"></td>
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
      </div>
      
    </form>
    
@endsection


@section('scripts')
    <script>
      $(document).ready(function(){
        
        $("#options").click(function(){
            
            if(this.checked){
              $(".checkboxes").each(function(){
                this.checked = true;
              });
            }else{
              $(".checkboxes").each(function(){
                this.checked = false;
              });
            }
        });
        
      });
    </script>
    
@endsection