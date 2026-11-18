@extends('layouts.app')

@section('title', 'Serviços')

@section('content')

<div class="page-header">
    <h1 class="h3 mb-0"><i class="bi bi-tools text-primary"></i> Serviços</h1>
    <a href="{{ route('servico.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Novo Serviço
    </a>
</div>

<div class="card page-card">
    <div class="card-body">
        <form method="get" class="row g-2 mb-3">
            <div class="col-md-6 col-lg-4">
                <input type="search" name="q" value="{{ request('q') }}" class="form-control" placeholder="Buscar por nome">
            </div>
            <div class="col-auto">
                <button class="btn btn-outline-primary"><i class="bi bi-search"></i> Buscar</button>
                @if (request('q'))
                <a href="{{ route('servico.index') }}" class="btn btn-link">Limpar</a>
                @endif
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Serviço</th>
                        <th>Preço</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($servicos as $s)
                    <tr>
                        <td>{{ $s->id }}</td>
                        <td>{{ $s->nome }}</td>
                        <td>R$ {{ number_format($s->preco, 2, ',', '.') }}</td>
                        <td class="text-end table-actions">
                            <a href="{{ route('servico.show', $s) }}" class="btn btn-sm btn-outline-info" title="Consultar"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('servico.edit', $s) }}" class="btn btn-sm btn-outline-warning" title="Editar"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('servico.destroy', $s) }}" method="post" class="d-inline"
                                onsubmit="return confirm('Excluir o serviço {{ $s->nome }}? Os agendamentos dele também serão excluídos.')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" title="Excluir"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">Nenhum serviço encontrado.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">{{ $servicos->links() }}</div>
    </div>
</div>

@endsection