<nav class="navbar navbar-light bg-white navbar-expand-lg shadow-sm">
	<div class="container">
		<a class="navbar-brand" href="{{ route('home') }}">
			{{ config('app.name') }}
		</a>
		<button class="navbar-toggler" type="button"
		data-bs-toggle="collapse"
		data-bs-target="#navbarSupportedContent"
		aria-controls="navbarSupportedContent"
		aria-expanded="false"
		aria-label="{{ __('Toggle navigation') }}">
	        <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	                    <!-- Left Side Of Navbar -->
	        <ul class="navbar-nav me-auto">

	        </ul>

	        <!-- Right Side Of Navbar -->
	        <ul class="navbar-nav ms-auto">
	            <!-- Authentication Links -->

	        </ul>

			<ul class="nav nav-pills">
				<li class="nav-item"><a class="nav-link {{ setActive('home') }}" href="/">@lang('Home')</a></li>
				<li class="nav-item"><a class="nav-link {{ setActive('about') }}" href="/about">@lang('About')</a></li>
				<li class="nav-item"><a class="nav-link {{ setActive('projects.*') }}" href="/portfolio">@lang('Projects')</a></li>
				<li class="nav-item"><a class="nav-link {{ setActive('contact') }}" href="/contact">@lang('Contact')</a></li>
				@guest
				<li class="nav-item"><a class="nav-link {{ setActive('login')}}" href="{{ route('login') }}">@lang('Login')</a></li>
				@else
					<li><a class="nav-link" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a></li>
				@endguest
			</ul>
		</div>
	</div>
</nav>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>