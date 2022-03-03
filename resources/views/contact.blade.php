@extends('layout')

@section('title','Contact')

@section('content')

	<h1>{{__('Contact')}}</h1>
	<form method="post" action="{{ route('messages.store')}}">
		@csrf
		<input placeholder="Name" name="name" value="{{ old('name') }}"><br>
		{!! $errors->first('name', '<small>:message</small><br>') !!}

		<input type="text" name="email" placeholder="e-mail" value="{{ old('email') }}"><br>
		{!! $errors->first('email', '<small>:message</small><br>') !!}

		<input name="subject" placeholder="subject" value="{{ old('subject') }}"><br>
		{!! $errors->first('subject', '<small>:message</small><br>') !!}

		<textarea name="content" placeholder="message">{{ old('content') }}</textarea><br>
		{!! $errors->first('content', '<small>:message</small><br>') !!}

		<button>@lang('Send')</button>
	</form>
@endsection