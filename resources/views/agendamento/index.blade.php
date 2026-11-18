@extends('layouts.app')

@section('title', 'Agendamentos')

@section('content')

<div class="page-header">
    <h1 class="h3 mb-0"><i class="bi bi-calendar2-check-fill text-primary"></i> Agendamentos</h1>
    <div class="d-flex gap-2">
        <a href="{{ route('agendamento.calendario') }}" class="btn btn-outline-primary">
            <i class="bi bi-calendar3"></i> Calendário
        </a>
        <a href="{{ route('agendamento.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Novo Agendamento
        </a>
    </div>
</div>

<div class="card page-card">
    <div class="card-body">
        <form method="get" class="row g-2 mb-3">
            <div class="col-md-5 col-lg-4">
                <input type="search" name="q" value="{{ request('q') }}" class="form-control" placeholder="Buscar por placa, modelo ou cliente">
            </div>
            <div class="col-md-4 col-lg-3">
                <select name="status" class="form-select">
                    <option value="">Todos os status</option>
                    @foreach ($statusOptions as $valor => $rotulo)
                    <option value="{{ $valor }}" @selected(request('status')===$valor)>{{ $rotulo }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto">
                <button class="btn btn-outline-primary"><i class="bi bi-search"></i> Filtrar</button>
                @if (request('q') || request('status'))
                <a href="{{ route('agendamento.index') }}" class="btn btn-link">Limpar</a>
                @endif
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Moto</th>
                        <th>Cliente</th>
                        <th>Serviço</th>
                        <th>Status</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($agendamentos as $a)
                    <tr>
                        <td>{{ $a->data->format('d/m/Y') }}</td>
                        <td>{{ substr($a->horario, 0, 5) }}</td>
                        <td>{{ $a->moto->modelo ?? '-' }} <span class="text-muted small">{{ $a->moto->placa ?? '' }}</span></td>
                        <td>{{ $a->moto->cliente->nome ?? '-' }}</td>
                        <td>{{ $a->servico->nome ?? '-' }}</td>
                        <td><span class="badge text-bg-{{ $a->status_cor }}">{{ $a->status_label }}</span></td>
                        <td class="text-end table-actions">
                            <a href="{{ route('agendamento.show', $a) }}" class="btn btn-sm btn-outline-info" title="Consultar"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('agendamento.edit', $a) }}" class="btn btn-sm btn-outline-warning" title="Editar"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('agendamento.destroy', $a) }}" method="post" class="d-inline"
                                onsubmit="return confirm('Excluir este agendamento?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" title="Excluir"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">Nenhum agendamento encontrado.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">{{ $agendamentos->links() }}</div>
    </div>
</div>

@endsection