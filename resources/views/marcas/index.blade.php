@extends('layouts.app')
@section('title','Listado de marcas')

@section('content')
<h1 class="mb-3">Marcas</h1>
<a class="btn btn-success mb-2" href="/marcas/create">+ Nueva</a>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Descripción</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
  @forelse($marcas as $m)
     <tr>
        <td>{{ $m->marcas_descripcion }}</td>
        <td>
          <a class="btn btn-sm btn-primary" href="/marcas/edit/{{ $m->id_marcas }}">Editar</a>
          <a class="btn btn-sm btn-danger" href="/marcas/delete/{{ $m->id_marcas }}">Borrar</a>
        </td>
     </tr>
  @empty
     <tr>
        <td colspan="3" class="text-center">No hay marcas registradas.</td>
     </tr>
  @endforelse
  </tbody>
</table>
@endsection
