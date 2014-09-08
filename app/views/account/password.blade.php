@extends('layouts.default')

@section('content')

<div class="auth">

<h2>Change Password</h2>

{{ Form::open() }}

 <ul class="errors">
  @foreach($errors->all() as $error)
   <li class="bg-danger">{{ $error }}</li>
  @endforeach
 </ul>


<div class="form-group">
  {{ Form::label('old_password', 'Old Password') }}
  {{ Form::password('old_password', array('class' => 'form-control')) }}
</div>


 <div class="form-group">
  {{ Form::label('password', 'New Password') }}
  {{ Form::password('password', array('class' => 'form-control')) }}
 </div>


 <div class="form-group">
  {{ Form::label('password_repeat', 'Repeat Password') }}
  {{ Form::password('password_repeat', array('class' => 'form-control')) }}
 </div>



  {{ Form::submit('Change Password', array('class' => 'btn')) }}

{{ Form::close() }}

</div><!-- /auth -->
@stop