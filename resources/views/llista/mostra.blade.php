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
				<!--div style="position:relative;height:0;padding-bottom:75.0%"><iframe src="{{$tema->embedurl()}}" width="480" height="360" frameborder="0" style="position:absolute;width:100%;height:100%;left:0" allowfullscreen></iframe></div-->
			@endif
		</li>
	@endforeach
</ul>

@if( ! $admin )
<h2>Temes fets. Vota'ls!!</h2>

<script>
	// ens apuntem els temes fets per després actualitzar el nº de vots
	var temes = Array();
</script>
<ul class="list-group">
	@foreach ($fets as $tema)
		<li class="list-group-item" style="visible">
			<b>{{$tema->tema}}</b> a càrrec de {{$tema->cantants}}
			<button class="btn btn-primary" onclick="likeIt(this,{{$tema->id}});"><span class="glyphicon glyphicon-thumbs-up"></span> M'agrada</button>
			<span>Total vots: <span id="vots{{$tema->id}}"></span></span>
		</li>
		<script>
			// afegim a la llista
			temes.push({{$tema->id}});
		</script>
	@endforeach
</ul>
@endif
<script>
	var likeIt = function(elem,id){
		console.log("vota "+id);
		$.get('/api/vota/'+id, function(data) {
			console.log(data);
			if(data.status === "OK" ) {
				if(data.vot == true )
					elem.className = "btn btn-success";
				else
					elem.className = "btn btn-primary";
				//console.log(data.nvots);
				$("#vots"+id).html(data.nvots);
			} // status OK
		}); // end get
		return false;
	};
	var temaFet = function(id){
		$.get('/api/fet/'+id, function( data ) {
			console.log(data);
			if(data.status === 'OK') $('#tema'+id).slideUp();
		});
	};

	// actualitzem la llista (es crida al final de la carrega de la pagina)
	for( i in temes ) {
		$.get('/api/nvots/'+temes[i], function(data) {
			console.log(data);
			$('#vots'+data.tema_id).html(data.nvots);
		});
	}
</script>

@endsection

