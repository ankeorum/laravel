@csrf
@if ($project->image)
<img class="card-img-top mb-3"
	style="height: 300px; object-fit: cover"
	src="/storage/{{ $project->image }}"
	alt="{{ $project->title }}"
>
@endif
<div class="mb-3">
  <label for="formFile" class="form-label">Upload image</label>
  <input name="image" class="form-control" type="file" id="formFile">
</div>

<div class="form-group">
	<label for="category_id">Project group</label>
	<select
		name="category_id"
		id="category_id"
		class="form-control border-0 bg-light shadow-sm"
	>
		<option value="">Select...</option>
		@foreach ($categories as $id => $name)
			<option value="{{ $id }}"
				{{ $id == old('category_id',$project->category_id) ? 'selected' : '' }}>{{ $name }}</option>
		@endforeach

	</select>
</div>

<div class="form-group">
	<label for="title">Project Title: </label>
	<input class="form-control border-0 bg-light shadow-sm"
		type="text"
		name="title"
		id="title"
		value="{{ old('title', $project->title) }}"
	>
</div>
<div class="form-group">
	<label for="url">Project URL: </label>
	<input class="form-control border-0 bg-light shadow-sm"
		type="text"
		name="url"
		id="url"
		value="{{ old('url', $project->url) }}"
	>
</div>
<div class="form-group">
	<label for="description">Project Description: </label>
	<textarea class="form-control border-0 bg-light shadow-sm"
		name="description">
		{{ old('description', $project->description) }}
	</textarea>
</div>
<button class="btn btn-primary btn-lg btn-block">{{ $btnText }}</button>
<a class="btn btn-link btn-block" href="{{ route('projects.index') }}">Back</a>