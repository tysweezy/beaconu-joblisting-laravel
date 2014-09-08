@extends('layouts.default')

@section('content')
 

@if(Auth::check()) 



<a href="postjob" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Post a job</a>
 <a href="{{ URL::route('account-logout') }}" class="btn btn-warning">Logout</a>

 <div class="pull-right" id="auth-details">
	 

	 Hello, <a href="profile/private/{{ Auth::user()->username }}">{{ Auth::user()->username }}</a> |

	 <a href="{{ URL::route('account-change-password') }}">Change Password</a>
</div>


@else

<a href="{{ URL::route('account-login') }}" class="btn btn-warning"><span class="glyphicon glyphicon-lock"></span> Login</a>
<a href="{{ URL::route('account-create') }}" class="btn btn-warning">Register</a>

@endif

@foreach($listings as $row)

<div class="scroll">
	
	 <div class="listing" id="{{ $row->id }}">
	 <div class="list-left">
		<h2>{{ $row->job_title }} <span class="company">@ {{ $row->company }}</span></h2>
		

		<p class="qualifications">Requirements: 
		
				{{ $row->qualifications }}
			
		</p>
		

		<p>Posted by: <a href="mailto:{{ $row->email }}">{{$row->email}}</a></p>
		<p>Salary Range: 
			{{ $row->salaryrange }} Per Year
		</p>

		<p class="description">Description: <br /> 
		
			
				{{ $row->description }} 
		
		</p>
	 </div>

	 <div class="list-right">
	 	<span class="type">{{ $row->type }}</span>
		 
	 	 <span class="date">Start Date: 

	 	 	{{ $row->start_date }}
			
	 	 </span>


	 	<span class"apply" style="color:#999; font-style: italic;">Best way to apply: {{ $row->apply }}</span>

	 	

   
	  <a href="apply/{{ $row->id }}" class="applyBtn">Apply</a>
  

	 </div><!-- /list-right -->


	</div><!-- /listing -->



	</div>

@endforeach

@stop