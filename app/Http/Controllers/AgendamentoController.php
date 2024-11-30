<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Servico;
use App\Models\Usuarios;
use Illuminate\Http\Request;

class AgendamentoController extends Controller
{
    public function index()
    {
        $agendamentos = Agendamento::with('usuario', 'servicos')->get();
        return view('agendamentos', compact('agendamentos'));
    }

    public function create()
    {
        $servicos = Servico::all();
        return view('agendamentos.create', compact('servicos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'servico_ids' => 'required|array',
            'data_agendamento' => 'required|date',
            'status' => 'required|in:pendente,confirmado,cancelado',
            'observacoes' => 'nullable|string',
        ]);

        Agendamento::create([
            'usuario_id' => $request->usuario_id,
            'servico_ids' => json_encode($request->servico_ids),
            'data_agendamento' => $request->data_agendamento,
            'status' => $request->status,
            'observacoes' => $request->observacoes,
        ]);

        return redirect()->route('agendamentos.index')->with('success', 'Agendamento criado com sucesso!');
    }

    public function edit(Agendamento $agendamento)
    {
        $servicos = Servico::all();
        return view('agendamentos.edit', compact('agendamento', 'servicos'));
    }

    public function update(Request $request, Agendamento $agendamento)
    {
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'servico_ids' => 'required|array',
            'data_agendamento' => 'required|date',
            'status' => 'required|in:pendente,confirmado,cancelado',
            'observacoes' => 'nullable|string',
        ]);

        $agendamento->update([
            'usuario_id' => $request->usuario_id,
            'servico_ids' => json_encode($request->servico_ids),
            'data_agendamento' => $request->data_agendamento,
            'status' => $request->status,
            'observacoes' => $request->observacoes,
        ]);

        return redirect()->route('agendamentos.index')->with('success', 'Agendamento atualizado com sucesso!');
    }

    public function destroy(Agendamento $agendamento)
    {
        $agendamento->delete();
        return redirect()->route('agendamentos.index')->with('success', 'Agendamento excluído com sucesso!');
    }

    public function getAllServicos()
    {
        // Busca todos os serviços cadastrados no banco de dados
        $servicos = Servico::all();

        // Retorna os serviços para uma view ou como resposta JSON
        return view('agendamentos', compact('servicos')); // Para uma view
        // return response()->json($servicos); // Caso queira retornar como JSON
    }
}
