	@csrf
	<label>Project Title: <br>
		<input type="text" name="title" value="{{ old('title', $project->title) }}">
	</label>
	<br>
	<label>Project URL: <br>
		<input type="text" name="url" value="{{ old('url', $project->url) }}">
	</label><br>
	<label>Project Description: <br>
		<textarea name="description">{{ old('description', $project->description) }}</textarea>
	</label>
	<br>
	<button>{{ $btnText }}</button>