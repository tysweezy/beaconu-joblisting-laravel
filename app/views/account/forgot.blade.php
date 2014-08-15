@extends('layouts.default')


@section('content')
  <h2>Forgot Password</h2>

{{ Form::open() }}


 @foreach($errors->all() as $error)
   <li class="bg-danger">{{ $error }}</li>
  @endforeach


   {{ Form::label('email', 'Email') }}
   {{ Form::email('email') }}


  {{ Form::submit('Recover') }}
    
  {{ Form::close() }}
@stop
