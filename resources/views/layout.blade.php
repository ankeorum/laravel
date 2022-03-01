<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>
	<style type="text/css">
		.active a {
			color: red;
			text-decoration: none;
		}
	</style>
</head>
<body>
	@include('partials.nav')
	@yield('content')
</body>
</html>