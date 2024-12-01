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
                return response()->json(['error' => 'Usuário não autenticado'], 401);
            }

            // Validação da data e serviço
            $request->validate([
                'servico_ids' => 'required|array',
                'data_agendamento' => 'required|date',
            ]);

            // Obter todos os agendamentos do usuário na mesma semana
            $data_agendamento = \Carbon\Carbon::parse($request->data_agendamento);
            $inicio_semana = $data_agendamento->copy()->startOfWeek(); // Início da semana (segunda-feira)
            $fim_semana = $data_agendamento->copy()->endOfWeek(); // Fim da semana (domingo)

            $agendamentos_na_mesma_semana = Agendamento::where('usuario_id', $usuario_id)
                ->whereBetween('data_agendamento', [$inicio_semana, $fim_semana])
                ->get();

            // Se o usuário já tem mais de 1 agendamento na mesma semana
            if ($agendamentos_na_mesma_semana->count() >= 1) {
                // Pega a data do primeiro agendamento na semana
                $primeiro_agendamento = $agendamentos_na_mesma_semana->first()->data_agendamento;

            }

            // Caso não tenha, crie o agendamento normalmente
            Agendamento::create([
                'usuario_id' => $usuario_id,
                'servico_ids' => json_encode($request->servico_ids),
                'data_agendamento' => $request->data_agendamento,
            ]);

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
