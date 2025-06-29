@extends('layouts.app')
@section('title','Eliminar producto')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card shadow-sm border-0">
      <div class="card-body">
        <h1 class="mb-3 text-center text-danger">Eliminar definitivamente</h1>
        <div class="alert alert-danger text-center">
          <h4 class="fw-bold">¡Atención!</h4>
          Vas a borrar <strong>{{ $producto->descripcion }}</strong>.<br>
          Marca: {{ $producto->marca ?? '-' }}<br>
          Medida: {{ $producto->medida ?? '-' }}<br>
          Proveedor: {{ $producto->proveedor ?? '-' }}<br>
          <span class="fw-semibold">No podrás recuperarlo.</span>
        </div>
        <form action="/productos/purge" method="POST" class="d-flex flex-column align-items-center gap-2">
          @csrf @method('DELETE')
          <input type="hidden" name="id_productos" value="{{ $producto->id_productos }}">
          <button class="btn btn-danger px-4">
            Sí, eliminar para siempre
          </button>
          <a href="/productos/inactivos" class="btn btn-secondary px-4">Cancelar</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
