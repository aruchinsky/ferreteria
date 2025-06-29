@extends('layouts.app')
@section('title','Editar proveedor')

@section('content')
<div class="d-flex justify-content-center">
    <div class="card shadow p-4 w-100" style="max-width:900px;">
        <h1 class="mb-4">Editar proveedor</h1>
        <form action="/proveedores/update" method="POST" class="row g-3">
            @csrf
            @method('PATCH')
            <input type="hidden" name="id_proveedores" value="{{ $proveedor->id_proveedores }}">
            <div class="col-md-6">
                <label for="razon_social" class="form-label">Razón social *</label>
                <input type="text" name="razon_social" id="razon_social" class="form-control"
                       value="{{ old('razon_social', $proveedor->razon_social) }}">
                @error('razon_social') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6">
                <label for="cuit" class="form-label">CUIT *</label>
                <input type="text" name="cuit" id="cuit" class="form-control"
                       value="{{ old('cuit', $proveedor->cuit) }}">
                @error('cuit') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6">
                <label for="persona_contacto" class="form-label">Persona de contacto *</label>
                <input type="text" name="persona_contacto" id="persona_contacto" class="form-control"
                       value="{{ old('persona_contacto', $proveedor->persona_contacto) }}">
                @error('persona_contacto') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6">
                <label for="telefono_contacto" class="form-label">Teléfono de contacto *</label>
                <input type="text" name="telefono_contacto" id="telefono_contacto" class="form-control"
                       value="{{ old('telefono_contacto', $proveedor->telefono_contacto) }}">
                @error('telefono_contacto') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6">
                <label for="rela_condicioniva" class="form-label">Condición IVA *</label>
                <select name="rela_condicioniva" id="rela_condicioniva" class="form-select">
                    <option value="">-- Seleccione --</option>
                    @foreach($condiciones as $cond)
                        <option value="{{ $cond->id_condicioniva }}"
                            @selected(old('rela_condicioniva', $proveedor->rela_condicioniva) == $cond->id_condicioniva)>
                            {{ $cond->descripcion }}
                        </option>
                    @endforeach
                </select>
                @error('rela_condicioniva') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="/proveedores" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
