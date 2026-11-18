@extends('layouts.app')

@section('title', 'Clientes')

@section('content')

<div class="page-header">
    <h1 class="h3 mb-0"><i class="bi bi-people-fill text-primary"></i> Clientes</h1>
    <a href="{{ route('cliente.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Novo Cliente
    </a>
</div>

<div class="card page-card">
    <div class="card-body">
        <form method="get" class="row g-2 mb-3">
            <div class="col-md-6 col-lg-4">
                <input type="search" name="q" value="{{ request('q') }}" class="form-control" placeholder="Buscar por nome ou telefone">
            </div>
            <div class="col-auto">
                <button class="btn btn-outline-primary"><i class="bi bi-search"></i> Buscar</button>
                @if (request('q'))
                <a href="{{ route('cliente.index') }}" class="btn btn-link">Limpar</a>
                @endif
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($clientes as $c)
                    <tr>
                        <td>{{ $c->id }}</td>
                        <td>{{ $c->nome }}</td>
                        <td>{{ $c->telefone }}</td>
                        <td class="text-end table-actions">
                            <a href="{{ route('cliente.show', $c) }}" class="btn btn-sm btn-outline-info" title="Consultar"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('cliente.edit', $c) }}" class="btn btn-sm btn-outline-warning" title="Editar"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('cliente.destroy', $c) }}" method="post" class="d-inline"
                                onsubmit="return confirm('Excluir o cliente {{ $c->nome }}?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" title="Excluir"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">Nenhum cliente encontrado.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">{{ $clientes->links() }}</div>
    </div>
</div>

@endsection