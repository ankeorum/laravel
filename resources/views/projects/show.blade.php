@extends('layout')

@section('title', 'Portfolio - ' . $project->title)

@section('content')

	<h1>{{ $project->title }}</h1>
	<h2>{{ $project }}</h2>
	<a href="{{ route('projects.edit'), $project }}">Edit</a>
	<p>{{ $project->description }}</p>
	<p>{{ $project->created_at->diffforhumans() }}</p>
	<br>
	<a href="{{ route('projects.index') }}">List of projects</a>

@endsection