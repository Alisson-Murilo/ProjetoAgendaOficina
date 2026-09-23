<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Consulta de Agendamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">

        <h1>Consulta de Agendamento</h1>

        <div class="mb-3">
            <label class="form-label">ID</label>
            <input type="text" class="form-control" value="{{ $agendamento->id }}" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">Moto</label>
            <input type="text" class="form-control" value="{{ $agendamento->moto->marca }} - {{ $agendamento->moto->modelo }}" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">Serviço</label>
            <input type="text" class="form-control" value="{{ $agendamento->servico->nome }}" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">Data</label>
            <input type="date" class="form-control" value="{{ $agendamento->data }}" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">Horario</label>
            <input type="time" class="form-control" value="{{ $agendamento->horario }}" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <input type="text" class="form-control" value="{{ $agendamento->status }}" disabled>
        </div>

            <a href="{{ route('agendamento.index') }}" class="btn btn-secondary">Voltar</a>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>