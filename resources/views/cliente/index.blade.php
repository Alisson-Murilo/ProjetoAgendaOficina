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
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach($clientes as $c)
                    <tr>
                        <td>{{ $c->id }}</td>
                        <td>{{ $c->nome }}</td>
                        <td>{{ $c->telefone }}</td>
                        <td class="d-flex gap-2">
                            <a href="/cliente/{{ $c->id }}/edit" class="btn btn-sm btn-warning">Editar</a>
                            <a href="/cliente/{{ $c->id }}" class="btn btn-sm btn-info">Consultar</a>

                            <form action="/cliente/{{ $c->id }}" method="post">
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
        </div>
    </div>
</div>
 
@endsection
