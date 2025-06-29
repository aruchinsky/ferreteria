<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ferretería Forja</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <style>
        body {
            font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
            background-color: #f8f9fa;
        }
        .hero-bg {
            background: linear-gradient(90deg, #6f42c1 60%, #f8f9fa 100%);
            color: #fff;
        }
        .card-icon {
            font-size: 2.5rem;
            color: #6f42c1;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #6f42c1;">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Forja</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link active" href="#">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#servicios">Servicios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#productos">Productos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contacto">Contacto</a></li>
                    <li class="nav-item ms-2">
                        <a class="btn btn-outline-light fw-semibold px-4 py-2" style="border-width:2px; border-radius:2rem; transition:background .2s, color .2s;" href="/home">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Ir al sistema
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-bg py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="display-4 fw-bold mb-3">¡Bienvenido a Forja!</h1>
                    <p class="lead mb-4">Tu ferretería de confianza con los mejores productos, atención personalizada y precios competitivos. Todo lo que necesitas para tus proyectos de construcción, hogar y más.</p>
                    <a href="#productos" class="btn btn-light btn-lg me-2">Ver productos</a>
                    <a href="#contacto" class="btn btn-outline-light btn-lg">Contáctanos</a>
                </div>
                <div class="col-md-6 text-center">
                    <img src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=600&q=80" class="img-fluid rounded shadow-lg" alt="Ferretería">
                </div>
            </div>
        </div>
    </section>

    <!-- Servicios -->
    <section id="servicios" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold" style="color: #6f42c1;">Nuestros Servicios</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 text-center p-3">
                        <div class="card-body">
                            <div class="card-icon mb-3"><i class="bi bi-tools"></i></div>
                            <h5 class="card-title">Asesoría Especializada</h5>
                            <p class="card-text">Nuestro equipo te ayuda a elegir los mejores productos para tu proyecto.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 text-center p-3">
                        <div class="card-body">
                            <div class="card-icon mb-3"><i class="bi bi-truck"></i></div>
                            <h5 class="card-title">Envíos a Domicilio</h5>
                            <p class="card-text">Recibe tus compras en la puerta de tu casa o lugar de trabajo.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 text-center p-3">
                        <div class="card-body">
                            <div class="card-icon mb-3"><i class="bi bi-cash-coin"></i></div>
                            <h5 class="card-title">Precios Competitivos</h5>
                            <p class="card-text">Ofrecemos la mejor relación calidad-precio del mercado.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Productos destacados -->
    <section id="productos" class="py-5" style="background-color: #f3eafe;">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold" style="color: #6f42c1;">Productos Destacados</h2>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="card h-100">
                        <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=400&q=80" class="card-img-top" alt="Martillo">
                        <div class="card-body">
                            <h5 class="card-title">Martillo Profesional</h5>
                            <p class="card-text">Resistente y ergonómico, ideal para todo tipo de trabajos.</p>
                            <a href="#" class="btn btn-primary" style="background-color: #6f42c1; border-color: #6f42c1;">Ver más</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100">
                        <img src="https://images.unsplash.com/photo-1464983953574-0892a716854b?auto=format&fit=crop&w=400&q=80" class="card-img-top" alt="Taladro">
                        <div class="card-body">
                            <h5 class="card-title">Taladro Eléctrico</h5>
                            <p class="card-text">Potente, seguro y fácil de usar para profesionales y aficionados.</p>
                            <a href="#" class="btn btn-primary" style="background-color: #6f42c1; border-color: #6f42c1;">Ver más</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100">
                        <img src="https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=400&q=80" class="card-img-top" alt="Llave inglesa">
                        <div class="card-body">
                            <h5 class="card-title">Llave Inglesa</h5>
                            <p class="card-text">Ajustable y de alta precisión para todo tipo de tuercas y tornillos.</p>
                            <a href="#" class="btn btn-primary" style="background-color: #6f42c1; border-color: #6f42c1;">Ver más</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100">
                        <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=format&fit=crop&w=400&q=80" class="card-img-top" alt="Caja de herramientas">
                        <div class="card-body">
                            <h5 class="card-title">Caja de Herramientas</h5>
                            <p class="card-text">Organiza y transporta tus herramientas de forma segura y práctica.</p>
                            <a href="#" class="btn btn-primary" style="background-color: #6f42c1; border-color: #6f42c1;">Ver más</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contacto -->
    <section id="contacto" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold" style="color: #6f42c1;">Contáctanos</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form class="card p-4 shadow-sm">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Tu nombre">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="email" placeholder="nombre@ejemplo.com">
                        </div>
                        <div class="mb-3">
                            <label for="mensaje" class="form-label">Mensaje</label>
                            <textarea class="form-control" id="mensaje" rows="4" placeholder="¿En qué podemos ayudarte?"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" style="background-color: #6f42c1; border-color: #6f42c1;">Enviar mensaje</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-white text-center py-4 mt-5" style="background-color: #6f42c1;">
        <div class="container">
            <p class="mb-1">&copy; {{ date('Y') }} Ferretería Forja. Todos los derechos reservados.</p>
            <small>Dirección: Av. Principal 1234, Ciudad | Tel: (123) 456-7890</small>
        </div>
    </footer>

    <!-- Bootstrap JS y dependencias -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</body>
</html>
