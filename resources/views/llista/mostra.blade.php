@extends('layouts.base')


@section('contingut')

<h1>Llista: {{$llista->titol}}</h1>
<p>Lloc: {{$llista->lloc}}</p>
<p>Organitza: {{$llista->organitzador}}</p>

@if( ! $admin )
<button class="btn btn-success" onclick="location.href='{{url('/llista/')}}/{{$llista->id}}/crea'">Demana torn per cantar!</button>
@endif

<h2>Propers temes:</h2>
<ul class="list-group">
	@foreach ($cua as $tema)
		<li class="list-group-item">
			<b>{{$tema->tema}}</b> a càrrec de <b>{{$tema->cantants}}</b>
			@if( $admin )
				<button class="btn btn-warning" onclick="">Fet!</button>
			@endif
		</li>
	@endforeach
</ul>

@if( ! $admin )
<h2>Temes fets. Vota'ls!!</h2>
<ul class="list-group">
	@foreach ($fets as $tema)
		<li class="list-group-item">
			<b>{{$tema->tema}}</b> a càrrec de {{$tema->cantants}}
			<button class="btn btn-primary" onclick="">M'agrada</button>
		</li>
	@endforeach
</ul>
@endif

@endsection

