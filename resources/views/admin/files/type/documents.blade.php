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
							@foreach($documents as $document)
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
										<form action="{{ route('file.destroy', $document->id )}}" method="POST">
											@csrf
											<input type="hidden" name="_method" value="PATCH">
											<button class="btn btn-danger pull-right" type="submit"><i class="fas fa-trash"></i>Eliminar</button>
										</form>
									</th>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
		</div>
	</div>
@endsection