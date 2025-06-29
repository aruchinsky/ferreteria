@extends('layouts.app')
@section('title','Alta de Proveedor')

@section('content')
<h1 class="mb-4">Nuevo proveedor</h1>
<div class="card shadow-sm mx-auto" style="max-width: 900px;">
  <div class="card-body">
    <form action="/proveedores/store" method="POST" class="row g-3">
        @csrf
        <div class="col-md-6">
            <label for="razon_social" class="form-label">Razón social *</label>
            <input type="text" name="razon_social" id="razon_social" class="form-control" value="{{ old('razon_social') }}">
            @error('razon_social') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-6">
            <label for="cuit" class="form-label">CUIT *</label>
            <input type="text" name="cuit" id="cuit" class="form-control" value="{{ old('cuit') }}">
            @error('cuit') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-6">
            <label for="persona_contacto" class="form-label">Persona de contacto *</label>
            <input type="text" name="persona_contacto" id="persona_contacto" class="form-control" value="{{ old('persona_contacto') }}">
            @error('persona_contacto') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-6">
            <label for="telefono_contacto" class="form-label">Teléfono de contacto *</label>
            <input type="text" name="telefono_contacto" id="telefono_contacto" class="form-control" value="{{ old('telefono_contacto') }}">
            @error('telefono_contacto') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-6">
            <label for="rela_condicioniva" class="form-label">Condición IVA *</label>
            <select name="rela_condicioniva" id="rela_condicioniva" class="form-select">
                <option value="">-- Seleccione --</option>
                @foreach($condiciones as $cond)
                    <option value="{{ $cond->id_condicioniva }}" @selected(old('rela_condicioniva') == $cond->id_condicioniva)>
                        {{ $cond->descripcion }}
                    </option>
                @endforeach
            </select>
            @error('rela_condicioniva') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="/proveedores" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
  </div>
</div>
@endsection
