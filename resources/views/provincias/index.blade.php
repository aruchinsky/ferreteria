@extends('layouts.app')
@section('title','Listado de provincias')

@section('content')
<h1 class="mb-3">Provincias</h1>
<a class="btn btn-success mb-2" href="/provincias/create">+ Nueva</a>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
  @forelse($provincias as $provincia)
     <tr>
        <td>{{ $provincia->descripcion }}</td>
        <td>
          <a class="btn btn-sm btn-primary" href="/provincias/edit/{{ $provincia->id_provincia }}">Editar</a>
          <a class="btn btn-sm btn-danger" href="/provincias/delete/{{ $provincia->id_provincia }}">Borrar</a>
        </td>
     </tr>
  @empty
     <tr>
        <td colspan="2" class="text-center">No hay provincias registradas.</td>
     </tr>
  @endforelse
  </tbody>
</table>
@endsection
