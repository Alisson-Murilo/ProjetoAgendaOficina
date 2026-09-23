<!doctype html>
<html lang="pt-BR">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Oficina de Motos</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.1/css/all.min.css" rel="stylesheet">
<style>
    body {
        background-color: #f4f6f8;
    }
    .hero {
        background: linear-gradient(135deg, #212529, #495057);
        color: #fff;
        padding: 3rem 1rem;
        border-radius: 0 0 1rem 1rem;
    }
    .card-cta {
        border: none;
        border-radius: 1rem;
        transition: transform 0.15s ease, box-shadow 0.15s ease;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    }
    .card-cta:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }
    .card-cta .icon-wrap {
        width: 56px;
        height: 56px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }
</style>
</head>

<body>

<div class="hero text-center mb-5">
    <h1 class="fw-bold"><i class="bi bi-wrench-adjustable-circle-fill"></i> Oficina de Motos</h1>
    <p class="lead mb-0">Sistema de gerenciamento de clientes, motos e agendamentos de manutenção</p>
</div>

<div class="container pb-5">
    <div class="row g-4 justify-content-center">

        <div class="col-sm-6 col-lg-3">
            <div class="card card-cta h-100 text-center p-3">
                <div class="card-body d-flex flex-column align-items-center">
                    <div class="icon-wrap bg-primary-subtle text-primary mb-3">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <h5 class="card-title">Clientes</h5>
                    <p class="card-text text-muted small">Cadastro e histórico de clientes</p>
                    <a href="{{ route('cliente.index') }}" class="btn btn-primary mt-auto w-100">
                        <i class="bi bi-arrow-right-circle"></i> Acessar
                    </a>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card card-cta h-100 text-center p-3">
                <div class="card-body d-flex flex-column align-items-center">
                    <div class="icon-wrap bg-success-subtle text-success mb-3">
                        <i class="fa-solid fa-motorcycle"></i>
                    </div>
                    <h5 class="card-title">Motos</h5>
                    <p class="card-text text-muted small">Veículos cadastrados na oficina</p>
                    <a href="{{ route('moto.index') }}" class="btn btn-success mt-auto w-100">
                        <i class="bi bi-arrow-right-circle"></i> Acessar
                    </a>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card card-cta h-100 text-center p-3">
                <div class="card-body d-flex flex-column align-items-center">
                    <div class="icon-wrap bg-warning-subtle text-warning mb-3">
                        <i class="bi bi-tools"></i>
                    </div>
                    <h5 class="card-title">Serviços</h5>
                    <p class="card-text text-muted small">Tipos de manutenção oferecidos</p>
                    <a href="{{ route('servico.index') }}" class="btn btn-warning mt-auto w-100 text-white">
                        <i class="bi bi-arrow-right-circle"></i> Acessar
                    </a>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card card-cta h-100 text-center p-3">
                <div class="card-body d-flex flex-column align-items-center">
                    <div class="icon-wrap bg-danger-subtle text-danger mb-3">
                        <i class="bi bi-calendar2-check-fill"></i>
                    </div>
                    <h5 class="card-title">Agendamentos</h5>
                    <p class="card-text text-muted small">Manutenções agendadas</p>
                    <a href="{{ route('agendamento.index') }}" class="btn btn-danger mt-auto w-100">
                        <i class="bi bi-arrow-right-circle"></i> Acessar
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>

<footer class="text-center text-muted small pb-4">
    &copy; {{ date('Y') }} Oficina de Motos — Sistema de Gestão
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>