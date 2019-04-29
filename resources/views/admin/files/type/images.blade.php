@extends('admin.layouts.app')

@section('page', 'Imágenes')

@section('content')

	<div class="container">
		<div class="row">
			@forelse($images as $image)
				<div class="col-sm-6 col-md-4 pb-4">
					<div class="card" style="width: 18rem;">
						<img src="{{ asset('storage') }}/{{ $folder }}/image/{{ $image->name }}.{{ $image->extension }}" alt="{{ $image->name }}" class="card-img-top">

						<div class="card-body">
							<a href="{{ asset('storage') }}/{{ $folder }}/image/{{ $image->name }}.{{ $image->extension }}" target="_blank" class="btn btn-primary"><i class="fas fa-eye"></i>Ver</a>

							<button class="btn btn-danger pull-right" type="submit" data-toggle="modal" data-target="#deletemodal"><i class="fas fa-trash"></i>Eliminar</button>
							<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">Confirmar Eliminación</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							        ¿Estas seguro que deseas elimar este elemento?, No podras recuperarlo.
							      </div>
							      <div class="modal-footer">
							        <form action="{{ route('file.destroy', $image->id )}}" method="POST">
										@csrf
										<input type="hidden" name="_method" value="PATCH">
										<button class="btn btn-danger pull-right" type="submit"><i class="fas fa-trash"></i>Eliminar</button>
									</form>
							      </div>
							    </div>
							  </div>
							</div>

						</div>
					</div>
				</div>
			@empty
			<div class="container">
		        <div class="alert alert-warning mb-5" role="alert">
		            <span class="closebtn" onclick="this.parentElement.style.display='none';">X</span>
		            <strong>¡Antencion!</strong> No tienes imagenes
		        </div>
		    </div>
			@endforelse
		</div>
	</div>


@endsection

