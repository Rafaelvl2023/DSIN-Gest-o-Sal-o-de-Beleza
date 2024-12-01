<?php

namespace App\Http\Controllers;

use App\Models\GastosFixos;
use Illuminate\Http\Request;

class GastosFixosController extends Controller
{
    public function index()
    {
        $gastosFixos = GastosFixos::paginate(5);

        return view('gastos_fixos.index', compact('gastosFixos'));
    }

    // Exibe o formulário para criar um novo gasto fixo
    public function create()
    {
        return view('gastos_fixos.create');
    }

    // Salva um novo gasto fixo
    public function store(Request $request)
    {
        // Valida os dados do formulário
        $request->validate([
            'nome' => 'required|string|max:255',
            'valor' => 'required|string',
            'categoria' => 'required|in:aluguel,salarios,energia,agua,internet,telefone,manutencao,seguros,publicidade',
            'data_vencimento' => 'required|date',
            'recorrencia' => 'required|in:mensal,anual,semanal,diaria',
            'descricao' => 'nullable|string',
        ]);

        // Remove o símbolo de 'R$' e o espaço do valor e converte a vírgula para ponto
        $valor = str_replace(['R$', ' '], '', $request->valor);
        $valor = str_replace(',', '.', $valor);

        // Cria o novo gasto fixo
        GastosFixos::create([
            'nome' => $request->nome,
            'valor' => $valor,
            'categoria' => $request->categoria,
            'data_vencimento' => $request->data_vencimento,
            'recorrencia' => $request->recorrencia,
            'descricao' => $request->descricao,
        ]);

        // Redireciona para a lista de gastos fixos com uma mensagem de sucesso
        return redirect()->route('gastos_fixos.index')->with('success', 'Gasto fixo cadastrado com sucesso!');
    }

    // Exibe o formulário para editar um gasto fixo
    public function edit($id)
    {
        // Encontra o gasto fixo pelo id
        $gastoFixo = GastosFixos::findOrFail($id);

        // Retorna a view de edição com o gasto fixo
        return view('gastos_fixos.edit', compact('gastoFixo'));
    }

    // Atualiza os dados de um gasto fixo
    public function update(Request $request, $id)
    {
        // Valida os dados do formulário
        $request->validate([
            'nome' => 'required|string|max:255',
            'valor' => 'required|numeric',
            'categoria' => 'required|in:aluguel,salarios,energia,agua,internet,telefone,manutencao,seguros,publicidade',
            'data_vencimento' => 'required|date',
            'recorrencia' => 'required|in:mensal,anual,semanal,diaria',
        ]);

        // Encontra o gasto fixo pelo id
        $gastoFixo = GastosFixos::findOrFail($id);

        // Atualiza o gasto fixo com os dados do formulário
        $gastoFixo->update($request->all());

        // Redireciona para a lista de gastos fixos com uma mensagem de sucesso
        return redirect()->route('gastos_fixos.index')->with('success', 'Gasto fixo atualizado com sucesso!');
    }

    // Deleta um gasto fixo
    public function destroy($id)
    {
        // Encontra o gasto fixo pelo id
        $gastoFixo = GastosFixos::findOrFail($id);

        // Exclui o gasto fixo
        $gastoFixo->delete();

        // Redireciona para a lista de gastos fixos com uma mensagem de sucesso
        return redirect()->route('gastos_fixos.index')->with('success', 'Gasto fixo excluído com sucesso!');
    }
}
