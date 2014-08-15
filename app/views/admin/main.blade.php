@extends('layouts.default')

@section('content')

<h3>Admin</h3>

<table class="table">
	<tr>
		<td>ID</td>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Username</td>
		<td>Email</td>
		<td>Progress</td>
		<td>Title</td>
		<td>Edit</td>
	</tr>

    <tr>
    	@foreach($users as $user)
          <td>{{ $user->id }}</td>
          <td>{{ $user->first_name }}</td>
          <td>{{ $user->last_name }}</td>
          <td>{{ $user->username }}</td>
          <td>{{ $user->email }}</td>
          <td>
          	
		<div class="progress">
		   <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{ $user->progress }}%;">
		    {{ $user->progress }}%
		  </div>
		</div>
          </td>

          <td>{{ $user->title }}</td>

          <td><a href="#" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Edit</a></td>

    	@endforeach
    </tr>


</table>

@stop