@extends('layouts.app')
@section('title','Medidas inactivas')

@section('content')
<h1 class="mb-3">Medidas inactivas</h1>

<table class="table table-striped">
  <thead>
    <tr>
      <th>Abrev.</th>
      <th>Descripción</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
  @forelse($medidas as $m)
    <tr>
      <td>{{ $m->abreviatura }}</td>
      <td>{{ $m->descripcion }}</td>
      <td class="d-flex gap-2">
        <form action="/medidas/reactivar" method="POST" class="d-inline">
          @csrf
          @method('PATCH')
          <input type="hidden" name="id_medida" value="{{ $m->id_medida }}">
          <button type="submit" class="btn btn-sm btn-success">Reactivar</button>
        </form>
        <a href="/medidas/purge/{{ $m->id_medida }}" class="btn btn-sm btn-danger">Eliminar definitiva</a>
      </td>
    </tr>
  @empty
    <tr>
      <td colspan="3" class="text-center">No hay medidas inactivas.</td>
    </tr>
  @endforelse
  </tbody>
</table>

<a href="/medidas" class="btn btn-secondary">Volver a activas</a>
@endsection
