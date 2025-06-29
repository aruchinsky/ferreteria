@extends('layouts.app')
@section('title','Eliminar provincia')

@section('content')
<h1 class="mb-3">Eliminar provincia</h1>

<div class="alert alert-warning">
    <h4 class="alert-heading">¿Eliminar definitivamente?</h4>
    <p>
        Estás por borrar la provincia:<br>
        <strong>{{ $provincia->descripcion }}</strong>.
        <br><br>
        <em>Esta acción no se puede deshacer.</em>
    </p>
</div>

<form action="/provincias/destroy" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <input type="hidden" name="id_provincia" value="{{ $provincia->id_provincia }}">

    <button type="submit" class="btn btn-danger">
        Sí, eliminar
    </button>
    <a href="/provincias" class="btn btn-secondary">
        Cancelar
    </a>
</form>
@endsection
