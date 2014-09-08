@extends('layouts.default')

@section('content')

<div class="auth">

<h2>Register for an account</h2>
 
 {{ Form::open() }}

 <ul class="errors">
  @foreach($errors->all() as $error)
   <li class="bg-danger">{{ $error }}</li>
  @endforeach
 </ul>

  <br />
   

  <div class="form-group">
   {{ Form::label('username', 'Username') }}
   {{ Form::text('username', '', array('class' => 'form-control')) }}
  </div>


  <div class="form-group">
   {{ Form::label('email', 'Email') }}
   {{ Form::text('email', '', array('class' => 'form-control')) }}

  </div>


  <div class="form-group">
   {{ Form::label('first_name', 'First Name') }}
   {{ Form::text('first_name', '', array('class' => 'form-control')) }}

  </div>


  <div class="form-group">
   {{ Form::label('last_name', 'Last Name') }}
   {{ Form::text('last_name', '', array('class' => 'form-control')) }}
  </div>


  <div class="form-group">
   {{ Form::label('password', 'Password') }}
   {{ Form::password('password',  array('class' => 'form-control')) }}
  </div>



  <div class="form-group">
   {{ Form::label('password_repeat', 'Repeat Password') }}
   {{ Form::password('password_repeat',  array('class' => 'form-control')) }}
  </div>

  <div class="form-group">
    {{ Form::label('role', 'Choose Account Type') }}
    {{ Form::select('role', array('Employer' => 'Employer', 'Student' => 'Student')); }}

    
  </div>

   {{ Form::submit('Register', array('class' => 'btn')) }}

   {{ Form::close() }}  


 </div><!-- /auth -->

@stop