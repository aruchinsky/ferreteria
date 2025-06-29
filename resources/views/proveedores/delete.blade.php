@extends('layouts.app')
@section('title','Eliminar proveedor')

@section('content')
<h1 class="mb-3">Eliminar proveedor</h1>

<div class="alert alert-warning">
    <h4 class="alert-heading">¿Eliminar definitivamente?</h4>
    <p>
        Estás por borrar al proveedor:<br>
        <strong>{{ $proveedor->razon_social }}</strong><br>
        CUIT {{ $proveedor->cuit }}.
        <br><br>
        <em>Esta acción no se puede deshacer.</em>
    </p>
</div>

<form action="/proveedores/destroy" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <input type="hidden" name="id_proveedores" value="{{ $proveedor->id_proveedores }}">

    <button type="submit" class="btn btn-danger">
        Sí, eliminar
    </button>
    <a href="/proveedores" class="btn btn-secondary">
        Cancelar
    </a>
</form>
@endsection
