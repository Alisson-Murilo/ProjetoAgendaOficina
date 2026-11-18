@extends('layouts.app')

@section('title', 'Motos')

@section('content')

<div class="page-header">
    <h1 class="h3 mb-0"><i class="fa-solid fa-motorcycle text-primary"></i> Motos</h1>
    <a href="{{ route('moto.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Nova Moto
    </a>
</div>

<div class="card page-card">
    <div class="card-body">
        <form method="get" class="row g-2 mb-3">
            <div class="col-md-6 col-lg-4">
                <input type="search" name="q" value="{{ request('q') }}" class="form-control" placeholder="Buscar por placa, modelo ou cliente">
            </div>
            <div class="col-auto">
                <button class="btn btn-outline-primary"><i class="bi bi-search"></i> Buscar</button>
                @if (request('q'))
                <a href="{{ route('moto.index') }}" class="btn btn-link">Limpar</a>
                @endif
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Placa</th>
                        <th>Moto</th>
                        <th>Cliente</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($motos as $m)
                    <tr>
                        <td><span class="badge text-bg-dark">{{ $m->placa }}</span></td>
                        <td>{{ $m->marca }} {{ $m->modelo }}</td>
                        <td>{{ $m->cliente->nome ?? '-' }}</td>
                        <td class="text-end table-actions">
                            <a href="{{ route('moto.show', $m) }}" class="btn btn-sm btn-outline-info" title="Consultar"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('moto.edit', $m) }}" class="btn btn-sm btn-outline-warning" title="Editar"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('moto.destroy', $m) }}" method="post" class="d-inline"
                                onsubmit="return confirm('Excluir a moto {{ $m->placa }}? Os agendamentos dela também serão excluídos.')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" title="Excluir"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">Nenhuma moto encontrada.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">{{ $motos->links() }}</div>
    </div>
</div>

@endsection