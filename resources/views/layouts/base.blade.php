<html>
<head>
	<link rel="stylesheet" href="{{url('/assets/bootstrap/css/bootstrap.css')}}" />
	<script lang="javascript" src="{{ url('/assets/bootstrap/js/bootstrap.min.js') }}"></script>
</head>

<body>
	@include('navbar')

	<div class="contingut">
		@yield('contingut')
	</div>
</body>

</html>
