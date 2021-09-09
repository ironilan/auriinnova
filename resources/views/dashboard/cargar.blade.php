@extends('layouts.dashboard')

@section('contenido')

<section class="container p-4">
	<div class="row">
		<h2>Cargar archivo excel</h2>
		<form action="{{ route('cargar.import_productos') }}" method="post" enctype="multipart/form-data">
			@csrf
			@if (Session::has('message'))
			<div class="alert alert-success">
				<p class="m-0 p-0">{{Session::get('message')}}</p>
			</div>
			@endif
			<div class="form-group mb-4">
				
				<input type="file" name="file" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Cargar</button>
		</form>
	</div>
</section>
@endsection