@extends('layouts.base')


@section('contingut')

<h1>Nova llista de Karaoke</h1>

<p>Crea la teva llista perquè els amics puguin afegir temes per cantar a la superparty!</p> 

<form method="post">
	{{ csrf_field() }}

	Cantants:<input type="text" name="cantants" placeholder="Els cantants que van a triomfar" />
	<br>
	Tema:<input type="text" name="tema" placeholder="Títol del vostre tema" />
	<br>
	Vídeo:<input type="url" name="video" placeholder="Link al vídeo de Youtube o Vimeo" />
	<br>
	Comentaris:
	<textarea name="comentaris" placeholder="Explica'ns alguna cosa"></textarea>
	<br>
	<input type="submit" name="submit" value="Envia">
</form>

@endsection
