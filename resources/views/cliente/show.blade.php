<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Consulta de Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">

        <h1>Consulta de Cliente</h1>

        <div class="mb-3">
            <label class="form-label">ID</label>
            <input type="text" class="form-control" value="{{ $cliente->id }}" disabled>
        </div>

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" class="form-control" value="{{ $cliente->nome }}" disabled>
        </div>

        <div class="mb-3">
            <label class="form-label">Telefone</label>
            <input type="text" class="form-control" value="{{ $cliente->telefone }}" disabled>
        </div>

        <a href="{{ route('cliente.index') }}" class="btn btn-secondary">Voltar</a>

    </div>
</body>

</html>