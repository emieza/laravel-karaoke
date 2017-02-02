@extends('layouts.base')


@section('contingut')

<h1>Totes les llistes</h1>

<ul>
@foreach ( $llistes as $llista )
	<li><a href="{{url('/llista')}}/{{$llista->id}}">{{$llista->titol}} ({{$llista->organitzador}}</li>
@endforeach
</ul>

@endsection
