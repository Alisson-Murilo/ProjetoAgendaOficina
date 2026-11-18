<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Moto;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MotoController extends Controller
{
    private function regras(?Moto $moto = null): array
    {
        return [
            'cliente_id' => 'required|exists:clientes,id',
            'marca'      => 'required|string|max:50',
            'modelo'     => 'required|string|max:50',
            'placa'      => ['required', 'string', 'max:10', Rule::unique('motos', 'placa')->ignore($moto?->id)],
        ];
    }

    public function index(Request $request)
    {
        $motos = Moto::with('cliente')
            ->when($request->q, fn($q, $t) => $q->where(
                fn($w) => $w->where('placa', 'like', "%{$t}%")
                    ->orWhere('marca', 'like', "%{$t}%")
                    ->orWhere('modelo', 'like', "%{$t}%")
                    ->orWhereHas('cliente', fn($c) => $c->where('nome', 'like', "%{$t}%"))
            ))
            ->orderBy('modelo')
            ->paginate(10)
            ->withQueryString();

        return view('moto.index', compact('motos'));
    }

    public function create()
    {
        $clientes = Cliente::orderBy('nome')->get();

        return view('moto.form', compact('clientes'));
    }

    public function store(Request $request)
    {
        $dados = $request->validate($this->regras());
        $dados['placa'] = strtoupper($dados['placa']);

        Moto::create($dados);

        return redirect()->route('moto.index')->with('success', 'Moto cadastrada com sucesso.');
    }

    public function show(Moto $moto)
    {
        return view('moto.show', compact('moto'));
    }

    public function edit(Moto $moto)
    {
        $clientes = Cliente::orderBy('nome')->get();

        return view('moto.form', compact('moto', 'clientes'));
    }

    public function update(Request $request, Moto $moto)
    {
        $dados = $request->validate($this->regras($moto));
        $dados['placa'] = strtoupper($dados['placa']);

        $moto->update($dados);

        return redirect()->route('moto.index')->with('success', 'Moto atualizada com sucesso.');
    }

    public function destroy(Moto $moto)
    {
        $moto->delete();

        return redirect()->route('moto.index')->with('success', 'Moto excluída com sucesso.');
    }
}
