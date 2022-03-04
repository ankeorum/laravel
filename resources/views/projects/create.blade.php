@extends('layout')

@section('title','New Project')

@section('content')

	<h1>New Project Insertion Form</h1>

	@include('partials.validation-errors')

	<form method="POST" action="{{ route('projects.store') }}">

		@include('projects._form', ['btnText' => 'Submit'])

	</form>
	<a href="{{ route('projects.index') }}"><button>Back</button></a>
@endsection