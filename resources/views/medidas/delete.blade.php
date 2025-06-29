@extends('layouts.app')
@section('title','Eliminar medida')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card shadow-sm border-0">
      <div class="card-body">
        <h1 class="mb-3 text-center text-warning">Eliminar medida</h1>
        <div class="alert alert-warning text-center">
          <h4 class="alert-heading">¿Dar de baja esta medida?</h4>
          <p>
            Vas a dar de baja la medida<br>
            <strong>{{ $medida->abreviatura }} – {{ $medida->descripcion }}</strong>.
            <br><br>
            <em>La medida no se eliminará definitivamente, solo dejará de estar activa.</em>
          </p>
        </div>
        <form action="/medidas/destroy" method="POST" class="d-flex flex-column align-items-center gap-2">
          @csrf
          @method('DELETE')
          <input type="hidden" name="id_medida" value="{{ $medida->id_medida }}">
          <button type="submit" class="btn btn-danger px-4">Sí, eliminar</button>
          <a href="/medidas" class="btn btn-secondary px-4">Cancelar</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
