<?php

namespace App\Http\Controllers;

use App\Models\GastosFixos;
use Illuminate\Http\Request;

class GastosFixosController extends Controller
{
    public function index()
    {
        $gastosFixos = GastosFixos::all();
        return view('gastos_fixos.index', compact('gastosFixos'));
    }

    public function create()
    {
        return view('gastos_fixos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'valor' => 'required|numeric',
            'categoria' => 'required|in:aluguel,salarios,energia,agua,internet,telefone,manutencao,seguros,publicidade',
            'data_vencimento' => 'required|date',
            'recorrencia' => 'required|in:mensal,anual,semanal,diaria',
        ]);

        GastosFixos::create($request->all()); 
        return redirect()->route('gastos_fixos.index')->with('success', 'Gasto fixo cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $gastoFixo = GastosFixos::findOrFail($id); 
        return view('gastos_fixos.edit', compact('gastoFixo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'valor' => 'required|numeric',
            'categoria' => 'required|in:aluguel,salarios,energia,agua,internet,telefone,manutencao,seguros,publicidade',
            'data_vencimento' => 'required|date',
            'recorrencia' => 'required|in:mensal,anual,semanal,diaria',
        ]);

        $gastoFixo = GastosFixos::findOrFail($id); 
        $gastoFixo->update($request->all()); 
        return redirect()->route('gastos_fixos.index')->with('success', 'Gasto fixo atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $gastoFixo = GastosFixos::findOrFail($id);
        $gastoFixo->delete(); 
        return redirect()->route('gastos_fixos.index')->with('success', 'Gasto fixo excluído com sucesso!');
    }
}
