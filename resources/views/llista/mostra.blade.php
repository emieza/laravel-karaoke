@extends('layouts.base')


@section('contingut')

<h1>Llista: {{$llista->titol}}</h1>
<p>Lloc: {{$llista->lloc}}</p>
<p>Organitza: {{$llista->organitzador}}</p>

<button class="btn btn-primary" onclick="location.href='{{url('/llista/')}}/{{$llista->id}}/crea'">Demana torn per cantar!</button>

<h2>Propers temes:</h2>
<ul>
	@foreach ($cua as $tema)
		<li><b>{{$tema->tema}}</b> a càrrec de {{$tema->cantants}}</li>
	@endforeach
</ul>

<h2>Temes fets. Vota'ls!!</h2>
<ul>
	@foreach ($fets as $tema)
		<li><b>{{$tema->tema}}</b> a càrrec de {{$tema->cantants}}</li>
	@endforeach
</ul>

@endsection

