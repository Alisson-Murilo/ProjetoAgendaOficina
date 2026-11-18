<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    private function regras(): array
    {
        return [
            'nome'  => 'required|string|max:100',
            'preco' => 'required|numeric|min:0',
        ];
    }

    public function index(Request $request)
    {
        $servicos = Servico::query()
            ->when($request->q, fn($q, $t) => $q->where('nome', 'like', "%{$t}%"))
            ->orderBy('nome')
            ->paginate(10)
            ->withQueryString();

        return view('servico.index', compact('servicos'));
    }

    public function create()
    {
        return view('servico.form');
    }

    public function store(Request $request)
    {
        Servico::create($request->validate($this->regras()));

        return redirect()->route('servico.index')->with('success', 'Serviço cadastrado com sucesso.');
    }

    public function show(Servico $servico)
    {
        return view('servico.show', compact('servico'));
    }

    public function edit(Servico $servico)
    {
        return view('servico.form', compact('servico'));
    }

    public function update(Request $request, Servico $servico)
    {
        $servico->update($request->validate($this->regras()));

        return redirect()->route('servico.index')->with('success', 'Serviço atualizado com sucesso.');
    }

    public function destroy(Servico $servico)
    {
        $servico->delete();

        return redirect()->route('servico.index')->with('success', 'Serviço excluído com sucesso.');
    }
}
