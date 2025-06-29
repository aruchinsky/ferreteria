@extends('layouts.app')
@section('title','Eliminar producto')

@section('content')
<h1 class="mb-3">Eliminar producto</h1>

<div class="alert alert-warning">
    <h4 class="alert-heading">¿Dar de baja este producto?</h4>
    <p>
        Estás por dar de baja el producto:<br>
        <strong>{{ $producto->descripcion }}</strong><br>
        Marca: {{ $producto->marca ?? '-' }}<br>
        Medida: {{ $producto->medida ?? '-' }}<br>
        Proveedor: {{ $producto->proveedor ?? '-' }}
        <br><br>
        <em>Esta acción no elimina el producto de la base de datos, solo lo inactiva.</em>
    </p>
</div>

<form action="/productos/destroy" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <input type="hidden" name="id_productos" value="{{ $producto->id_productos }}">

    <button type="submit" class="btn btn-danger">
        Sí, dar de baja
    </button>
    <a href="/productos" class="btn btn-secondary">
        Cancelar
    </a>
</form>
@endsection
