<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registros de Motos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">

        <h2>Registros de Motos</h2>

        <a href="/moto/create" class="btn btn-success mb-3">Novo Registro</a>

        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Placa</th>
                    <th>Cliente</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach($motos as $m)
                    <tr>
                        <td>{{ $m->id }}</td>
                        <td>{{ $m->marca }}</td>
                        <td>{{ $m->modelo }}</td>
                        <td>{{ $m->placa }}</td>
                        <td>{{ $m->cliente->nome }}</td>
                        <td class="d-flex gap-2">
                            <a href="/moto/{{ $m->id }}/edit" class="btn btn-sm btn-warning">Editar</a>
                            <a href="/moto/{{ $m->id }}" class="btn btn-sm btn-info">Consultar</a>

                            <form action="/moto/{{ $m->id }}" method="post">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Tem certeza que deseja excluir este cliente?')">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    </div>
</body>

</html>