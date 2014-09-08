@extends('layouts.default')
@section('content')

<div class="auth">
  <h2>Forgot Password</h2>

{{ Form::open() }}


 @foreach($errors->all() as $error)
   <li class="bg-danger">{{ $error }}</li>
  @endforeach


 <div class="form-group">
   {{ Form::label('email', 'Email') }}
   {{ Form::email('email', '', array('class' => 'form-control')) }}
 </div>


  {{ Form::submit('Recover', array('class' => 'btn')) }}
    
  {{ Form::close() }}

 </div><!-- /auth -->
@stop
