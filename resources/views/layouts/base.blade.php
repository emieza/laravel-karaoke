<html>
<head>
	<link rel="stylesheet" href="{{url('/assets/bootstrap/css/bootstrap.css')}}" />
</head>

<body>
	@include('navbar')
	<div class="container">
		<div class="contingut">
			@yield('contingut')
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script lang="javascript" src="{{ url('/assets/bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>
