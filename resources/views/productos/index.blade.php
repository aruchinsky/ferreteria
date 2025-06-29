@extends('layouts.app')
@section('title','Listado de productos')

@section('content')
<h1 class="mb-3">Productos</h1>
<div class="d-flex flex-wrap align-items-center gap-2 mb-2">
  <a class="btn btn-success" href="/productos/create">+ Nuevo</a>
  <a class="btn btn-outline-secondary ms-2" href="/productos/inactivos">Ver inactivos</a>
  <div class="alert alert-danger py-2 mb-0 ms-2 flex-grow-1" style="max-width: 500px;">
    <strong>Atención:</strong> Los productos marcados en <span class="fw-bold">rojo</span> están por debajo de su cantidad minima.
  </div>
</div>
<div class="table-responsive">
<table class="table table-striped align-middle">
  <thead>
    <tr>
      <th>Descripción</th>
      <th>Marca</th>
      <th>Medida</th>
      <th class="text-end">Stock</th>
      <th class="text-end">Precio venta</th>
      <th class="text-end">Precio compra</th>
      <th class="text-end">% Utilidad</th>
      <th>Proveedor</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
  @forelse($productos as $p)
     <tr @if($p->cantidad_actual <= $p->cantidad_minima) class="table-danger" @endif>
        <td class="text-truncate" style="max-width: 180px;" title="{{ $p->descripcion }}">{{ $p->descripcion }}</td>
        <td>{{ $p->marca ?? '-' }}</td>
        <td>{{ $p->medida ?? '-' }}</td>
        <td class="text-end">{{ $p->cantidad_actual }}</td>
        <td class="text-end">${{ number_format($p->precio_venta,2,',','.') }}</td>
        <td class="text-end">${{ number_format($p->precio_compra,2,',','.') }}</td>
        <td class="text-end">{{ $p->porcentaje_utilidad }}%</td>
        <td class="text-truncate" style="max-width: 120px;" title="{{ $p->proveedor }}">{{ $p->proveedor ?? '-' }}</td>
        <td>
          <a class="btn btn-sm btn-primary" href="/productos/edit/{{ $p->id_productos }}">Editar</a>
          <a class="btn btn-sm btn-danger" href="/productos/delete/{{ $p->id_productos }}">Borrar</a>
        </td>
     </tr>
  @empty
     <tr>
        <td colspan="9" class="text-center">No hay productos registrados.</td>
     </tr>
  @endforelse
  </tbody>
</table>
</div>
@endsection
