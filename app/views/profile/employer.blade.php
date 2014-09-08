@extends('layouts.default')


@section('content')
   <h2>{{ e($user->username) }} ({{ e($user->email) }})</h2>

  @if(Auth::user()->role == "Employer")
    <p>Employer Content</p>
  @endif
@stop