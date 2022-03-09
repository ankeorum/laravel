@extends('layout')

@section('title', 'Portfolio - ' . $project->title)

@section('content')

	<h1>{{ $project->title }}</h1>

	@auth
		<a href="{{ route('projects.edit', $project) }}">Edit</a>

		<form method="POST" action="{{ route('projects.destroy', $project) }}">
			@csrf @method('DELETE')
			<button>Remove</button>
		</form>
	@endauth
	<p>{{ $project->description }}</p>
	<p>{{ $project->created_at->diffforhumans() }}</p>
	<br>
	<a href="{{ route('projects.index') }}">List of projects</a>

@endsection