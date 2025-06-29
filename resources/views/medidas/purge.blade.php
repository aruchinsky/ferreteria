@extends('layouts.app')
@section('title','Eliminar medida')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card shadow-sm border-0">
      <div class="card-body">
        <h1 class="mb-3 text-center text-danger">Eliminar definitivamente</h1>
        <div class="alert alert-danger text-center">
          <h4 class="fw-bold">¡Atención!</h4>
          Vas a borrar <strong>{{ $medida->abreviatura }} – {{ $medida->descripcion }}</strong>.<br>
          <span class="fw-semibold">No podrás recuperarla.</span>
        </div>
        <form action="/medidas/purge" method="POST" class="d-flex flex-column align-items-center gap-2">
          @csrf @method('DELETE')
          <input type="hidden" name="id_medida" value="{{ $medida->id_medida }}">
          <button class="btn btn-danger px-4">
            Sí, eliminar para siempre
          </button>
          <a href="/medidas/inactivas" class="btn btn-secondary px-4">Cancelar</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
