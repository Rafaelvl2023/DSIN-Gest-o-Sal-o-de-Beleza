<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GastosVariados; 

class GastosVariadosController extends Controller
{
    public function index()
    {
        $gastosVariados = GastosVariado::all(); 
        return view('gastos_variados.index', compact('gastosVariados')); 
    }

    public function create()
    {
        return view('gastos_variados.create'); 
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'valor' => 'required|numeric',
            'categoria' => 'required|in:compras,despesas_imprevistas,alimentacao,transporte,manutencao,saude,educacao,diversao,cultura,viagem,presentes,comunicacao,impostos,outros',
            'data' => 'required|date',
            'descricao' => 'nullable|string',
        ]);

        GastosVariado::create($validated);

        return redirect()->route('gastos_variados.index')->with('success', 'Gasto variado cadastrado com sucesso!');
    }

    public function show(GastosVariado $gastoVariado)
    {
        return view('gastos_variados.show', compact('gastoVariado')); 
    }

    public function edit(GastosVariado $gastoVariado)
    {
        return view('gastos_variados.edit', compact('gastoVariado')); 
    }

    public function update(Request $request, GastosVariado $gastoVariado)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'valor' => 'required|numeric',
            'categoria' => 'required|in:compras,despesas_imprevistas,alimentacao,transporte,manutencao,saude,educacao,diversao,cultura,viagem,presentes,comunicacao,impostos,outros',
            'data' => 'required|date',
            'descricao' => 'nullable|string',
        ]);

        $gastoVariado->update($validated);

        return redirect()->route('gastos_variados.index')->with('success', 'Gasto variado atualizado com sucesso!');
    }

    public function destroy(GastosVariado $gastoVariado)
    {
        $gastoVariado->delete();

        return redirect()->route('gastos_variados.index')->with('success', 'Gasto variado excluído com sucesso!');
    }
}
