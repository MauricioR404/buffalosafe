@extends('admin.layouts.app')

@section('page', 'Documentos')

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
							@forelse($documents as $document)
								<tr>
									<th scope="row">
										@if($document->extension == 'pdf' || $document->extension == 'PDF')
											<img class="img-fluid" src="{{asset('img/files/pdf.svg')}}" style="width:40px;">
										@endif
										@if($document->extension == 'docx' || $document->extension == 'DOCX')
											<img class="img-fluid" src="{{asset('img/files/word.svg')}}" style="width:40px;">
										@endif
										@if($document->extension == 'xlsx' || $document->extension == 'XLSX')
											<img class="img-fluid" src="{{asset('img/files/excel.svg')}}" style="width:40px;">
										@endif
									</th>
									<th scope="row">{{ $document->name }}</th>
									<th scope="row">{{ $document->created_at->DiffForHumans() }}</th>
									<th scope="row">
										@if($document->extension == 'pdf' || $document->extension == 'PDF')
											<a href="{{ asset('storage') }}/{{ $folder }}/document/{{ $document->name }}.{{$document->extension}}" target="_blank" class="btn btn-primary"><i class="fas fa-eye"></i>Ver</a>
										@else
											<a href="{{ asset('storage') }}/{{ $folder }}/document/{{ $document->name }}.{{$document->extension}}" target="_blank" class="btn btn-primary"><i class="fas fa-download"></i>Descargar</a>
										@endif

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
										        <form action="{{ route('file.destroy', $document->id )}}" method="POST">
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
							            <strong>¡Antencion!</strong> No tienes documentos
							        </div>
							    </div>
							@endforelse
						</tbody>
					</table>
				</div>
		</div>
	</div>
@endsection