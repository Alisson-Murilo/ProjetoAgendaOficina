@extends('layouts.app')

@section('title', isset($agendamento) ? 'Editar Agendamento' : 'Novo Agendamento')

@section('content')
@php $editando = isset($agendamento); @endphp

<div class="page-header">
    <h1 class="h3 mb-0"><i class="bi bi-calendar2-check-fill text-primary"></i> {{ $editando ? 'Editar Agendamento' : 'Novo Agendamento' }}</h1>
    <a href="{{ route('agendamento.index') }}" class="btn btn-outline-secondary"><i class="bi bi-arrow-left"></i> Voltar</a>
</div>

<div class="card page-card">
    <div class="card-body">
        <form method="post" action="{{ $editando ? route('agendamento.update', $agendamento) : route('agendamento.store') }}">
            @csrf
            @if ($editando) @method('PUT') @endif

            <div class="mb-3">
                <label for="moto_id" class="form-label">Moto</label>
                <select id="moto_id" name="moto_id" class="form-select @error('moto_id') is-invalid @enderror" required>
                    <option value="">Selecione...</option>
                    @foreach ($motos as $m)
                    <option value="{{ $m->id }}" @selected(old('moto_id', $agendamento->moto_id ?? '') == $m->id)>
                        {{ $m->placa }} — {{ $m->marca }} {{ $m->modelo }} ({{ $m->cliente->nome ?? 'sem cliente' }})
                    </option>
                    @endforeach
                </select>
                @error('moto_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="servico_id" class="form-label">Serviço</label>
                <select id="servico_id" name="servico_id" class="form-select @error('servico_id') is-invalid @enderror" required>
                    <option value="">Selecione...</option>
                    @foreach ($servicos as $s)
                    <option value="{{ $s->id }}" @selected(old('servico_id', $agendamento->servico_id ?? '') == $s->id)>{{ $s->nome }}</option>
                    @endforeach
                </select>
                @error('servico_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="data" class="form-label">Data</label>
                    <input type="date" id="data" name="data"
                        value="{{ old('data', $editando ? $agendamento->data->format('Y-m-d') : '') }}"
                        class="form-control @error('data') is-invalid @enderror" required>
                    @error('data') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="horario" class="form-label">Horário</label>
                    <input type="time" id="horario" name="horario"
                        value="{{ old('horario', $editando ? substr($agendamento->horario, 0, 5) : '') }}"
                        class="form-control @error('horario') is-invalid @enderror" required>
                    @error('horario') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-4">
                <label for="status" class="form-label">Status</label>
                <select id="status" name="status" class="form-select @error('status') is-invalid @enderror" required>
                    @foreach ($statusOptions as $valor => $rotulo)
                    <option value="{{ $valor }}" @selected(old('status', $agendamento->status ?? 'agendado') == $valor)>{{ $rotulo }}</option>
                    @endforeach
                </select>
                @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg"></i> Salvar</button>
                <a href="{{ route('agendamento.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>

@endsection