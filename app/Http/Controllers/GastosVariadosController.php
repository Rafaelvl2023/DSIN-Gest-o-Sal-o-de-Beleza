<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GastosVariados;

class GastosVariadosController extends Controller
{
    public function index()
    {
        $gastosVariados = GastosVariados::paginate(5);

        return view('gastos_variados.index', compact('gastosVariados'));
    }

    public function create()
    {
        return view('gastos_variados.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'valor' => 'required|string',
            'categoria' => 'required|in:compras,despesas_imprevistas,alimentacao,transporte,manutencao,saude,educacao,diversao,cultura,viagem,presentes,comunicacao,impostos,outros',
            'data' => 'required|date',
            'descricao' => 'nullable|string',
        ]);

        $valor = str_replace(['R$', ' '], '', $request->valor);
        $valor = str_replace(',', '.', $valor);

        GastosVariados::create([
            'nome' => $request->nome,
            'valor' => $valor,
            'categoria' => $request->categoria,
            'data' => $request->data,
            'descricao' => $request->descricao,
        ]);

        return redirect()->route('gastos_variados.index');
    }


    public function show(GastosVariados $gastoVariado)
    {
        return view('gastos_variados.show', compact('gastoVariado'));
    }

    public function edit(GastosVariados $gastoVariado)
    {
        return view('gastos_variados.edit', compact('gastoVariado'));
    }

    public function update(Request $request, GastosVariados $gastoVariado)
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

    public function destroy(GastosVariados $gastoVariado)
    {
        $gastoVariado->delete();

        return redirect()->route('gastos_variados.index')->with('success', 'Gasto variado excluído com sucesso!');
    }
}
