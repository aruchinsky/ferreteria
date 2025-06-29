@extends('layouts.app')
@section('title','Listado de clientes')

@section('content')
<h1 class="mb-3">Clientes</h1>
<a class="btn btn-success mb-2" href="/cliente/create">+ Nuevo</a>
<div class="table-responsive" style="min-width: 0; max-width: 100vw;">
<table class="table table-striped align-middle" style="min-width: 900px;">
  <thead>
    <tr>
      <th>Nombre completo</th>
      <th>DNI</th>
      <th>Fecha de nacimiento</th>
      <th>Provincia</th>
      <th>CUIT</th>
      <th>Teléfono</th>
      <th>Condición IVA</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
  @forelse($clientes as $c)
     <tr>
        <td>{{ $c->nombre_completo }}</td>
        <td>{{ $c->dni }}</td>
        <td>{{ $c->fechanacimiento ? \Carbon\Carbon::parse($c->fechanacimiento)->format('d/m/Y') : '-' }}</td>
        <td>{{ $c->provincia ?? '-' }}</td>
        <td>{{ $c->cuit ?? '-' }}</td>
        <td>{{ $c->telefono ?? '-' }}</td>
        <td>{{ $c->condicion_iva ?? '-' }}</td>
        <td>
          <a class="btn btn-sm btn-primary" href="/cliente/edit/{{ $c->id_clientes }}">Editar</a>
          <a class="btn btn-sm btn-danger" href="/cliente/delete/{{ $c->id_clientes }}">Borrar</a>
        </td>
     </tr>
  @empty
     <tr>
        <td colspan="8" class="text-center">No hay clientes registrados.</td>
     </tr>
  @endforelse
  </tbody>
</table>
</div>
@endsection
