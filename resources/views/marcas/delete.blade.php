@extends('layouts.app')
@section('title','Eliminar marca')

@section('content')
<h1 class="mb-3">Eliminar marca</h1>

<div class="alert alert-warning">
    <h4 class="alert-heading">¿Eliminar definitivamente?</h4>
    <p>
        Estás por borrar la marca:<br>
        <strong>{{ $marca->marcas_descripcion }}</strong>.
        <br><br>
        <em>Esta acción no se puede deshacer.</em>
    </p>
</div>

<form action="/marcas/destroy" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <input type="hidden" name="id_marcas" value="{{ $marca->id_marcas }}">

    <button type="submit" class="btn btn-danger">
        Sí, eliminar
    </button>
    <a href="/marcas" class="btn btn-secondary">
        Cancelar
    </a>
</form>
@endsection
