@extends('layouts.default')

@section('content')
  <h2>Login</h2>

  {{ Form::open() }}

 
    {{ Form::label('username', 'Username') }}
    {{ Form::text('username') }}

    {{ Form::label('password', 'Password') }}
    {{ Form::password('password') }}

    {{ Form::label('student', 'Role') }}
	{{ Form::checkbox('role', 'Student') }}
	{{ Form::checkbox('role', 'Employer') }}
	{{ Form::checkbox('role', 'Admin') }}

    
    {{ Form::submit('Login', array('class' => 'btn')) }}
	

  {{ Form::close() }}
@stop