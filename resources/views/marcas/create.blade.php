@extends('layouts.app')
@section('title','Alta de Marca')

@section('content')
<div class="d-flex justify-content-center">
  <div class="card shadow p-4 w-100" style="max-width:500px;">
    <h1 class="mb-4 fs-4">Nueva marca</h1>
    <form action="/marcas/store" method="POST" class="row g-3">
      @csrf
      <div class="col-12">
        <label for="marcas_descripcion" class="form-label">Descripción *</label>
        <input type="text" name="marcas_descripcion" id="marcas_descripcion" class="form-control" value="{{ old('marcas_descripcion') }}" autofocus>
        @error('marcas_descripcion') <div class="text-danger small">{{ $message }}</div> @enderror
      </div>
      <div class="col-12 d-flex gap-2">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="/marcas" class="btn btn-secondary">Cancelar</a>
      </div>
    </form>
  </div>
</div>
@endsection
