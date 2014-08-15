@extends('layouts.default')

@section('content')
  <h2>Login</h2>

  {{ Form::open(array('route' => 'account-login', 'method'  => 'POST')) }}


  <ul>
  @foreach($errors->all() as $error)
   <li class="bg-danger">{{ $error }}</li>
  @endforeach
 </ul>

 
    {{ Form::label('email', 'Email') }}
    {{ Form::email('email') }}

    {{ Form::label('password', 'Password') }}
    {{ Form::password('password') }}


   
    {{ Form::checkbox('remember') }}
     {{ Form::label('remember', "Remember Me") }}  |

     <a href="{{ URL::route('account-forgot-password') }}">Forgot Password</a>

    
    {{ Form::submit('Login', array('class' => 'btn')) }}


	

  {{ Form::close() }}
@stop