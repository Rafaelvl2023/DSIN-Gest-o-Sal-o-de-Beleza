<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agendamentos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .navbar-mainbg {
            background: linear-gradient(100deg, #001fa8, #004e58);
            padding: 0;
        }

        .navbar-nav .nav-item .nav-link {
            color: white;
            font-size: 16px;
            padding: 15px 20px;
            text-transform: uppercase;
            transition: 0.3s;
        }

        .navbar-nav .nav-item .nav-link:hover {
            background: linear-gradient(100deg, hsl(0, 0%, 70%), #ffffff);
            color: #000000;
            border-radius: 5px;
        }

        .navbar-toggler {
            border: none;
            outline: none;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        .navbar-toggler i {
            font-size: 24px;
            color: white;
        }

        h2 {
            margin-bottom: 40px;
            padding-bottom: 10px;
            color: rgb(0, 59, 136);
            background: linear-gradient(45deg, #002fff, #00b7cf);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3), -2px -2px 4px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-mainbg">
        <button class="navbar-toggler ml-auto d-md-none" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-bars text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);"
                        onclick="window.location.href = '{{ route('agendamentos_dashboard.index') }}'">
                        <i class="far fa-address-book"></i> Agendamentos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);"
                        onclick="window.location.href = '{{ route('dashboard.index') }}'">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);"
                        onclick="window.location.href = '{{ route('gastos_fixos.index') }}'">
                        <i class="far fa-clone"></i> Gastos Fixos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);"
                        onclick="window.location.href = '{{ route('gastos_variados.index') }}'">
                        <i class="far fa-chart-bar"></i> Gastos Variados
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);"
                        onclick="window.location.href = '{{ route('servicos.index') }}'">
                        <i class="far fa-chart-bar"></i> Serviços
                    </a>
                </li>
                <li class="nav-item ml-auto">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-link"
                            style="background: none; border: none; color: white; padding: 15px 20px; cursor: pointer;">
                            <i class="fas fa-times"></i> Sair
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    <div id="agendamentos" class="content-section text-center" style="display: block;">
        <div class="container mt-5">
            <h2>Lista de Agendamentos</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Cliente</th>
                        <th scope="col">Serviços</th>
                        <th scope="col">Data do Agendamento</th>
                        <th scope="col">Status</th>
                        <th scope="col">Observações</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($agendamentos as $agendamento)
                        <tr>
                            <td class="text-center">{{ $agendamento->usuario->nome }}</td>
                            <td>
                                @foreach (json_decode($agendamento->servico_ids) as $servicoId)
                                    @php
                                        $servico = \App\Models\Servico::find($servicoId);
                                    @endphp
                                    <div>{{ $servico ? $servico->nome : 'Serviço não encontrado' }}</div>
                                @endforeach
                            </td>
                            <td>{{ \Carbon\Carbon::parse($agendamento->data_agendamento)->format('d/m/Y H:i') }}</td>
                            <td>{{ ucfirst($agendamento->status) }}</td>
                            <td>{{ $agendamento->observacoes }}</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                    data-target="#editModal{{ $agendamento->id }}">
                                    Editar
                                </button>
                                <div class="modal fade" id="editModal{{ $agendamento->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="editModalLabel{{ $agendamento->id }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel{{ $agendamento->id }}">
                                                    Editar Agendamento</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Fechar">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('agendamentos.update', $agendamento->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="data_agendamento">Data do Agendamento</label>
                                                        <input type="datetime-local" class="form-control"
                                                            name="data_agendamento"
                                                            value="{{ \Carbon\Carbon::parse($agendamento->data_agendamento)->format('Y-m-d\TH:i') }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="status">Status</label>
                                                        <select class="form-control" name="status">
                                                            <option value="pendente"
                                                                @if ($agendamento->status == 'pendente') selected @endif>
                                                                Pendente</option>
                                                            <option value="confirmado"
                                                                @if ($agendamento->status == 'confirmado') selected @endif>
                                                                Confirmado</option>
                                                            <option value="cancelado"
                                                                @if ($agendamento->status == 'cancelado') selected @endif>
                                                                Cancelado</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="observacoes">Observações</label>
                                                        <textarea class="form-control" name="observacoes" rows="3">{{ $agendamento->observacoes }}</textarea>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-warning">Salvar
                                                            alterações</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#confirmModal{{ $agendamento->id }}">
                                    Excluir
                                </button>
                                <div class="modal fade" id="confirmModal{{ $agendamento->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="confirmModalLabel">Confirmar Exclusão</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Fechar">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Tem certeza que deseja excluir este agendamento? Esta ação não pode ser
                                                desfeita.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancelar</button>
                                                <form action="{{ route('agendamentos.destroy', $agendamento->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Confirmar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $agendamentos->links('pagination::bootstrap-4') }}
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </div>
</body>

</html>
