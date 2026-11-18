@extends('layouts.app')

@section('title', 'Calendário')

@section('content')

<div class="page-header">
    <h1 class="h3 mb-0"><i class="bi bi-calendar3 text-primary"></i> Calendário de Agendamentos</h1>
    <div class="d-flex gap-2">
        <a href="{{ route('agendamento.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-list-ul"></i> Lista
        </a>
        <a href="{{ route('agendamento.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Novo Agendamento
        </a>
    </div>
</div>

<div class="card page-card">
    <div class="card-body">
        <div class="d-flex flex-wrap gap-2 mb-3 small">
            <span class="badge" style="background:#0d6efd">Agendado</span>
            <span class="badge" style="background:#20c997">Confirmado</span>
            <span class="badge" style="background:#fd7e14">Em andamento</span>
            <span class="badge" style="background:#198754">Concluído</span>
            <span class="badge" style="background:#dc3545">Cancelado</span>
            <span class="badge" style="background:#6c757d">Não compareceu</span>
        </div>
        <div id="calendario"></div>
    </div>
</div>

<div class="modal fade" id="modalAgendamento" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mTitulo">Agendamento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <dl class="row mb-0">
                    <dt class="col-4">Data/hora</dt>
                    <dd class="col-8" id="mQuando"></dd>
                    <dt class="col-4">Cliente</dt>
                    <dd class="col-8" id="mCliente"></dd>
                    <dt class="col-4">Telefone</dt>
                    <dd class="col-8" id="mTelefone"></dd>
                    <dt class="col-4">Moto</dt>
                    <dd class="col-8" id="mMoto"></dd>
                    <dt class="col-4">Placa</dt>
                    <dd class="col-8" id="mPlaca"></dd>
                    <dt class="col-4">Serviço</dt>
                    <dd class="col-8" id="mServico"></dd>
                    <dt class="col-4">Status</dt>
                    <dd class="col-8" id="mStatus"></dd>
                </dl>
            </div>
            <div class="modal-footer">
                <a href="#" id="mEditar" class="btn btn-warning">Editar</a>
                <a href="#" id="mConsultar" class="btn btn-info">Consultar</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.15/locales/pt-br.global.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendar = new FullCalendar.Calendar(document.getElementById('calendario'), {
            locale: 'pt-br',
            initialView: 'dayGridMonth',
            height: 'auto',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,listWeek'
            },
            events: "{{ route('agendamento.eventos') }}",
            eventTimeFormat: {
                hour: '2-digit',
                minute: '2-digit',
                hour12: false
            },
            eventClick: function(info) {
                info.jsEvent.preventDefault();
                var p = info.event.extendedProps;
                document.getElementById('mTitulo').textContent = info.event.title;
                document.getElementById('mQuando').textContent = info.event.start.toLocaleString('pt-BR', {
                    dateStyle: 'short',
                    timeStyle: 'short'
                });
                document.getElementById('mCliente').textContent = p.cliente;
                document.getElementById('mTelefone').textContent = p.telefone;
                document.getElementById('mMoto').textContent = p.moto;
                document.getElementById('mPlaca').textContent = p.placa;
                document.getElementById('mServico').textContent = p.servico;
                document.getElementById('mStatus').textContent = p.status;
                document.getElementById('mEditar').href = p.edit_url;
                document.getElementById('mConsultar').href = p.show_url;
                new bootstrap.Modal(document.getElementById('modalAgendamento')).show();
            }
        });
        calendar.render();
    });
</script>

@endsection