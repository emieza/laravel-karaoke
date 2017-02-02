@extends('layouts.base')


@section('contingut')

<h1>Llista: {{$llista->titol}}</h1>
<p>Lloc: {{$llista->lloc}}</p>
<p>Organitza: {{$llista->organitzador}}</p>

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

