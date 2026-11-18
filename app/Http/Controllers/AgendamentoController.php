<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Moto;
use App\Models\Servico;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

class AgendamentoController extends Controller
{
    private function regras(): array
    {
        return [
            'moto_id'    => 'required|exists:motos,id',
            'servico_id' => 'required|exists:servicos,id',
            'data'       => 'required|date',
            'horario'    => 'required|date_format:H:i',
            'status'     => ['required', Rule::in(array_keys(Agendamento::STATUS))],
        ];
    }

    private function opcoes(): array
    {
        return [
            'motos'         => Moto::with('cliente')->orderBy('modelo')->get(),
            'servicos'      => Servico::orderBy('nome')->get(),
            'statusOptions' => Agendamento::STATUS,
        ];
    }

    public function index(Request $request)
    {
        $agendamentos = Agendamento::with('moto.cliente', 'servico')
            ->when($request->status, fn($q, $s) => $q->where('status', $s))
            ->when($request->q, fn($q, $t) => $q->whereHas(
                'moto',
                fn($m) => $m
                    ->where('placa', 'like', "%{$t}%")
                    ->orWhere('modelo', 'like', "%{$t}%")
                    ->orWhereHas('cliente', fn($c) => $c->where('nome', 'like', "%{$t}%"))
            ))
            ->orderByDesc('data')
            ->orderBy('horario')
            ->paginate(10)
            ->withQueryString();

        $statusOptions = Agendamento::STATUS;

        return view('agendamento.index', compact('agendamentos', 'statusOptions'));
    }

    public function create()
    {
        return view('agendamento.form', $this->opcoes());
    }

    public function store(Request $request)
    {
        Agendamento::create($request->validate($this->regras()));

        return redirect()->route('agendamento.index')->with('success', 'Agendamento criado com sucesso.');
    }

    public function show(Agendamento $agendamento)
    {
        return view('agendamento.show', compact('agendamento'));
    }

    public function edit(Agendamento $agendamento)
    {
        return view('agendamento.form', $this->opcoes() + compact('agendamento'));
    }

    public function update(Request $request, Agendamento $agendamento)
    {
        $agendamento->update($request->validate($this->regras()));

        return redirect()->route('agendamento.index')->with('success', 'Agendamento atualizado com sucesso.');
    }

    public function destroy(Agendamento $agendamento)
    {
        $agendamento->delete();

        return redirect()->route('agendamento.index')->with('success', 'Agendamento excluído com sucesso.');
    }

    public function calendario()
    {
        return view('agendamento.calendario');
    }

    public function eventos()
    {
        $cores = [
            'agendado'       => '#0d6efd',
            'confirmado'     => '#20c997',
            'em_andamento'   => '#fd7e14',
            'concluido'      => '#198754',
            'cancelado'      => '#dc3545',
            'nao_compareceu' => '#6c757d',
        ];

        $eventos = Agendamento::with('moto.cliente', 'servico')->get()->map(function ($a) use ($cores) {
            $data = Carbon::parse($a->data)->format('Y-m-d');
            $hora = $a->horario ? substr($a->horario, 0, 5) : null;

            return [
                'id'     => $a->id,
                'title'  => ($a->moto->modelo ?? 'Moto') . ' - ' . ($a->servico->nome ?? 'Serviço'),
                'start'  => $hora ? "{$data}T{$hora}" : $data,
                'allDay' => ! $hora,
                'color'  => $cores[$a->status] ?? '#0d6efd',
                'extendedProps' => [
                    'cliente'  => $a->moto->cliente->nome ?? '-',
                    'telefone' => $a->moto->cliente->telefone ?? '-',
                    'moto'     => trim(($a->moto->marca ?? '') . ' ' . ($a->moto->modelo ?? '')),
                    'placa'    => $a->moto->placa ?? '-',
                    'servico'  => $a->servico->nome ?? '-',
                    'status'   => $a->status_label,
                    'show_url' => route('agendamento.show', $a->id),
                    'edit_url' => route('agendamento.edit', $a->id),
                ],
            ];
        });

        return response()->json($eventos);
    }
}
