@extends('layouts.base')


@section('contingut')

<h1>Karaoke Party</h1>

<p>Crea les teves llistes de temes de Karaoke per a cantar i votar pel públic.</p>

<button class="btn primary" onclick="location.href='{{url('llista/crea')}}'">Crea nova llista</button>

<button class="btn primary" onclick="location.href='{{url('llista')}}'">Tafaneja les llistes existents</button>

<p>Cerca la llista de la teva festa:</p>

<form action="">
	<label for="titol">Títol</label>
	<input name="titol" type="text" />
	<p>o bé</p>
	<label for="codi">Codi</label>
	<input name="codi" type="text" />
	<br>
	<input type="submit" value="Cerca" />

</form>

@endsection
