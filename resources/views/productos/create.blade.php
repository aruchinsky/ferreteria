@extends('layouts.app')
@section('title','Alta de Producto')

@section('content')
<h1 class="mb-4">Nuevo producto</h1>
<div class="card shadow-sm mx-auto" style="max-width: 700px;">
  <div class="card-body">
    <form action="/productos/store" method="POST" class="row g-3">
        @csrf
        <div class="col-md-8">
            <label for="descripcion" class="form-label">Descripción *</label>
            <input type="text" name="descripcion" id="descripcion" class="form-control" maxlength="250" value="{{ old('descripcion') }}">
            @error('descripcion') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-4">
            <label for="cantidad_actual" class="form-label">Cantidad actual *</label>
            <input type="number" name="cantidad_actual" id="cantidad_actual" class="form-control" min="0" value="{{ old('cantidad_actual') }}">
            @error('cantidad_actual') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-6">
            <label for="rela_marcas" class="form-label">Marca *</label>
            <select name="rela_marcas" id="rela_marcas" class="form-select">
                <option value="">-- Seleccione --</option>
                @foreach($marcas as $m)
                    <option value="{{ $m->id_marcas }}" @selected(old('rela_marcas') == $m->id_marcas)>{{ $m->marcas_descripcion }}</option>
                @endforeach
            </select>
            @error('rela_marcas') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>
            {{-- Medida --}}
            <div class="col-md-4">
                <label for="rela_medidas" class="form-label">Medida *</label>
                <select id="rela_medidas" name="rela_medidas" class="form-select">
                    <option value="">-- Seleccione --</option>
                    @foreach($medidas as $medida)
                        <option value="{{ $medida->id_medida }}" @selected(old('rela_medidas') == $medida->id_medida)>
                            {{ $medida->abreviatura }} - {{ $medida->descripcion }}
                        </option>
                    @endforeach
                </select>
                @error('rela_medidas') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>
        <div class="col-md-6">
            <label for="precio_compra" class="form-label">Precio compra *</label>
            <input type="number" step="0.01" min="0" name="precio_compra" id="precio_compra" class="form-control" value="{{ old('precio_compra') }}">
            @error('precio_compra') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-6">
            <label for="porcentaje_utilidad" class="form-label">% Utilidad *</label>
            <input type="number" step="0.01" min="0" max="100" name="porcentaje_utilidad" id="porcentaje_utilidad" class="form-control" value="{{ old('porcentaje_utilidad') }}">
            @error('porcentaje_utilidad') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-6">
            <label for="rela_proveedor" class="form-label">Proveedor *</label>
            <select name="rela_proveedor" id="rela_proveedor" class="form-select">
                <option value="">-- Seleccione --</option>
                @foreach($proveedores as $prov)
                    <option value="{{ $prov->id_proveedores }}" @selected(old('rela_proveedor') == $prov->id_proveedores)>{{ $prov->razon_social }}</option>
                @endforeach
            </select>
            @error('rela_proveedor') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-6">
            <label for="cantidad_minima" class="form-label">Cantidad mínima *</label>
            <input type="number" min="0" name="cantidad_minima" id="cantidad_minima" class="form-control" value="{{ old('cantidad_minima') }}">
            @error('cantidad_minima') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="activo" name="activo" value="1" {{ old('activo', 1) ? 'checked' : '' }}>
                <label class="form-check-label" for="activo">Activo</label>
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="/productos" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
  </div>
</div>
@endsection
