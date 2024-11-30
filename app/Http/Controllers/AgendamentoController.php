<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Servico;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgendamentoController extends Controller
{
    public function index()
    {
        // Obtendo o ID do usuário logado
        $userId = Auth::user()->id;

        // Filtrando os agendamentos do usuário logado
        $agendamentos = Agendamento::where('usuario_id', $userId)->paginate(10);

        // Carregando os serviços (sem filtro de usuário)
        $servicos = Servico::paginate(10);

        // Retornando a view com os agendamentos filtrados e os serviços
        return view('agendamentos', compact('agendamentos', 'servicos'));
    }

    public function buscaServicos()
    {
        // Obtém todos os serviços cadastrados
        $servicos = Servico::all();

        // Exibe os dados para depuração
        dd($servicos);

        // Retorna a view com os serviços (não será executado enquanto o dd existir)
        return view('agendamentos', compact('servicos'));
    }

    public function create()
    {
        $servicos = Servico::all();
        return view('agendamentos.create', compact('servicos'));
    }
    // dd(Auth::user()->id);  // Exibe o ID do usuário logado
    // dd(Auth::user()); // Verifique se o usuário está autenticado
    // dd('cheguei aqui'); // Verifique se chega até aqui

    // $usuario_id = Auth::user()->id; // Atribuição do ID do usuário logado
    // dd($usuario_id);
    public function store(Request $request)
    {
        try {
            if (Auth::check()) {
                $usuario_id = Auth::user()->id;
            } else {
                dd('Usuário não autenticado');
            }

            $request->validate([
                'servico_ids' => 'required|array',
                'data_agendamento' => 'required|date',
            ]);

            Agendamento::create([
                'usuario_id' => $usuario_id,
                'servico_ids' => json_encode($request->servico_ids),
                'data_agendamento' => $request->data_agendamento,
            ]);
            // dd($request->all());

            return redirect()->route('agendamentos.index')->with('success', 'Agendamento criado com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao criar agendamento: ' . $e->getMessage());
        }
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
