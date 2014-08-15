@extends('layouts.default')

@section('content')
<h2>Apply For: <span style="#aaa" class="apply-title">{{ $apply->job_title }} @ {{ $apply->company }}</span></h2>


{{ Form::open() }}

 <ul>
  @foreach($errors->all() as $error)
   <li class="bg-danger">{{ $error }}</li>
  @endforeach
 </ul>

{{ Form::label('name', 'Name') }}
{{ Form::text('name') }}


{{ Form::label('apply-email', 'Email') }}
{{ Form::email('apply-email') }}

{{ Form::label('file', 'Upload Resume') }}
{{ Form::file('file') }}



{{ Form::label('cover-letter', 'Cover Letter') }} <br>
{{ Form::textarea('cover-letter', '', array('class' => 'message', 'maxlength' => '4000')) }}

<span class="countdown"></span>

{{ Form::submit('Send Application', array('class' => 'btn')) }}


{{ Form::close() }}


@stop