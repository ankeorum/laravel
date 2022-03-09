@extends('layout')

@section('title','Contact')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12 col-sm-10 col-lg-6 mx-auto">

			<form class="bg-white shadow rounded py-3 px-4" method="post" action="{{ route('messages.store')}}">
				@csrf
				<h1 class="display-4">{{__('Contact')}}</h1>
				<div class="form-group">
					<label for="name">Name</label>
					<input class="form-control bg-light shadow-sm @error('name') is-invalid @else border-0 @enderror"
						id="name"
						placeholder="Name"
						name="name"
						value="{{ old('name') }}">
						@error('name')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
				</div>
				<div class="form-group">
					<label for="email">E-mail</label>
					<input class="form-control bg-light shadow-sm @error('email') is-invalid @else border-0 @enderror"
						id="email"
						placeholder="e-mail"
						name="email"
						value="{{ old('email') }}">
						@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
				</div>
				<div class="form-group">
					<label for="subject">Subject</label>
					<input class="form-control bg-light shadow-sm @error('subject') is-invalid @else border-0 @enderror"
						id="subject"
						placeholder="Subject"
						name="subject"
						value="{{ old('subject') }}">
						@error('subject')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
				</div>
				<div class="form-group">
					<label for="message">Message</label>
					<textarea class="form-control bg-light shadow-sm @error('message') is-invalid @else border-0 @enderror"
						id="message"
						placeholder="Message"
						name="message">
						{{ old('message') }}</textarea>
						@error('message')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
				</div>

				<button class="btn btn-primary btn-lg btn-block">@lang('Send')</button>
			</form>

		</div>
	</div>
</div>
@endsection