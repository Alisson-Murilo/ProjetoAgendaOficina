<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Motos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">

        <h1>Consulta de Motos</h1>
            
        <div class="mb-3">
            <label class="form-label">ID</label>
            <input type="text" class="form-control" value="{{ $moto->id }}" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">Marca</label>
            <input class="form-control"value="{{ $moto->marca }}" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">Modelo</label>
            <input class="form-control" value="{{ $moto->modelo }}" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">Placa</label>
            <input class="form-control" value="{{ $moto->placa }}" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">Cliente</label>
            <input class="form-control" value="{{ $moto->cliente->nome }}" disabled>
            </select>
        </div>
        
        <a href="{{ route('moto.index') }}" class="btn btn-secondary">Voltar</a>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>