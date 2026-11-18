@extends('layouts.app')

@section('title', isset($cliente) ? 'Editar Cliente' : 'Novo Cliente')

@section('content')
@php $editando = isset($cliente); @endphp

<div class="page-header">
    <h1 class="h3 mb-0"><i class="bi bi-people-fill text-primary"></i> {{ $editando ? 'Editar Cliente' : 'Novo Cliente' }}</h1>
    <a href="{{ route('cliente.index') }}" class="btn btn-outline-secondary"><i class="bi bi-arrow-left"></i> Voltar</a>
</div>

<div class="card page-card">
    <div class="card-body">
        <form method="post" action="{{ $editando ? route('cliente.update', $cliente) : route('cliente.store') }}">
            @csrf
            @if ($editando) @method('PUT') @endif

            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" id="nome" name="nome" value="{{ old('nome', $cliente->nome ?? '') }}"
                    class="form-control @error('nome') is-invalid @enderror" required>
                @error('nome') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" id="telefone" name="telefone" value="{{ old('telefone', $cliente->telefone ?? '') }}"
                    class="form-control @error('telefone') is-invalid @enderror" required>
                @error('telefone') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg"></i> Salvar</button>
                <a href="{{ route('cliente.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>

@endsection