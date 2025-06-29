@extends('layouts.app')
@section('title','Editar cliente')

@section('content')
<div class="d-flex justify-content-center">
    <div class="card shadow p-4 w-100" style="max-width:900px;">
        <h1 class="mb-4">Editar cliente</h1>

        <form action="/cliente/update" method="POST" class="row g-3">
            @csrf
            @method('PATCH')
            {{-- necesitas enviar el id al PATCH --}}
            <input type="hidden" name="id_clientes" value="{{ $cliente->id_clientes }}">

            {{-- Nombre y apellido --}}
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre *</label>
                <input type="text" id="nombre" name="nombre" class="form-control"
                       value="{{ old('nombre', $cliente->nombre) }}">
                @error('nombre') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6">
                <label for="apellido" class="form-label">Apellido *</label>
                <input type="text" id="apellido" name="apellido" class="form-control"
                       value="{{ old('apellido', $cliente->apellido) }}">
                @error('apellido') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            {{-- DNI y fecha de nacimiento --}}
            <div class="col-md-4">
                <label for="dni" class="form-label">DNI *</label>
                <input type="text" id="dni" name="dni" class="form-control"
                       value="{{ old('dni', $cliente->dni) }}">
                @error('dni') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-4">
                <label for="fechanacimiento" class="form-label">Fecha de nacimiento</label>
                <input type="date" id="fechanacimiento" name="fechanacimiento" class="form-control"
                       value="{{ old('fechanacimiento', $cliente->fechanacimiento) }}">
                @error('fechanacimiento') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            {{-- Provincia --}}
            <div class="col-md-4">
                <label for="rela_provincia" class="form-label">Provincia</label>
                <select id="rela_provincia" name="rela_provincia" class="form-select">
                    <option value="">-- Seleccione --</option>
                    @foreach($provincias as $prov)
                        <option value="{{ $prov->id_provincia }}"
                            @selected(old('rela_provincia', $cliente->rela_provincia) == $prov->id_provincia)>
                            {{ $prov->descripcion }}
                        </option>
                    @endforeach
                </select>
                @error('rela_provincia') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            {{-- Localidad y dirección --}}
            <div class="col-md-6">
                <label for="localidad" class="form-label">Localidad</label>
                <input type="text" id="localidad" name="localidad" class="form-control"
                       value="{{ old('localidad', $cliente->localidad) }}">
                @error('localidad') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" id="direccion" name="direccion" class="form-control"
                       value="{{ old('direccion', $cliente->direccion) }}">
                @error('direccion') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            {{-- CUIT, email, teléfono --}}
            <div class="col-md-4">
                <label for="cuit" class="form-label">CUIT</label>
                <input type="text" id="cuit" name="cuit" class="form-control"
                       value="{{ old('cuit', $cliente->cuit) }}">
                @error('cuit') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-4">
                <label for="email" class="form-label">E‑mail</label>
                <input type="email" id="email" name="email" class="form-control"
                       value="{{ old('email', $cliente->email) }}">
                @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-4">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" id="telefono" name="telefono" class="form-control"
                       value="{{ old('telefono', $cliente->telefono) }}">
                @error('telefono') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            {{-- Condición IVA --}}
            <div class="col-md-6">
                <label for="rela_condicioniva" class="form-label">Condición IVA</label>
                <select id="rela_condicioniva" name="rela_condicioniva" class="form-select">
                    <option value="">-- Seleccione --</option>
                    @foreach($condiciones as $cond)
                        <option value="{{ $cond->id_condicioniva }}"
                            @selected(old('rela_condicioniva', $cliente->rela_condicioniva) == $cond->id_condicioniva)>
                            {{ $cond->descripcion }}
                        </option>
                    @endforeach
                </select>
                @error('rela_condicioniva') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            {{-- Botones --}}
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="/clientes" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
