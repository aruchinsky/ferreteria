@extends('layouts.app')
@section('title','Editar Condición IVA')

@section('content')
<div class="d-flex justify-content-center">
  <div class="card shadow p-4 w-100" style="max-width:500px;">
    <h1 class="mb-4 fs-4">Editar condición IVA</h1>
    <form action="/condicion/update" method="POST" class="row g-3">
      @csrf
      @method('PATCH')
      <input type="hidden" name="id_condicioniva" value="{{ $condicion->id_condicioniva }}">
      <div class="col-12">
        <label for="descripcion" class="form-label">Descripción *</label>
        <input type="text" name="descripcion" id="descripcion" class="form-control"
               value="{{ old('descripcion', $condicion->descripcion) }}" autofocus>
        @error('descripcion') <div class="text-danger small">{{ $message }}</div> @enderror
      </div>
      <div class="col-12 d-flex gap-2">
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="/condiciones" class="btn btn-secondary">Cancelar</a>
      </div>
    </form>
  </div>
</div>
@endsection
