@extends('layouts.base')


@section('contingut')

<h1>Llistes disponibles</h1>

<h2>Cerca la teva llista</h2>
<form method="post">
	<input type="text" name="cercatext" placeholder="la party més boja del mon..." />
	<input type="submit" value="Cerca!..." name="cerca" />
</form>

<h2>...o bé mira les llistes fetes...</h2>

<ul>
	<li>una</li>
	<li>dos</li>
	<li>...</li>
</ul>

@endsection
