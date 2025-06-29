@extends('layouts.app')
@section('title','Listado de medidas')

@section('content')
<h1 class="mb-3">Medidas</h1>
<div class="d-flex justify-content-between align-items-center mb-2">
  <a class="btn btn-success" href="/medidas/create">+ Nueva</a>
  <a href="/medidas/inactivas" class="btn btn-outline-primary" style="background: #6f42c1; color: #fff; border: none;">
    <i class="bi bi-archive"></i> Inactivas
  </a>
</div>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Abreviación</th>
      <th>Descripción</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
  @forelse($medidas as $m)
     <tr>
        <td>{{ $m->abreviatura }}</td>
        <td>{{ $m->descripcion }}</td>
        <td>
          <a class="btn btn-sm btn-primary" href="/medidas/edit/{{ $m->id_medida }}">Editar</a>
          <a class="btn btn-sm btn-danger" href="/medidas/delete/{{ $m->id_medida }}">Borrar</a>
        </td>
     </tr>
  @empty
     <tr>
        <td colspan="3" class="text-center">No hay medidas registradas.</td>
     </tr>
  @endforelse
  </tbody>
</table>
@endsection
