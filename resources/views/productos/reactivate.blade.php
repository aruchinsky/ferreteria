@extends('layouts.app')
@section('title','Reactivar producto')

@section('content')
<h1 class="mb-3">Reactivar producto</h1>

<div class="alert alert-info">
  <h4 class="alert-heading mb-2">¿Deseás volver a activar este producto?</h4>
  <p>
    <strong>{{ $producto->descripcion }}</strong><br>
    Marca: {{ $producto->marca ?? '-' }}<br>
    Medida: {{ $producto->medida ?? '-' }}<br>
    Proveedor: {{ $producto->proveedor ?? '-' }}
  </p>
</div>

<form action="/productos/reactivar" method="POST" class="d-inline">
  @csrf
  @method('PATCH')
  <input type="hidden" name="id_productos" value="{{ $producto->id_productos }}">
  <div class="d-flex gap-2">
    <button class="btn btn-success">Sí, reactivar</button>
    <a href="/productos/inactivos" class="btn btn-secondary">Cancelar</a>
  </div>
</form>
@endsection
