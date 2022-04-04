@extends('layout')

@section('title','New Project')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12 col-sm-10 col-lg-6 mx-auto">
			<h1 class="display-4">New Project</h1>
			<hr>

			@include('partials.validation-errors')

			<form class="bg-white py-3 px-4 shadow rounded" 
			method="POST" 
			enctype="multipart/form-data" 
			action="{{ route('projects.store') }}">

				@include('projects._form', ['btnText' => 'Submit'])

			</form>
			<a class="btn btn-primary" href="{{ route('projects.index') }}">Back</a>
		</div>
	</div>
</div>
@endsection