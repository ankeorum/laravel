@extends('layout')

@section('title', 'Portfolio - ' . $project->title)

@section('content')

	<h1>{{ $project->title }}</h1>
	<p>{{ $project->description }}</p>
	<p>{{ $project->created_at->diffforhumans() }}</p>

@endsection