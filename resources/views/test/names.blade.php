@extends('layouts.main')

@section('content')
<h1>Information about user</h1>
<p>Name: {{ $name }}</p>
@if($lname)
    <p>Last name: {{ $lname }}</p>
@endif
@endsection

