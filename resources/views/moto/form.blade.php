@extends('layouts.app')

@section('title', isset($moto) ? 'Editar Moto' : 'Nova Moto')

@section('content')
@php $editando = isset($moto); @endphp

<div class="page-header">
    <h1 class="h3 mb-0"><i class="fa-solid fa-motorcycle text-primary"></i> {{ $editando ? 'Editar Moto' : 'Nova Moto' }}</h1>
    <a href="{{ route('moto.index') }}" class="btn btn-outline-secondary"><i class="bi bi-arrow-left"></i> Voltar</a>
</div>

<div class="card page-card">
    <div class="card-body">
        <form method="post" action="{{ $editando ? route('moto.update', $moto) : route('moto.store') }}">
            @csrf
            @if ($editando) @method('PUT') @endif

            <div class="mb-3">
                <label for="cliente_id" class="form-label">Cliente</label>
                <select id="cliente_id" name="cliente_id" class="form-select @error('cliente_id') is-invalid @enderror" required>
                    <option value="">Selecione...</option>
                    @foreach ($clientes as $c)
                    <option value="{{ $c->id }}" @selected(old('cliente_id', $moto->cliente_id ?? '') == $c->id)>{{ $c->nome }}</option>
                    @endforeach
                </select>
                @error('cliente_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="marca" class="form-label">Marca</label>
                    <input type="text" id="marca" name="marca" value="{{ old('marca', $moto->marca ?? '') }}"
                        class="form-control @error('marca') is-invalid @enderror" required>
                    @error('marca') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="modelo" class="form-label">Modelo</label>
                    <input type="text" id="modelo" name="modelo" value="{{ old('modelo', $moto->modelo ?? '') }}"
                        class="form-control @error('modelo') is-invalid @enderror" required>
                    @error('modelo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-4">
                <label for="placa" class="form-label">Placa</label>
                <input type="text" id="placa" name="placa" value="{{ old('placa', $moto->placa ?? '') }}"
                    class="form-control text-uppercase @error('placa') is-invalid @enderror" maxlength="10" required>
                @error('placa') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg"></i> Salvar</button>
                <a href="{{ route('moto.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>

@endsection