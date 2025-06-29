@extends('layouts.app')
@section('title','Alta de Cliente')

@section('content')
<h1 class="mb-4">Nuevo cliente</h1>
<div class="card shadow-sm mx-auto" style="max-width: 900px;">
  <div class="card-body">
    <form action="/cliente/store" method="POST" class="row g-3">
        @csrf

        {{-- Nombre y apellido --}}
        <div class="col-md-6">
            <label for="nombre" class="form-label">Nombre *</label>
            <input type="text" name="nombre" id="nombre" class="form-control"
                   value="{{ old('nombre') }}">
            @error('nombre') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-6">
            <label for="apellido" class="form-label">Apellido *</label>
            <input type="text" name="apellido" id="apellido" class="form-control"
                   value="{{ old('apellido') }}">
            @error('apellido') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        {{-- DNI y fecha de nacimiento --}}
        <div class="col-md-4">
            <label for="dni" class="form-label">DNI *</label>
            <input type="text" name="dni" id="dni" class="form-control"
                   value="{{ old('dni') }}">
            @error('dni') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-4">
            <label for="fechanacimiento" class="form-label">Fecha de nacimiento</label>
            <input type="date" name="fechanacimiento" id="fechanacimiento" class="form-control"
                   value="{{ old('fechanacimiento') }}">
            @error('fechanacimiento') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        {{-- Provincia (select dinámico) --}}
        <div class="col-md-4">
            <label for="rela_provincia" class="form-label">Provincia</label>
            <select name="rela_provincia" id="rela_provincia" class="form-select">
                <option value="">-- Seleccione --</option>
                @foreach($provincias as $prov)
                    <option value="{{ $prov->id_provincia }}"
                        @selected(old('rela_provincia') == $prov->id_provincia)>
                        {{ $prov->descripcion }}
                    </option>
                @endforeach
            </select>
            @error('rela_provincia') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        {{-- Localidad y dirección --}}
        <div class="col-md-6">
            <label for="localidad" class="form-label">Localidad</label>
            <input type="text" name="localidad" id="localidad" class="form-control"
                   value="{{ old('localidad') }}">
            @error('localidad') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-6">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" name="direccion" id="direccion" class="form-control"
                   value="{{ old('direccion') }}">
            @error('direccion') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        {{-- CUIT, e-mail, teléfono --}}
        <div class="col-md-4">
            <label for="cuit" class="form-label">CUIT</label>
            <input type="text" name="cuit" id="cuit" class="form-control"
                   value="{{ old('cuit') }}">
            @error('cuit') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-4">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" id="email" class="form-control"
                   value="{{ old('email') }}">
            @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-4">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" name="telefono" id="telefono" class="form-control"
                   value="{{ old('telefono') }}">
            @error('telefono') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        {{-- Condición IVA (select dinámico) --}}
        <div class="col-md-6">
            <label for="rela_condicioniva" class="form-label">Condición IVA</label>
            <select name="rela_condicioniva" id="rela_condicioniva" class="form-select">
                <option value="">-- Seleccione --</option>
                @foreach($condiciones as $cond)
                    <option value="{{ $cond->id_condicioniva }}"
                        @selected(old('rela_condicioniva') == $cond->id_condicioniva)>
                        {{ $cond->descripcion }}
                    </option>
                @endforeach
            </select>
            @error('rela_condicioniva') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        {{-- Botones --}}
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="/clientes" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
  </div>
</div>
@endsection
