@extends('layouts.app')
@section('title','Alta de Condición IVA')

@section('content')
<div class="d-flex justify-content-center">
  <div class="card shadow p-4 w-100" style="max-width:500px;">
    <h1 class="mb-4 fs-4">Nueva condición IVA</h1>
    <form action="/condicion/store" method="POST" class="row g-3">
      @csrf
      <div class="col-12">
        <label for="descripcion" class="form-label">Descripción *</label>
        <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{ old('descripcion') }}" autofocus>
        @error('descripcion') <div class="text-danger small">{{ $message }}</div> @enderror
      </div>
      <div class="col-12 d-flex gap-2">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="/condiciones" class="btn btn-secondary">Cancelar</a>
      </div>
    </form>
  </div>
</div>
@endsection
