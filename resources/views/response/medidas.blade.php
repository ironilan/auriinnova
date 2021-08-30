
<div class="app_flex ">
	@if (count($medidas) > 0)
	@foreach ($medidas as $medida)
	<button class="btn btn-outline btn-block btn_medida btn-sm mr-2" onclick="getProductosMedida({{$medida->id}}, {{$idsub}})">{{$medida->titulo}}</button>
	@endforeach
	@else
	<button class="btn btn-outline btn-block btn-sm mr-2">No se encontraron medidas...</button>
	@endif
</div>
