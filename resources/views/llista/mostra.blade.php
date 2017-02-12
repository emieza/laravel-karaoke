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
		<li class="list-group-item" id="tema{{$tema->id}}">
			<b>{{$tema->tema}}</b> a càrrec de <b>{{$tema->cantants}}</b>
			@if( $admin )
				<button class="btn btn-warning" onclick="temaFet({{$tema->id}})">Fet!</button>
				<br>
				<div style="position:relative;height:0;padding-bottom:75.0%"><iframe src="{{$tema->embedurl()}}" width="480" height="360" frameborder="0" style="position:absolute;width:100%;height:100%;left:0" allowfullscreen></iframe></div>
				pasted
				<div style="position:relative;height:0;padding-bottom:75.0%"><iframe src="https://www.youtube.com/embed/CdfPDKgCOcQ?ecver=2" width="480" height="360" frameborder="0" style="position:absolute;width:100%;height:100%;left:0" allowfullscreen></iframe></div>
			@endif
		</li>
	@endforeach
</ul>

@if( ! $admin )
<h2>Temes fets. Vota'ls!!</h2>
<ul class="list-group">
	@foreach ($fets as $tema)
		<li class="list-group-item" style="visible">
			<b>{{$tema->tema}}</b> a càrrec de {{$tema->cantants}}
			<button class="btn btn-primary" onclick="likeIt(this);"><span class="glyphicon glyphicon-thumbs-up"></span> M'agrada</button>
		</li>
	@endforeach
</ul>
@endif
<script>
	var likeIt = function(elem){
		var oldClassList = elem.className.split(/\s+/);
		var newClassList = '';
		for (var i = 0; i < oldClassList.length; i++) {
		    if (oldClassList[i] === 'btn-primary') { // LIKE
		    	newClassList += 'btn-success ';
		    	// TODO - Persistent like
		    } else if (oldClassList[i] === 'btn-success') { // UNLIKE
		    	newClassList += 'btn-primary ';
		    	// TODO - Persistent unlike
		    } else newClassList += oldClassList[i] + ' ';
		}
		elem.className = newClassList;
		return false;
	};
	var temaFet = function(id){
		$.get('/api/fet/'+id, function( data ) {
			console.log(data);
		  if(data === 'OK') $('#tema'+id).slideUp();
		});
	};
</script>

@endsection

