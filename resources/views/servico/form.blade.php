@extends('layouts.app')

@section('title', isset($servico) ? 'Editar Serviço' : 'Novo Serviço')

@section('content')
@php $editando = isset($servico); @endphp

<div class="page-header">
    <h1 class="h3 mb-0"><i class="bi bi-tools text-primary"></i> {{ $editando ? 'Editar Serviço' : 'Novo Serviço' }}</h1>
    <a href="{{ route('servico.index') }}" class="btn btn-outline-secondary"><i class="bi bi-arrow-left"></i> Voltar</a>
</div>

<div class="card page-card">
    <div class="card-body">
        <form method="post" action="{{ $editando ? route('servico.update', $servico) : route('servico.store') }}">
            @csrf
            @if ($editando) @method('PUT') @endif

            <div class="mb-3">
                <label for="nome" class="form-label">Nome do serviço</label>
                <input type="text" id="nome" name="nome" value="{{ old('nome', $servico->nome ?? '') }}"
                    class="form-control @error('nome') is-invalid @enderror" required>
                @error('nome') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
                <label for="preco" class="form-label">Preço (R$)</label>
                <input type="number" step="0.01" min="0" id="preco" name="preco" value="{{ old('preco', $servico->preco ?? '') }}"
                    class="form-control @error('preco') is-invalid @enderror" required>
                @error('preco') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg"></i> Salvar</button>
                <a href="{{ route('servico.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>

@endsection