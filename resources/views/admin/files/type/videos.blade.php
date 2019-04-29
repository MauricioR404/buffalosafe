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
							@foreach($videos as $video)
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
										<form action="{{ route('file.destroy', $video->id )}}" method="POST">
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