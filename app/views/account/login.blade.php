@extends('layouts.default')

@section('content')
 
<div class="auth">

  <h2>Login</h2>

  {{ Form::open(array('route' => 'account-login', 'method'  => 'POST')) }}


  <ul class="errors">
  @foreach($errors->all() as $error)
   <li class="bg-danger">{{ $error }}</li>
  @endforeach
 </ul>

 
  <div class="form-group"> 
    {{ Form::label('email', 'Email') }}
    {{ Form::email('email', '', array('class' => 'form-control')) }}

  </div>


   <div class="form-group"> 
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password', array('class' => 'form-control')) }}
   </div>

   
 <div class="form-group">
    {{ Form::checkbox('remember') }}
    {{ Form::label('remember', "Remember Me") }}  |
     <a href="{{ URL::route('account-forgot-password') }}">Forgot Password</a>
  </div>

  <p>Don't have an account? <a href="{{URL::route('account-create')}}">Sign up</a></p>

    
    {{ Form::submit('Login', array('class' => 'btn')) }}


	

  {{ Form::close() }}

</div><!-- /auth -->
@stop