@extends('layout')

@section('title','Portfolio')

@section('content')

	<h1>Portfolio</h1>

	<a href="{{ route('projects.create') }}">Create new project</a>

	<ul>

		@forelse($projects as $project)
			<li><a href="{{ route('projects.show', $project) }}">{{ $project->title }}</a></li>
		@empty
			<li>No hay proyectos</li>
		@endforelse
		{{ $projects->links() }}
	</ul>


@endsection