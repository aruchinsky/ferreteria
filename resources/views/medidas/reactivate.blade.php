@extends('layouts.app')
@section('title','Reactivar medida')

@section('content')
<h1 class="mb-3">Reactivar medida</h1>

<div class="alert alert-info">
  <h4 class="alert-heading mb-2">¿Deseás volver a activar esta medida?</h4>
  <p>
    <strong>{{ $medida->abreviatura }} – {{ $medida->descripcion }}</strong>
  </p>
</div>

<form action="/medidas/reactivar" method="POST" class="d-inline">
  @csrf
  @method('PATCH')
  <input type="hidden" name="id_medida" value="{{ $medida->id_medida }}">
  <div class="d-flex gap-2">
    <button class="btn btn-success">Sí, reactivar</button>
    <a href="/medidas/inactivas" class="btn btn-secondary">Cancelar</a>
  </div>
</form>
@endsection
