<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registros de Serviços</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">

        <h2>Registros de Serviços</h2>

        <a href="/servico/create" class="btn btn-success mb-3">Novo Registro</a>

        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach($servicos as $s)
                    <tr>
                        <td>{{ $s->id }}</td>
                        <td>{{ $s->nome }}</td>
                        <td>R$ {{ $s->preco }},00</td>
                        <td class="d-flex gap-2">
                            <a href="/servico/{{ $s->id }}/edit" class="btn btn-sm btn-warning">Editar</a>
                            <a href="/servico/{{ $s->id }}" class="btn btn-sm btn-info">Consultar</a>

                            <form action="/servico/{{ $s->id }}" method="post">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Tem certeza que deseja excluir este serviço?')">
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