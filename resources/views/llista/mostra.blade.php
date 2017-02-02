@extends('layouts.base')


@section('contingut')

<h1>Llista: {{$llista->titol}}</h1>
<p>Lloc: {{$llista->lloc}}</p>
<p>Organitza: {{$llista->organitzador}}</p>

<button class="btn btn-primary" onclick="location.href='{{url('/llista/')}}/{{$llista->id}}/crea'">Demana torn per cantar!</button>

<h2>Propers temes:</h2>
<ul>
	@foreach ($cua as $tema)
		<li>{{$tema->titol}}</li>
	@endforeach
</ul>

<h2>Temes fets. Vota'ls!!</h2>
<ul>
	@foreach ($fets as $tema)
		<li>{{$tema->titol}}</li>
	@endforeach
</ul>

@endsection

