@extends('layouts.default')

@section('content')
<h2>Apply For: <span style="#aaa" class="apply-title">{{ $apply->job_title }} @ {{ $apply->company }}</span></h2>


{{ Form::open(['route' => ['apply-job-post', $apply->id], 'files' => 'true']) }}

 <ul class="errors">
  @foreach($errors->all() as $error)
   <li class="bg-danger">{{ $error }}</li>
  @endforeach
 </ul>


 <div class="row">  
   <div class="form-group col-md-6">
	{{ Form::label('name', 'Name') }}
	{{ Form::text('name', Auth::user()->first_name, array('class' => 'form-control')) }}
   </div>


   <div class="form-group col-md-6"> 

	{{ Form::label('apply-email', 'Email') }}
	{{ Form::email('apply-email', Auth::user()->email, array('class' => 'form-control')) }}
  </div>

</div>


  <div class="form-group">
	{{ Form::label('resume', 'Upload Resume') }}
	{{ Form::file('resume') }}
  </div>


  
<div class="row">
  <div class="form-group col-md-12">

	{{ Form::label('cover-letter', 'Cover Letter') }} <br>
	{{ Form::textarea('cover-letter', '', array('class' => 'message', 'maxlength' => '4000')) }}
  </div>

<span class="countdown"></span>

</div><!-- /row -->

{{ Form::submit('Send Application', array('class' => 'btn', 'id' => 'postjob')) }}


{{ Form::close() }}


@stop