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
        // Pega todos os serviços cadastrados
        $servicos = Servico::paginate(5); // 10 itens por página

        // Retorna a view do dashboard com os dados dos serviços
        return view('dashboard', compact('servicos','agendamentos'));  // compact('servicos') deve passar a variável corretamente
    }

    public function create()
    {
        return view('servicos.create');
    }

    public function store(Request $request)
    {
        // Validação dos dados de entrada
        $request->validate([
            'nome' => 'required|string|max:255',
            'duracao' => 'required|date_format:H:i',
            'preco' => 'required|string',
            'descricao' => 'nullable|string',
        ]);

        // Processa o preço para garantir que esteja no formato correto
        $preco = str_replace(['R$', ' ', '.'], '', $request->preco);
        $preco = floatval($preco);

        // Corrige a duração para o formato correto
        $duracao = $request->duracao;
        if (strpos($duracao, ':') === 2) {
            $duracao .= ':00';
        }

        // Criação do serviço
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
