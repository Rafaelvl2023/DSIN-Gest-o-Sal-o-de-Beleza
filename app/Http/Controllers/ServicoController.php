<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use Illuminate\Http\Request;
use App\Models\Agendamento;

class ServicoController extends Controller
{
    public function index()
    {
        $agendamentos = Agendamento::paginate(5);
        $servicos = Servico::paginate(5);

        return view('servicos.index', compact('servicos','agendamentos'));
    }

    public function create()
    {
        return view('servicos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'duracao' => 'required|date_format:H:i',
            'preco' => 'required|string',
            'descricao' => 'nullable|string',
        ]);

        $preco = str_replace(['R$', ' ', '.'], '', $request->preco);
        $preco = floatval($preco);

        $duracao = $request->duracao;
        if (strpos($duracao, ':') === 2) {
            $duracao .= ':00';
        }

        Servico::create([
            'nome' => $request->nome,
            'duracao' => $duracao,
            'preco' => $preco,
            'descricao' => $request->descricao,
        ]);

        return redirect()->route('servicos.index')->with('success', 'Serviço cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $servico = Servico::findOrFail($id);
        return view('servicos.edit', compact('servico'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'duracao' => 'required|integer',
            'preco' => 'required|numeric',
        ]);

        $servico = Servico::findOrFail($id);
        $servico->update($request->all());

        return redirect()->route('servicos.index')->with('success', 'Serviço atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $servico = Servico::findOrFail($id);
        $servico->delete();

        return redirect()->route('servicos.index')->with('success', 'Serviço excluído com sucesso!');
    }
}
