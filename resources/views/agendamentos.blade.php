<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamentos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url(https://institutoanahickmann.com.br/wp-content/uploads/2021/11/cab.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }
        .form-container {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="form-container mx-auto">
            <h1 class="text-center mb-4">Agendamento de Serviço</h1>

            <form method="POST" action="{{ route('agendamentos.store') }}">
                @csrf

                <input type="hidden" name="usuario_id" value="{{ Auth::user()->id }}">

                <div class="form-group">
                    <label>Serviços</label><br>
                    @foreach($servicos as $servico)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="servico_ids[]" value="{{ $servico->id }}" id="servico_{{ $servico->id }}">
                            <label class="form-check-label" for="servico_{{ $servico->id }}">
                                {{ $servico->nome }}
                            </label>
                        </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="data_agendamento">Data e Hora</label>
                    <input type="datetime-local" class="form-control" id="data_agendamento" name="data_agendamento" required>
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary btn-lg">Agendar</button>
                </div>
            </form>
        </div>

        <div class="form-container mx-auto mt-5">
            <h1 class="text-center mb-4">Agendamentos</h1>
            
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nome do Usuário</th>
                        <th>Serviços</th>
                        <th>Data e Hora</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($agendamentos as $agendamento)
                        <tr>
                            <td>{{ $agendamento->usuario->name }}</td>
                            <td>
                                @foreach(json_decode($agendamento->servico_ids) as $servico_id)
                                    <span>{{ \App\Models\Servico::find($servico_id)->nome }}</span><br>
                                @endforeach
                            </td>
                            <td>{{ \Carbon\Carbon::parse($agendamento->data_agendamento)->format('d/m/Y H:i') }}</td>
                            <td>{{ ucfirst($agendamento->status) }}</td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editarModal" 
                                        data-id="{{ $agendamento->id }}" 
                                        data-servicos="{{ implode(',', json_decode($agendamento->servico_ids)) }}"
                                        data-data="{{ $agendamento->data_agendamento }}" 
                                        data-status="{{ $agendamento->status }}" 
                                        data-observacoes="{{ $agendamento->observacoes }}">
                                    Editar
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarModalLabel">Editar Agendamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('agendamentos.update', '') }}" id="form-editar-agendamento">
                        @csrf
                        @method('PUT')
                        
                        <input type="hidden" id="agendamento-id" name="id">
                        
                        <div class="form-group">
                            <label>Serviços</label><br>
                            @foreach($servicos as $servico)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="servico_ids[]" value="{{ $servico->id }}" id="servico_{{ $servico->id }}">
                                    <label class="form-check-label" for="servico_{{ $servico->id }}">
                                        {{ $servico->nome }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <div class="form-group">
                            <label for="data_agendamento">Data e Hora</label>
                            <input type="datetime-local" class="form-control" id="data_agendamento" name="data_agendamento" required>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="pendente">Pendente</option>
                                <option value="confirmado">Confirmado</option>
                                <option value="cancelado">Cancelado</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="observacoes">Observações</label>
                            <textarea class="form-control" id="observacoes" name="observacoes" rows="3"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $('#editarModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var agendamentoId = button.data('id');
            var servicos = button.data('servicos').split(',');
            var dataAgendamento = button.data('data');
            var status = button.data('status');
            var observacoes = button.data('observacoes');
            
            var modal = $(this);
            modal.find('#agendamento-id').val(agendamentoId);
            modal.find('#data_agendamento').val(dataAgendamento);
            modal.find('#status').val(status);
            modal.find('#observacoes').val(observacoes);

            $('input[name="servico_ids[]"]').each(function () {
                if (servicos.includes($(this).val())) {
                    $(this).prop('checked', true);
                }
            });
        });
    </script>
</body>
</html>
