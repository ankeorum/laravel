@extends('layout')

@section('title','Home')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12 col-lg-6">
			<img class="img-fluid mb-4" src="/img/home.svg" alt="Web Development">
		</div>
		<div class="col-12 col-lg-6">
			<h1 class="display-4 text-primary">Desarrollo Web</h1>
			<p class="lead text-secondary">Test text</p>
			<a class="btn btn-large btn-block btn-primary" href="{{ route('contact') }}">Contact Us</a>
			<a class="btn btn-large btn-block btn-outline-primary" href="{{ route('projects.index') }}">Our Projects</a>
		</div>
	</div>
</div>
	
@endsection