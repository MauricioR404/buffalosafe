@extends('admin.layouts.app')

@section('page', 'Videos')

@section('content')

	<div class="container">
		<div class="row">
				<div class="col-sm-12 table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th scope="col"></th>
								<th scope="col">Nombre</th>
								<th scope="col">Ver</th>
								<th scope="col">Accion</th>
							</tr>
						</thead>
						<tbody>
							@forelse($videos as $video)
								<tr>
									<th scope="row">
										@if($video->extension == 'mp4' || $video->extension == 'MP4')
											<img class="img-fluid" src="{{asset('img/files/mp4.svg')}}" style="width:40px;">
										@endif
										@if($video->extension == 'avi' || $video->extension == 'AVI')
											<img class="img-fluid" src="{{asset('img/files/avi.svg')}}" style="width:40px;">
										@endif
										@if($video->extension == 'mpeg' || $video->extension == 'MPEG')
											<img class="img-fluid" src="{{asset('img/files/mpeg.svg')}}" style="width:40px;">
										@endif
									</th>
									<th scope="row">{{ $video->name }}</th>
									<th scope="row">{{ $video->created_at->DiffForHumans() }}</th>
									<th scope="row">
										<a href="{{ asset('storage') }}/{{ $folder }}/video/{{ $video->name }}.{{$video->extension}}" class="btn btn-primary" target="_blank"><i class="fas fa-eye"></i>Ver</a>
									</th>
									<th class="row">
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
										        <form action="{{ route('file.destroy', $video->id )}}" method="POST">
													@csrf
													<input type="hidden" name="_method" value="PATCH">
													<button class="btn btn-danger pull-right" type="submit"><i class="fas fa-trash"></i>Eliminar</button>
												</form>
										      </div>
										    </div>
										  </div>
										</div>
									</th>
								</tr>

							@empty
								<div class="container">
							        <div class="alert alert-warning mb-5" role="alert">
							            <span class="closebtn" onclick="this.parentElement.style.display='none';">X</span>
							            <strong>¡Antencion!</strong> No tienes videos
							        </div>
							    </div>
							@endforelse
						</tbody>
					</table>
				</div>
		</div>
	</div>
@endsection