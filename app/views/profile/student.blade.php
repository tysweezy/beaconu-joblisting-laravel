@extends('layouts.default')

@section('content')
 <h2>{{ e($user->username) }} ({{ e($user->email) }})</h2>

 
@stop