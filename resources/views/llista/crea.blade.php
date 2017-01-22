@extends('layouts.base')


@section('contingut')

<h1>Llista {{$llista}}</h1>

<h2>Afegeix nou tema</h2>

<form method="post">
	Tema:<input type="text" name="tema" placeholder="Temazo que cantaràs..." />
	<br>
	Nom:<input type="text" name="nom" placeholder="El meu nom o noms dels cantants" />
	<br>
	URL:<input type="text" name="url" placeholder="Enllaç a Youtube o Vimeo" />
	<br>
	Comentaris:
	<textarea name="comentaris" placeholder="Explica'ns alguna cosa">
	</textarea>
	<br>
	<input type="submit" name="submit" value="Envia">
</form>

@endsection
