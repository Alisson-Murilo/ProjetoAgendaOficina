<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Entrar') - Oficina de Motos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f8f9fa, #e2e8f0);
        }

        .auth-card {
            width: 100%;
            max-width: 420px;
            border: 0;
            border-radius: 1rem;
        }
    </style>
</head>

<body class="min-vh-100 d-flex align-items-center justify-content-center p-3">
    <div class="card auth-card shadow">
        <div class="card-body p-4 p-md-5">
            <div class="text-center mb-4">
                <i class="bi bi-bicycle text-primary" style="font-size: 2.5rem;"></i>
                <h2 class="h5 mt-2 mb-0">Oficina de Motos</h2>
            </div>
            @yield('content')
        </div>
    </div>
</body>

</html>