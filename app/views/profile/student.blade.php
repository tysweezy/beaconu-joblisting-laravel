@extends('layouts.default')

@section('content')


 <h2>{{ e($user->username) }} ({{ e($user->email) }})</h2> 


 @if($user->role == "Student")
   <h3>Student Profile Data</h3>

 @endif


  @if($user->role == "Employer")
    <p>Employer Content</p>
  @endif

 
@stop