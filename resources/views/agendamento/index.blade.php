<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registros de Agendamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">

        <h2>Registros de Agendamentos</h2>

        <a href="/agendamento/create" class="btn btn-success mb-3">Novo Registro</a>

        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Moto</th>
                    <th>Servico</th>
                    <th>Data</th>
                    <th>Horário</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach($agendamentos as $a)
                    <tr>
                        <td>{{ $a->id}}</td>
                        <td>{{ $a->moto->marca }} - {{ $a->moto->modelo }}</td>
                        <td>{{ $a->servico->nome }}</td>
                        <td>{{ $a->data }}</td>
                        <td>{{ $a->horario }}</td>
                        <td>{{ $a->status }}</td>
                        <td class="d-flex gap-2">
                            <a href="/agendamento/{{ $a->id }}/edit" class="btn btn-sm btn-warning">Editar</a>
                            <a href="/agendamento/{{ $a->id }}" class="btn btn-sm btn-info">Consultar</a>

                            <form action="/agendamento/{{ $a->id }}" method="post">
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