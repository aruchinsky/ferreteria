@extends('layouts.app')
@section('title','Alta de Medida')

@section('content')
<h1 class="mb-4">Nueva medida</h1>
<div class="card shadow-sm mx-auto" style="max-width: 500px;">
  <div class="card-body">
    <form action="/medidas/store" method="POST" class="row g-3">
        @csrf
        <div class="col-md-6">
            <label for="abreviatura" class="form-label">Abreviatura *</label>
            <input type="text" name="abreviatura" id="abreviatura" class="form-control text-uppercase" maxlength="10" value="{{ old('abreviatura') }}">
            @error('abreviatura') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-12">
            <label for="descripcion" class="form-label">Descripción *</label>
            <input type="text" name="descripcion" id="descripcion" class="form-control" maxlength="250" value="{{ old('descripcion') }}">
            @error('descripcion') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="activo" id="activo" value="1" {{ old('activo', 1) ? 'checked' : '' }}>
                <label class="form-check-label" for="activo">Activo</label>
            </div>
        </div>
        <div class="col-12 d-flex gap-2">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="/medidas" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
  </div>
</div>
@endsection
