@extends('layouts.app')
@section('title','Listado de condiciones IVA')

@section('content')
<h1 class="mb-3">Condiciones de IVA</h1>
<a class="btn btn-success mb-2" href="/condicion/create">+ Nueva</a>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
  @forelse($condiciones as $condicion)
     <tr>
        <td>{{ $condicion->descripcion }}</td>
        <td>
          <a class="btn btn-sm btn-primary" href="/condicion/edit/{{ $condicion->id_condicioniva }}">Editar</a>
          <a class="btn btn-sm btn-danger" href="/condicion/delete/{{ $condicion->id_condicioniva }}">Borrar</a>
        </td>
     </tr>
  @empty
     <tr>
        <td colspan="2" class="text-center">No hay condiciones registradas.</td>
     </tr>
  @endforelse
  </tbody>
</table>
@endsection
