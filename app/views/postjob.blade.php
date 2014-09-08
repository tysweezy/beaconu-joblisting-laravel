@extends('layouts.default')

@section('content')
  {{ Form::open(array('route' => 'listings.store')) }}
   
   
<div class="row">
   <div class="form-group col-md-6">
     {{ Form::label('job_title', 'Job Title') }}
     {{ Form::text('job_title', '', array('class' => 'form-control')) }}
  </div>



  <div class="form-group col-md-6">
      {{ Form::label('company', 'Company') }}
    	{{ Form::text('company', '', array('class' => 'form-control')) }}

  </div> 
</div><!-- /row -->



<div class="row">
   <div class="form-group col-md-6"> 
  	{{ Form::label('email', 'Email') }}
  	{{ Form::text('email', '', array('class' => 'form-control')) }}
  </div>



   <div class="form-group col-md-6">
    {{ Form::label('type', 'Type') }}
  	{{ Form::select('type', array('Full-Time' => 'Full-Time', 'Part-Time' => 'Part-Time', 'Freelance' => 'Freelace')); }}
  </div>

</div><!-- /row -->


<div class="row">
  <div class="form-group col-md-6">
  	{{ Form::label('salaryrange', 'Salary Range') }}
  	{{ Form::text('salaryrange', '', array('class' => 'form-control')) }}
  </div>

 
  <div class="form-group col-md-6">
  	{{ Form::label('apply', 'Apply') }}
  	{{ Form::select('apply', array('Email' => 'Email', 'Website' => 'Website', 'Call' => 'Call')); }}
  </div>
</div> <!-- / row -->

 <div class="row">
  <div class="form-group col-md-6">
	{{ Form::label('start_date', 'Start Date') }}
	{{ Form::text('start_date', '', array('class' => 'form-control datepicker', 'id' => 'start_date', 'data-datepicker' => 'datepicker')) }}

   </div>


   <div class="form-group col-md-6">
    	{{ Form::label('qualifications', 'Qualifications') }}
    	{{ Form::text('qualifications', '', array('class' => 'form-control')) }} 
   </div>

  </div><!-- / row -->

	
   <div class="form-group">
	{{ Form::label('description', 'Description') }} <br />
	{{ Form::textarea('description', '', array('class' => 'message', 'maxlength' => '4000')) }}

   </div>

    <span class="countdown"></span>

     {{ Form::submit('Post',  array('class' => 'btn', 'id' => 'postjob')) }}

	

  {{ Form::close() }}
@stop