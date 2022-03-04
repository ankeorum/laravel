@extends('layout')

@section('title','Edit Project')

@section('content')

	<h1>Project Edition - {{ $project->title }}</h1>

	@include('partials.validation-errors')

	<form method="POST" action="{{ route('projects.update', $project) }}">

		@method('PATCH')

		@include('projects._form', ['btnText' => 'Update'])


	</form>
	<a href="{{ route('projects.index') }}"><button>Back</button></a>
@endsection