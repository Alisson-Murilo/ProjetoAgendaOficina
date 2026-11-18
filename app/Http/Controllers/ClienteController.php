<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    private function regras(): array
    {
        return [
            'nome'     => 'required|string|max:100',
            'telefone' => 'required|string|max:20',
        ];
    }

    public function index(Request $request)
    {
        $clientes = Cliente::query()
            ->when($request->q, fn($q, $t) => $q->where(
                fn($w) => $w->where('nome', 'like', "%{$t}%")->orWhere('telefone', 'like', "%{$t}%")
            ))
            ->orderBy('nome')
            ->paginate(10)
            ->withQueryString();

        return view('cliente.index', compact('clientes'));
    }

    public function create()
    {
        return view('cliente.form');
    }

    public function store(Request $request)
    {
        Cliente::create($request->validate($this->regras()));

        return redirect()->route('cliente.index')->with('success', 'Cliente cadastrado com sucesso.');
    }

    public function show(Cliente $cliente)
    {
        return view('cliente.show', compact('cliente'));
    }

    public function edit(Cliente $cliente)
    {
        return view('cliente.form', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $cliente->update($request->validate($this->regras()));

        return redirect()->route('cliente.index')->with('success', 'Cliente atualizado com sucesso.');
    }

    public function destroy(Cliente $cliente)
    {
        try {
            $cliente->delete();
        } catch (QueryException $e) {
            return redirect()->route('cliente.index')
                ->withErrors('Não foi possível excluir: há registros vinculados a este cliente.');
        }

        return redirect()->route('cliente.index')->with('success', 'Cliente excluído com sucesso.');
    }
}
