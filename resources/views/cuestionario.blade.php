@extends('my_templates/template')
@section('title') ENCUESTA - UNERG @endsection
@section('footer') Direccion de Informatica - UNERG @endsection

@section('content') 
<div class="col-md-12">
	<div class="row">
		<span class="col-md-2"></span>
		<div class="col-md-8">
			@if(count($preguntas)>0)
			<form action="{{route('storeAnswer')}}" method="post">
				@foreach($preguntas as $pregunta)
					@if($pregunta->answer && $pregunta->answer->user_id == Auth::user()->id)
					<?php #@if($pregunta->answer->user_id == Auth::user()->id) ?>
						.
					@else
					<div id="pregunta">
						<h2 align="center">{{$pregunta->question}}</h2>
						<small class="pull-right label label-info" style="text-align:center;">{{$pregunta->created_at->diffForHumans()}}</small>
						@csrf
						<input type="hidden" name="status[]" value="resp">
						<input type="hidden" name="user_id[]" value="{{Auth::user()->id}}">
						<input type="hidden" name="area_id[]" value="{{Auth::user()->person->area->id}}">
						<input type="hidden" name="poll_id[]" value="{{$pregunta->id}}">

						<div class="form-group">
							@if($pregunta->type == 'radio')
							<select name="radios[]" class="form-control">
								<option value="1">Si</option>
								<option value="0">No</option>
							</select>
							<input type="hidden" name="respuesta[]" value="null">
							@endif
						</div>
						<div class="form-group">
							@if($pregunta->type == 'text')
							<input type="hidden" name="radios[]" value="2">
							<textarea required type="text" class="form-control" id="respuesta" name="respuesta[]" placeholder="Escribe aqui tu respuesta aqui..."></textarea>
							@endif
						</div>
					</div>
					@endif
				@endforeach
					<input class="btn btn-success form-control" id="enviar" name="enviar" type="submit" value="Enviar">
			</form>
			@else
			<center><span class="h1">No hay preguntas!</span></center>
			@endif
		</div>
		<span class="col-md-2"></span>
	</div>
</div>
@endsection
