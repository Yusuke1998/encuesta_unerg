@extends('my_templates/template')
@section('title') DIRECCION DE INFORMATICA - UNERG @endsection
@section('footer') Direccion de Informatica - UNERG @endsection

@section('content') 

@guest
{{-- Formulario de acceso --}}
<div class="col-md-6">
	<div class="card-body">
	    <form method="POST" action="{{ route('login') }}">
	        @csrf
	        <div class="form-group row">
	            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Correo Electronico') }}</label>

	            <div class="col-md-6">
	                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

	                @if ($errors->has('email'))
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $errors->first('email') }}</strong>
	                    </span>
	                @endif
	            </div>
	        </div>

	        <div class="form-group row">
	            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

	            <div class="col-md-6">
	                <input id="password" type="password" class="form-control" name="password" required>
	            </div>
	        </div>

	        <div class="form-group row">
	            <div class="col-md-6 offset-md-4">
	                <div class="form-check">
	                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

	                    <label class="form-check-label" for="remember">
	                        {{ __('Recordar') }}
	                    </label>
	                </div>
	            </div>
	        </div>

	        <div class="form-group row mb-0">
	            <div class="col-md-8 offset-md-4">
	                <button type="submit" class="btn btn-primary">
	                    {{ __('Acceder') }}
	                </button>
	            </div>
	        </div>
	    </form>
	</div>
</div>

{{-- Formulario de registro --}}

<div class="col-md-6">
	<div class="card-body">
	    <form method="POST" action="{{ route('userpeople') }}">
	        @csrf

	        <div class="form-group row">
	            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombres') }}</label>

	            <div class="col-md-6">
	                <input id="name" type="text" class="form-control" name="firstname" value="{{ old('name') }}" required autofocus>
	            </div>
	        </div>
	        <div class="form-group row">
	            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

	            <div class="col-md-6">
	                <input id="name" type="text" class="form-control" name="lastname" value="{{ old('name') }}" required autofocus>
	            </div>
	        </div>

	        <div class="form-group row">
	            <label for="ci" class="col-md-4 col-form-label text-md-right">{{ __('Cedula') }}</label>

	            <div class="col-md-6">
	                <input id="ci" type="text" class="form-control" name="ci" value="{{ old('ci') }}" required>
	            </div>
	        </div>

	        <div class="form-group row">
	            <label for="telephone" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>

	            <div class="col-md-6">
	                <input id="telephone" type="text" class="form-control" name="telephone" value="{{ old('telephone') }}" required>
	            </div>
	        </div>

	        <div class="form-group row">
	            <label for="area" class="col-md-4 col-form-label text-md-right">{{ __('Area de Estudio') }}</label>
	            <div class="col-md-6">
	                <select class="form-control" name="area_id" id="area">
	                @foreach($areas as $area)
	                	<option value="{{$area->id}}">{{$area->name}}</option>
	                @endforeach
	                </select>
	            </div>
	        </div>

	        <div class="form-group row">
	            <label for="rol" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Usuario') }}</label>
	            <div class="col-md-6">
	                <select class="form-control" name="role_id" id="rol">
	                @foreach($roles as $rol)
	                	@if($rol->id == 1)
	                	@else
	                	<option value="{{$rol->id}}">{{$rol->type}}</option>
	                	@endif
	                @endforeach
	                </select>
	            </div>
	        </div>

	        <div class="form-group row">
	            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electronico') }}</label>

	            <div class="col-md-6">
	                <input id="email" type="email" class="form-control" name="mail" value="{{ old('email') }}" required>
	            </div>
	        </div>

	        <div class="form-group row">
	            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

	            <div class="col-md-6">
	                <input id="password" type="password" class="form-control" name="password" required>
	            </div>
	        </div>

	        <div class="form-group row mb-0">
	            <div class="col-md-6 offset-md-4">
	                <button type="submit" class="btn btn-primary">
	                    {{ __('Registrar') }}
	                </button>
	            </div>
	        </div>
	    </form>
	</div>
</div>
@else
<div class="col-md-12">
	<h1 align="center">DIRECCION DE INFORMATICA - UNERG</h1>
	<p align="center">Tus respuestas!</p>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th style="text-align: center; padding: 20px; background: #004; color: #fff; font-size: 20px;">Titulo</th>
				<th style="text-align: center; padding: 20px; background: #004; color: #fff; font-size: 20px;">Fecha</th>
				<th style="text-align: center; padding: 20px; background: #004; color: #fff; font-size: 20px;">Usuario</th>
			</tr>
		</thead>
		<tbody>
			<tr>
			@forelse($respuestas as $respuesta)
				<td>{{$respuesta->answer}}</td>
				<td>{{$respuesta->created_at}}</td>
				<td>{{$respuesta->user_id}}</td>
			@empty
			</tr>
		</tbody>
	</table>
				No hay respuestas!
			@endforelse
</div>
@endguest
@endsection