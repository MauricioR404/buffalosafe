@extends('admin.layouts.app')

@section('page', 'Audios')

@section('content')

	<div class="container">
		<div class="row">
			@forelse($audios as $audio)
				<div class="col-sm-12 col-md-4">
					<audio src="{{ asset('storage') }}/{{ $folder }}/audio/{{ $audio->name }}.{{$audio->extension}}" controls>

					</audio>

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
					        <form action="{{ route('file.destroy', $audio->id )}}" method="POST">
								@csrf
								<input type="hidden" name="_method" value="PATCH">
								<button class="btn btn-danger pull-right" type="submit"><i class="fas fa-trash"></i>Eliminar</button>
							</form>
					      </div>
					    </div>
					  </div>
					</div>
				</div>

			@empty
			<div class="container">
		        <div class="alert alert-warning mb-5" role="alert">
		            <span class="closebtn" onclick="this.parentElement.style.display='none';">X</span>
		            <strong>¡Antencion!</strong> No tienes audios
		        </div>
		    </div>
			@endforelse
		</div>
	</div>

@endsection