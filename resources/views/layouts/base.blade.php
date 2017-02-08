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
	<script
				  src="https://code.jquery.com/jquery-3.1.1.slim.min.js"
				  integrity="sha256-/SIrNqv8h6QGKDuNoLGA4iret+kyesCkHGzVUUV0shc="
				  crossorigin="anonymous"></script>
	<script lang="javascript" src="{{ url('/assets/bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>
