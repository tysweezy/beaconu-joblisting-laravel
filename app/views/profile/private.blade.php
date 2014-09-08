@extends('layouts.default')

@section('content')

 @if($user->role == "Student")
 	
   <div class="row">
      <div class="col-md-3">

      	
         {{ HTML::image("images/no_img.jpg", $alt="No Image", $attributes=array("width" => 150, "height" => 150)) }}
 	    

 	  </div>


 	  <div class="col-md-6">
 	  	
 	  	<h1 style="margin-top: 0;">{{ e($user->first_name) }} {{ e($user->last_name) }}</h1> 

 	  	<ul class="user-info">
 	  		<li><span>Email: </span>{{ e($user->email) }}</li>
 	  	</ul>

 	  </div>

   <div class="col-md-3">
	@if(Auth::check())
	   <a href="#">Edit Profile</a>
	@endif
   </div>
 </div>
  
<div class="row">
 <h3>Summary of Skills</h3>

 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam laborum cumque rem voluptate, voluptatem id dolore debitis, temporibus aspernatur recusandae sunt vero veniam sint repellat ipsum numquam pariatur nulla impedit.</p>
</div><!-- /row -->

<div class="row">
	<h3>Education</h3>

	<div class="col-md-4">
		<h4>School</h4>

		<p>Fresno State University</p>
	</div>

	<div class="col-md-4">
		<h4>Years Attended</h4>

		<p>2009-2014</p>
	</div>

	<div class="col-md-4">
		<h4>Major</h4>

		<p>Computer Science</p>
	</div>

</div>


<div class="row">
  	
</div>

 @endif

  @if($user->role == "Employer")
    <h2>{{ e($user->username) }} ({{ e($user->email) }})</h2> 
  @endif

 
@stop