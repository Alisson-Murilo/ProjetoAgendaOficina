<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Agendamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Editar Agendamento</h1>
        <form action="{{ route('agendamento.update', $agendamento->id) }}" method="post">
            @CSRF
            @method('PUT')
            <div class="mb-3">
                <label for="moto_id" class="form-label">Moto</label>
                <select id="moto_id" name="moto_id" class="form-select" required="">
                    @foreach ($motos as $m)
                        <option value="{{ $m->id }}" {{ $agendamento->moto_id == $m->id ? 'selected' : '' }}>
                            {{ $m->marca }} - {{ $m->modelo }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="servico_id" class="form-label">Serviço</label>
                <select id="servico_id" name="servico_id" class="form-select" required="">
                    @foreach ($servicos as $s)
                        <option value="{{ $s->id }}" {{ $agendamento->servico_id == $s->id ? 'selected' : ''}}>
                            {{ $s->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="data" class="form-label">Data</label>
                <input type="date" id="data" name="data" class="form-control" required="" value="{{ $agendamento->data }}">
            </div>
            <div class="mb-3">
                <label for="horario" class="form-label">horario</label>
                <input type="time" id="horario" name="horario" class="form-control" required="" value="{{ $agendamento->horario }}">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select id="status" name="status" class="form-select" required="" value="{{ $agendamento->status }}">
                    @foreach ($statusOptions as $value => $label)
                        <option value="{{ $value }}" {{ old('status', 'agendado') == $value ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>