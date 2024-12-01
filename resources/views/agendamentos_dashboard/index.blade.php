<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agendamentos</title>
    <style>
        .content-section {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
        }

        .form-control.border-info {
            border: 1px solid #17a2b8;
            box-shadow: none;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-warning {
            background-color: #ffc107;
            border: none;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .table th, .table td {
            text-align: center;
        }

        .input-group-text {
            background-color: #17a2b8;
            color: white;
        }

        .container {
            margin-top: 20px;
        }

        h4.text-center {
            font-size: 1.5rem;
            font-weight: 600;
        }

        h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #343a40;
        }

        input[type="text"] {
            text-align: right;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-custom navbar-mainbg">
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-bars text-white"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);" onclick="window.location.href = '{{ route('agendamentosDashboard.index') }}'">
                        <i class="far fa-address-book"></i>Agendamentos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);" onclick="window.location.href = '{{ route('dashboard.index') }}'">
                        <i class="fas fa-tachometer-alt"></i>Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);" onclick="window.location.href = '{{ route('gastos_fixos.index') }}'">
                        <i class="far fa-clone"></i>Gastos Fixos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);" onclick="window.location.href = '{{ route('gastos_variados.index') }}'">
                        <i class="far fa-gastosVariados-alt"></i>Gastos Variados
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);" onclick="window.location.href = '{{ route('servicos.index') }}'">
                        <i class="far fa-chart-bar"></i>Serviços
                    </a>
                </li>
                <li class="nav-item ml-auto">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-link"
                            style="background: none; border: none; color: white; padding: 20px 20px; cursor: pointer;">
                            <i class="fas fa-times"></i> Sair
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    <div id="agendamentos" class="content-section text-center" style="display: block;">
        <div class="container mt-5">
            <h1>Lista de Agendamentos</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
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
                                <a href="{{ route('agendamentos.edit', $agendamento->id) }}"
                                    class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('agendamentos.destroy', $agendamento->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {{ $agendamentos->links('pagination::bootstrap-4') }}
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    </div>
</body>
</html>
