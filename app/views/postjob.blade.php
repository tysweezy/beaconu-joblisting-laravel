@extends('layouts.default')

@section('content')
  {{ Form::open(array('route' => 'listings.store')) }}
    {{ Form::label('job_title', 'Job Title') }}
    {{ Form::text('job_title') }}

    {{ Form::label('company', 'Company') }}
	{{ Form::text('company') }}


	{{ Form::label('email', 'Email') }}
	{{ Form::text('email') }}


    {{ Form::label('type', 'Type') }}
	{{ Form::select('type', array('Full-Time' => 'Full-Time', 'Part-Time' => 'Part-Time', 'Freelance' => 'Freelace')); }}

	{{ Form::label('salaryrange', 'Salary Range') }}
	{{ Form::text('salaryrange') }}


	{{ Form::label('apply', 'Apply') }}
	{{ Form::select('apply', array('Email' => 'Email', 'Website' => 'Website', 'Call' => 'Call')); }}

	{{ Form::label('start_date', 'Start Date') }}
	{{ Form::text('start_date', '', array('class' => 'form-control datepicker', 'id' => 'start_date', 'data-datepicker' => 'datepicker')) }}

	{{ Form::label('qualifications', 'Qualifications') }}
	{{ Form::text('qualifications') }}

	{{ Form::label('description', 'Description') }} <br />
	{{ Form::textarea('description', '', array('class' => 'message', 'maxlength' => '4000')) }}

    <span class="countdown"></span>

     {{ Form::submit('Post',  array('class' => 'btn')) }}

	

  {{ Form::close() }}
@stop