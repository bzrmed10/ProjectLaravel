@extends('layouts.admin')

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css" rel="stylesheet">
@endsection



@section('content')


    <h1>Upload Medias</h1>


    {!! Form::open(['methode'=>'POST','action'=>'AdminMediasController@store','class'=>'dropzone']) !!}
    

    {!! Form::close() !!}
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>
@endsection