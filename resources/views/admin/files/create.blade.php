@extends('admin.layouts.app')

@section('page', 'Agregar Archivo')

@section('content')

	<div>
		<div class="row justify-content-center align-items-center">
			<form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="file">
						Seleccione un archivo para subirlo <br>
					</label>
				</div>
				<div class="form-group">
					<input type="file" class="form-control-file" name="file" required="">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary file">Subir Archivo</button>
				</div>
			</form>
		</div>
	</div>
@endsection