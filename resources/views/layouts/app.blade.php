<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>@yield('title','Forja')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
  <style>
    body {
      font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
      background-color: #f8f9fa;
    }
    .sidebar {
      background: #fff;
      border-right: 1px solid #e5e5e5;
      min-height: 100vh;
      width: 230px;
      position: sticky;
      top: 0;
      z-index: 1020;
    }
    .sidebar .nav-link.active, .sidebar .nav-link:hover {
      background: #f3eafe;
      color: #6f42c1 !important;
      font-weight: 500;
      border-radius: .375rem;
    }
    .sidebar .nav-link {
      transition: background 0.2s, color 0.2s;
    }
    .sidebar-title {
      color: #6f42c1;
      font-weight: bold;
      letter-spacing: 1px;
    }
    .navbar {
      background: #6f42c1 !important;
      box-shadow: 0 2px 8px 0 rgba(111,66,193,0.08);
    }
    .navbar .navbar-brand {
      font-weight: bold;
      color: #fff !important;
      letter-spacing: 1px;
    }
    .navbar .nav-link {
      color: #fff !important;
      font-weight: 500;
      margin-left: 1rem;
      transition: color 0.2s;
    }
    .navbar .nav-link:hover, .navbar .nav-link.active {
      color: #f3eafe !important;
    }
    .main-content {
      background: #f8f9fa;
      min-height: 100vh;
      padding: 2rem 2rem 0 2rem;
    }
    .alert {
      border-radius: .5rem;
    }
  </style>
</head>
<body>
<div class="d-flex">
    <!-- Sidebar -->
    <nav id="sidebar" class="sidebar shadow-sm position-relative">
        <div class="p-4">
            <a href="/home" class="text-decoration-none"><h4 class="sidebar-title mb-4 m-0">Forja</h4></a>
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a class="nav-link text-dark" href="/clientes"><i class="bi bi-people me-2"></i><span>Clientes</span></a></li>
                <li class="nav-item mb-2"><a class="nav-link text-dark" href="/condiciones"><i class="bi bi-card-checklist me-2"></i><span>Condición</span></a></li>
                <li class="nav-item mb-2"><a class="nav-link text-dark" href="/marcas"><i class="bi bi-tags me-2"></i><span>Marcas</span></a></li>
                <li class="nav-item mb-2"><a class="nav-link text-dark" href="/medidas"><i class="bi bi-rulers me-2"></i><span>Medidas</span></a></li>
                <li class="nav-item mb-2"><a class="nav-link text-dark" href="/productos"><i class="bi bi-box-seam me-2"></i><span>Productos</span></a></li>
                <li class="nav-item mb-2"><a class="nav-link text-dark" href="/proveedores"><i class="bi bi-truck me-2"></i><span>Proveedores</span></a></li>
                <li class="nav-item mb-2"><a class="nav-link text-dark" href="/provincias"><i class="bi bi-geo-alt me-2"></i><span>Provincias</span></a></li>
            </ul>
        </div>
    </nav>
    <div class="flex-grow-1">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid justify-content-center">
                <a class="navbar-brand mx-auto text-center w-100" href="/">Forja</a>
                <div class="d-flex ms-auto align-items-center">
                    <a href="/" class="btn btn-outline-light fw-semibold px-3 py-1" style="border-width:2px; border-radius:2rem; font-size:1rem; line-height:1.2; height:38px; display:flex; align-items:center;">
                        <i class="bi bi-house-door me-1"></i> Volver al inicio
                    </a>
                </div>
            </div>
        </nav>
        <main class="main-content">
            @if(session('mensaje'))
                <div class="alert alert-{{ session('css') }} shadow-sm">{{ session('mensaje') }}</div>
            @endif
            @yield('content')
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
