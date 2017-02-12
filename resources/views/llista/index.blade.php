@extends('layouts.base')


@section('contingut')

@if( Auth::check() && isset($mylists) )
<h2>Les meves llistes</h2>
<ul class="list-group">
@foreach ( $mylists as $llista )
	<li class="list-group-item"><a href="{{url('/llista')}}/{{$llista->id}}">{{$llista->titol}} (Lloc: {{$llista->lloc}} , Organtiza: {{$llista->organitzador}})</a></li>
@endforeach
</ul>
@endif

<h2>Cerca una llista</h2>
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

<ul class="list-group">
@foreach ( $llistes as $llista )
	<li class="list-group-item"><a href="{{url('/llista')}}/{{$llista->id}}">{{$llista->titol}} (Organtiza: {{$llista->organitzador}})</a></li>
@endforeach
</ul>

@endsection
