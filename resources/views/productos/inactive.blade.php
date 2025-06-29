@extends('layouts.app')
@section('title','Productos inactivos')

@section('content')
<h1 class="mb-3">Productos inactivos</h1>
<a class="btn btn-outline-secondary mb-2" href="/productos">Ver activos</a>
<div class="table-responsive">
<table class="table table-striped align-middle">
  <thead>
    <tr>
      <th>Descripción</th>
      <th>Marca</th>
      <th>Medida</th>
      <th class="text-end">Stock</th>
      <th class="text-end">Precio venta</th>
      <th class="text-end">Cantidad mínima</th>
      <th>Proveedor</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
  @forelse($productos as $p)
     <tr>
        <td class="text-truncate" style="max-width: 180px;" title="{{ $p->descripcion }}">{{ $p->descripcion }}</td>
        <td>{{ $p->marca ?? '-' }}</td>
        <td>{{ $p->medida ?? '-' }}</td>
        <td class="text-end">{{ $p->cantidad_actual }}</td>
        <td class="text-end">${{ number_format($p->precio_venta,2,',','.') }}</td>
        <td class="text-end">{{ $p->cantidad_minima }}</td>
        <td class="text-truncate" style="max-width: 120px;" title="{{ $p->proveedor }}">{{ $p->proveedor ?? '-' }}</td>
        <td>
          <a class="btn btn-sm btn-success" href="/productos/reactivar/{{ $p->id_productos }}">Reactivar</a>
          <a class="btn btn-sm btn-danger" href="/productos/purge/{{ $p->id_productos }}">Eliminar</a>
        </td>
     </tr>
  @empty
     <tr>
        <td colspan="8" class="text-center">No hay productos inactivos.</td>
     </tr>
  @endforelse
  </tbody>
</table>
</div>
@endsection
