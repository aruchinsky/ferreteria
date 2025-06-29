@extends('layouts.app')
@section('title','Editar medida')

@section('content')
<div class="d-flex justify-content-center">
    <div class="card shadow p-4 w-100" style="max-width:600px;">
        <h1 class="mb-4">Editar medida</h1>
        <form action="/medidas/update" method="POST" class="row g-3">
            @csrf
            @method('PATCH')
            <input type="hidden" name="id_medida" value="{{ $medida->id_medida }}">

            <div class="col-md-6">
                <label for="abreviatura" class="form-label">Abreviatura *</label>
                <input type="text" id="abreviatura" name="abreviatura" class="form-control text-uppercase" maxlength="10"
                       value="{{ old('abreviatura', $medida->abreviatura) }}">
                @error('abreviatura') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6">
                <label for="descripcion" class="form-label">Descripción *</label>
                <input type="text" id="descripcion" name="descripcion" class="form-control" maxlength="250"
                       value="{{ old('descripcion', $medida->descripcion) }}">
                @error('descripcion') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="activo" name="activo" value="1" {{ old('activo', $medida->activo) ? 'checked' : '' }}>
                    <label class="form-check-label" for="activo">Activo</label>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="/medidas" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
