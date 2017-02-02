@extends('layouts.base')


@section('contingut')

<h2>Cerca la teva llista</h2>
<form action="/cerca" method="post">
	{{ csrf_field() }}
	@if( isset($cercatext) )
		<input type="text" name="cercatext" placeholder="la party més boja del mon..." value="{{$cercatext}}"/>
	@else
		<input type="text" name="cercatext" placeholder="la party més boja del mon..." />
	@endif
	<input type="submit" value="Cerca!..." name="cerca" />
</form>

<h2>Resultats de la cerca:</h2>

<ul>
@foreach ( $llistes as $llista )
	<li><a href="{{url('/llista')}}/{{$llista->id}}">{{$llista->titol}} (Organtiza: {{$llista->organitzador}})</li>
@endforeach
</ul>

@endsection
