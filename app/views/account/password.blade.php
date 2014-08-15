@extends('layouts.default')

@section('content')

<h2>Change Password</h2>

{{ Form::open() }}

 <ul>
  @foreach($errors->all() as $error)
   <li class="bg-danger">{{ $error }}</li>
  @endforeach
 </ul>


  {{ Form::label('old_password', 'Old Password') }}
  {{ Form::password('old_password') }}


  {{ Form::label('password', 'New Password') }}
  {{ Form::password('password') }}


  {{ Form::label('password_repeat', 'Repeat Password') }}
  {{ Form::password('password_repeat') }}



  {{ Form::submit('Change Password') }}

{{ Form::close() }}


@stop