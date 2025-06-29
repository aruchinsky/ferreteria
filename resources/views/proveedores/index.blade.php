@extends('layouts.app')
@section('title','Listado de proveedores')

@section('content')
<h1 class="mb-3">Proveedores</h1>
<a class="btn btn-success mb-2" href="/proveedores/create">+ Nuevo</a>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Razón social</th>
      <th>CUIT</th>
      <th>Persona contacto</th>
      <th>Teléfono</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
  @forelse($proveedores as $p)
     <tr>
        <td>{{ $p->razon_social }}</td>
        <td>{{ $p->cuit }}</td>
        <td>{{ $p->persona_contacto }}</td>
        <td>{{ $p->telefono_contacto }}</td>
        <td>
          <a class="btn btn-sm btn-primary" href="/proveedores/edit/{{ $p->id_proveedores }}">Editar</a>
          <a class="btn btn-sm btn-danger" href="/proveedores/delete/{{ $p->id_proveedores }}">Borrar</a>
        </td>
     </tr>
  @empty
     <tr>
        <td colspan="5" class="text-center">No hay proveedores registrados.</td>
     </tr>
  @endforelse
  </tbody>
</table>
@endsection
