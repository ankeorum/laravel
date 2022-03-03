<nav>
	<ul>
		<li class="{{ setActive('home') }}"><a href="/">@lang('Home')</a></li>
		<li class="{{ setActive('about') }}"><a href="/about">@lang('About')</a></li>
		<li class="{{ setActive('projects.*') }}"><a href="/portfolio">@lang('Projects')</a></li>
		<li class="{{ setActive('contact') }}"><a href="/contact">@lang('Contact')</a></li>
	</ul>
</nav>