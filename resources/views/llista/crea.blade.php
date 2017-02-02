@extends('layouts.base')


@section('contingut')

<h1>Nova llista de Karaoke</h1>

<p>Crea la teva llista perquè els amics puguin afegir temes per cantar a la superparty!</p> 

<form method="post">
	{{ csrf_field() }}

	Titol:<input type="text" name="titol" placeholder="El nom de la festa..." />
	<br>
	Lloc:<input type="text" name="lloc" placeholder="Ubicació de la festa..." />
	<br>
	Organitzador:<input type="text" name="organitzador" placeholder="El teu nom" />
	<br>
	Email:<input type="email" name="email" placeholder="El teu correu" />
	<br>
	Confirma email:<input type="email" name="email2" placeholder="Repeteix el teu correu" />
	<br>
	Comentaris:
	<textarea name="comentaris" placeholder="Explica'ns alguna cosa">
	</textarea>
	<br>
	<input type="submit" name="submit" value="Envia">
</form>

@endsection
