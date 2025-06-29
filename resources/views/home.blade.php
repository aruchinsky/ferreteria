@extends('layouts.app')
@section('title','Inicio')

@section('content')
<div class="row justify-content-center">
  <div class="col-lg-8 text-center">

      {{-- Encabezado --}}
      <h1 class="display-5 fw-bold mb-3">
          ¡Bienvenido a <span class="text-primary">Forja&nbsp;Gestión</span>!
      </h1>
      <p class="lead mb-4">
          Seleccioná un módulo para comenzar a trabajar con la ferretería.
      </p>

      {{-- Accesos rápidos (cards Bootstrap) --}}
      <div class="row g-3">
          <div class="col-6 col-md-4">
              <a href="/clientes" class="text-decoration-none">
                  <div class="card h-100 shadow-sm border-0">
                      <div class="card-body">
                          <i class="bi bi-people-fill h1 d-block mb-2"></i>
                          <span class="fw-semibold">Clientes</span>
                      </div>
                  </div>
              </a>
          </div>

          <div class="col-6 col-md-4">
              <a href="/proveedores" class="text-decoration-none">
                  <div class="card h-100 shadow-sm border-0">
                      <div class="card-body">
                          <i class="bi bi-truck h1 d-block mb-2"></i>
                          <span class="fw-semibold">Proveedores</span>
                      </div>
                  </div>
              </a>
          </div>

          <div class="col-6 col-md-4">
              <a href="/productos" class="text-decoration-none">
                  <div class="card h-100 shadow-sm border-0">
                      <div class="card-body">
                          <i class="bi bi-hammer h1 d-block mb-2"></i>
                          <span class="fw-semibold">Productos</span>
                      </div>
                  </div>
              </a>
          </div>

          <div class="col-6 col-md-4">
              <a href="/marcas" class="text-decoration-none">
                  <div class="card h-100 shadow-sm border-0">
                      <div class="card-body">
                          <i class="bi bi-tag-fill h1 d-block mb-2"></i>
                          <span class="fw-semibold">Marcas</span>
                      </div>
                  </div>
              </a>
          </div>

          <div class="col-6 col-md-4">
              <a href="/medidas" class="text-decoration-none">
                  <div class="card h-100 shadow-sm border-0">
                      <div class="card-body">
                          <i class="bi bi-rulers h1 d-block mb-2"></i>
                          <span class="fw-semibold">Medidas</span>
                      </div>
                  </div>
              </a>
          </div>

          <div class="col-6 col-md-4">
              <a href="/provincias" class="text-decoration-none">
                  <div class="card h-100 shadow-sm border-0">
                      <div class="card-body">
                          <i class="bi bi-geo-alt-fill h1 d-block mb-2"></i>
                          <span class="fw-semibold">Provincias</span>
                      </div>
                  </div>
              </a>
          </div>

          <div class="col-6 col-md-4">
              <a href="/condiciones" class="text-decoration-none">
                  <div class="card h-100 shadow-sm border-0">
                      <div class="card-body">
                          <i class="bi bi-receipt h1 d-block mb-2"></i>
                          <span class="fw-semibold">Condición&nbsp;IVA</span>
                      </div>
                  </div>
              </a>
          </div>
      </div> {{-- .row g-3 --}}

      {{-- Pie de página --}}
      <p class="mt-5 text-muted small">
          Sistema desarrollado para Programación&nbsp;3 · Laravel&nbsp;12 · Bootstrap&nbsp;5
      </p>

  </div>
</div>
@endsection
