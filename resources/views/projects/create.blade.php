@extends('layout')

@section('title','New Project')

@section('content')

	<h1>New Project Insertion Form</h1>
	<form method="POST" action="{{ route('projects.store') }}">
		@csrf
		<label>Project Title: <br>
			<input type="text" name="title">
		</label>
		<br>
		<label>Project URL: <br>
			<input type="text" name="url">
		</label><br>
		<label>Project Description: <br>
			<textarea name="description"></textarea>
		</label>
		<br>
		<button>Submit</button>
	</form>
	<a href="{{ route('projects.index') }}"><button>Back</button></a>
@endsection