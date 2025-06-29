@extends('layouts.app')
@section('title','Editar producto')

@section('content')
<div class="d-flex justify-content-center">
    <div class="card shadow p-4 w-100" style="max-width:900px;">
        <h1 class="mb-4">Editar producto</h1>

        <form action="/productos/update" method="POST" class="row g-3">
            @csrf
            @method('PATCH')
            <input type="hidden" name="id_productos" value="{{ $producto->id_productos }}">

            {{-- Descripción --}}
            <div class="col-md-8">
                <label for="descripcion" class="form-label">Descripción *</label>
                <input type="text" id="descripcion" name="descripcion" class="form-control"
                       value="{{ old('descripcion', $producto->descripcion) }}">
                @error('descripcion') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            {{-- Marca --}}
            <div class="col-md-4">
                <label for="rela_marcas" class="form-label">Marca *</label>
                <select id="rela_marcas" name="rela_marcas" class="form-select">
                    <option value="">-- Seleccione --</option>
                    @foreach($marcas as $marca)
                        <option value="{{ $marca->id_marcas }}" @selected(old('rela_marcas', $producto->rela_marcas) == $marca->id_marcas)>
                            {{ $marca->marcas_descripcion }}
                        </option>
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
                        <option value="{{ $medida->id_medida }}" @selected(old('rela_medidas', $producto->rela_medidas) == $medida->id_medida)>
                            {{ $medida->abreviatura }} - {{ $medida->descripcion }}
                        </option>
                    @endforeach
                </select>
                @error('rela_medidas') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            {{-- Proveedor --}}
            <div class="col-md-4">
                <label for="rela_proveedor" class="form-label">Proveedor *</label>
                <select id="rela_proveedor" name="rela_proveedor" class="form-select">
                    <option value="">-- Seleccione --</option>
                    @foreach($proveedores as $prov)
                        <option value="{{ $prov->id_proveedores }}" @selected(old('rela_proveedor', $producto->rela_proveedor) == $prov->id_proveedores)>
                            {{ $prov->razon_social }}
                        </option>
                    @endforeach
                </select>
                @error('rela_proveedor') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            {{-- Cantidad actual --}}
            <div class="col-md-3">
                <label for="cantidad_actual" class="form-label">Cantidad actual *</label>
                <input type="number" id="cantidad_actual" name="cantidad_actual" class="form-control" min="0"
                       value="{{ old('cantidad_actual', $producto->cantidad_actual) }}">
                @error('cantidad_actual') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            {{-- Precio compra --}}
            <div class="col-md-3">
                <label for="precio_compra" class="form-label">Precio compra *</label>
                <input type="number" step="0.01" id="precio_compra" name="precio_compra" class="form-control" min="0"
                       value="{{ old('precio_compra', $producto->precio_compra) }}">
                @error('precio_compra') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            {{-- % Utilidad --}}
            <div class="col-md-3">
                <label for="porcentaje_utilidad" class="form-label">% Utilidad *</label>
                <input type="number" step="0.01" id="porcentaje_utilidad" name="porcentaje_utilidad" class="form-control" min="0" max="100"
                       value="{{ old('porcentaje_utilidad', $producto->porcentaje_utilidad) }}">
                @error('porcentaje_utilidad') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            {{-- Cantidad mínima --}}
            <div class="col-md-3">
                <label for="cantidad_minima" class="form-label">Cantidad mínima *</label>
                <input type="number" id="cantidad_minima" name="cantidad_minima" class="form-control" min="0"
                       value="{{ old('cantidad_minima', $producto->cantidad_minima) }}">
                @error('cantidad_minima') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            {{-- Activo --}}
            <div class="col-md-3 d-flex align-items-end">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="activo" name="activo" value="1" {{ old('activo', $producto->activo) ? 'checked' : '' }}>
                    <label class="form-check-label" for="activo">Activo</label>
                </div>
            </div>

            {{-- Botones --}}
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="/productos" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
