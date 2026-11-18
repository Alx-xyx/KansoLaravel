<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Kanso </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho:wght@500;700&family=Zen+Kaku+Gothic+New:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= url('css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?= url('css/style.css');?>">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= route('home');?>">KANSO 簡素</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= route('home');?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= route('about');?>">Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= route('blog.index');?>">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= route('productos.index');?>">Productos</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <form action="{{ route('auth.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="nav-link">
                                        {{ auth()->user()->email }} (Cerrar sesión)
                                    </button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('auth.login.form') }}">Iniciar sesión</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
        <main class="container py-3">
            @if (session()->has('feedback.message'))
                <div class="alert alert-success">
                    {{ session('feedback.message') }}
                </div>
            @endif
            @if (session()->has('feedback.error'))
                <div class="alert alert-danger">
                    {{ session('feedback.error') }}
                </div>
            @endif
            {{
                $slot
            }}
        </main>
        <footer class="footer">
            <p>
                Alvaro Manuel Avendaño | Portales y Comercio Electronico | Da Vinci &copy; 2026
            </p>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>