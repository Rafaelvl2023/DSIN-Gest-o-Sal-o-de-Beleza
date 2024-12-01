<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Servico;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AgendamentoController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;

        $agendamentos = Agendamento::where('usuario_id', $userId)->paginate(5);

        $servicos = Servico::paginate(10);

        return view('agendamentos.index', compact('agendamentos', 'servicos'));
    }

    public function create()
    {
        $servicos = Servico::all();
        return view('agendamentos.create', compact('servicos'));
    }

    public function store(Request $request)
    {
        try {
            if (Auth::check()) {
                $usuario_id = Auth::user()->id;
            } else {
                return response()->json(['error' => 'Usuário não autenticado'], 401);
            }

            $request->validate([
                'servico_ids' => 'required|array',
                'data_agendamento' => 'required|date',
            ]);

            $data_agendamento = Carbon::parse($request->data_agendamento);
            $inicio_semana = $data_agendamento->copy()->startOfWeek();
            $fim_semana = $data_agendamento->copy()->endOfWeek();

            $agendamentos_na_mesma_semana = Agendamento::where('usuario_id', $usuario_id)
                ->whereBetween('data_agendamento', [$inicio_semana, $fim_semana])
                ->get();

            if ($agendamentos_na_mesma_semana->count() >= 1) {
                $primeiro_agendamento = Carbon::parse($agendamentos_na_mesma_semana->first()->data_agendamento);

                $responseData = [
                    "modal" => true,
                    "sugestao_data" => $primeiro_agendamento->addDay()->toDateTimeString(),
                    "message" => "Você tem agendamentos na mesma semana. Gostaria de agendar na mesma data do primeiro agendamento?"
                ];

                session()->flash('responseData', $responseData);

                return redirect()->route('agendamentos.index');
            }

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
        $data_agendamento = Carbon::parse($agendamento->data_agendamento);
        $data_atual = Carbon::now();

        if ($data_agendamento->diffInDays($data_atual) <= 2) {
            return redirect()->route('agendamentos.index')->with('error', 'Não é possível editar agendamentos com menos de 2 dias de antecedência.');
        }

        $servicos = Servico::all();
        return view('agendamentos.edit', compact('agendamento', 'servicos'));
    }

    public function update(Request $request, Agendamento $agendamento)
    {
        if (Auth::check()) {
            $usuario_id = Auth::user()->id;
        } else {
            return response()->json(['error' => 'Usuário não autenticado'], 401);
        }

        $data_agendamento = Carbon::parse($agendamento->data_agendamento);
        $data_atual = Carbon::now();

        if ($data_agendamento->diffInDays($data_atual) <= 2 && $request->data_agendamento != $agendamento->data_agendamento) {
            return redirect()->route('agendamentos.index')->with('error', 'Não é possível alterar a data do agendamento com menos de 2 dias de antecedência. Caso precise de ajuda, entre em contato pelo WhatsApp :)');
        }

        $validated = $request->validate([
            'data_agendamento' => 'required|date',
        ]);

        $agendamento->update([
            'usuario_id' => $usuario_id,
            'data_agendamento' => $request->data_agendamento,
        ]);

        return redirect()->route('agendamentos.index')->with('success', 'Data do agendamento atualizada com sucesso!');
    }

    public function destroy(Agendamento $agendamento)
    {
        $agendamento->delete();
        return redirect()->route('agendamentos.index')->with('success', 'Agendamento excluído com sucesso!');
    }

    public function getAllServicos()
    {
        $servicos = Servico::all();

        return view('agendamentos', compact('servicos'));
    }
}
