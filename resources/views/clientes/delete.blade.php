@extends('layouts.app')
@section('title','Eliminar cliente')

@section('content')
<h1 class="mb-3">Eliminar cliente</h1>

<div class="alert alert-warning">
    <h4 class="alert-heading">¿Eliminar definitivamente?</h4>
    <p>
        Estás por borrar al cliente<br>
        <strong>{{ $cliente->apellido }}, {{ $cliente->nombre }}</strong><br>
        DNI {{ $cliente->dni }}.
        <br><br>
        <em>Esta acción no se puede deshacer.</em>
    </p>
</div>

<form action="/cliente/destroy" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <input type="hidden" name="id_clientes" value="{{ $cliente->id_clientes }}">

    <button type="submit" class="btn btn-danger">
        Sí, eliminar
    </button>
    <a href="/clientes" class="btn btn-secondary">
        Cancelar
    </a>
</form>
@endsection
