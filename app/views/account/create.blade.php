@extends('layouts.default')

@section('content')

<h2>Register for an account</h2>
 
 {{ Form::open() }}

 <ul>
  @foreach($errors->all() as $error)
   <li class="bg-danger">{{ $error }}</li>
  @endforeach
 </ul>

  <br />
   

   {{ Form::label('username', 'Username') }}
   {{ Form::text('username') }}

   {{ Form::label('email', 'Email') }}
   {{ Form::text('email') }}

   {{ Form::label('first_name', 'First Name') }}
   {{ Form::text('first_name') }}

   {{ Form::label('last_name', 'Last Name') }}
   {{ Form::text('last_name') }}

   {{ Form::label('password', 'Password') }}
   {{ Form::password('password') }}

   {{ Form::label('password_repeat', 'Repeat Password') }}
   {{ Form::password('password_repeat') }}

   {{ Form::submit('register', array('class' => 'btn')) }}

 {{ Form::close() }}

@stop