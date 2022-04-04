@extends('layout')

@section('title','Portfolio')

@section('content')
<div class="container">

	@isset($category)
		<div>
			<h1 class="display-4 mb-0">{{ $category->name }}</h1>
			<a href="{{ route('projects.index') }}">Back to projects list</a>
		</div>
	@else
		<h1 class="display-4 mb-0">Portfolio</h1>
	@endisset
	@can('create', $newProject)
		<a class="btn btn-primary"
			href="{{ route('projects.create') }}">Create new project
		</a>
	@endcan

	<hr>
	<div class="d-flex flex-wrap justify-content-between align-items-start">
		@forelse($projects as $project)
			<div class="card border-0 shadow-sm mt-4 mx-auto" style="width: 18rem;">
				@if ($project->image)
					<img class="card-img-top" style="height: 150px; object-fit: cover" src="/storage/{{ $project->image }}" alt="{{ $project->title }}">
				@endif
				<div class="card-body">
					<h5 class="card-title">
						<a href="{{ route('projects.show', $project) }}">{{ $project->title }}</a>
					</h5>
					<h6 class="card-subtitle">{{ $project->created_at->format('d/m/Y') }}</h6>
					<p class="card-text text-truncate">{{ $project->description }}</p>
					<div class="d-flex justify-content-between align-items-center">
						<a href="{{ route('projects.show', $project) }}" class="btn btn-primary">More</a>
						@if ($project->category_id)
							<a href="{{ route('categories.show', $project->category) }}"
								class="badge badge-secondary btn-secondary">{{ $project->category->name }}</a>
						@endif
					</div>
				</div>
			</div>
		@empty
			<li class="list-group-item border-0 mb-3 shadow-sm">
				No hay proyectos
			</li>
		@endforelse
	</div>
	@can('view-deleted-projects')
		<h4>Deleted Projects</h4>
		<ul class="list-group">
			@foreach($deletedProjects as $deletedProject)
				<li class="list-group-item">
					{{ $deletedProject->title }}
					@can('restore', $deletedProject)
						<form method="POST" action="{{ route('projects.restore', $deletedProject) }}" class="d-inline">
							@csrf @method('PATCH')
							<button class="btn btn-sm btn-info">Restore</button>
						</form>
					@endcan
					@can('forceDelete', $deletedProject)
						<form method="POST"
							onsubmit="return confirm('This action cannot be undone, proceed?')"
							action="{{ route('projects.forceDelete', $deletedProject) }}"
							class="d-inline">
							@csrf @method('DELETE')
							<button class="btn btn-sm btn-danger">Delete Permanently</button>
						</form>
					@endcan
				</li>
			@endforeach
		</ul>
	@endcan
</div>
@endsection