<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Serviços</title>
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
    <div id="servicos" class="content-section text-center">
        <div class="container mt-5">
            <h4 class="text-center mb-4">Cadastrar Novo Serviço</h4>

            <form method="POST" action="{{ route('servicos.store') }}">
                @csrf

                <div class="row">
                    <div class="col-md-8 form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control border-info" id="nome" name="nome"
                            required>
                        @error('nome')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="duracao">Duração:</label>
                        <input type="text" class="form-control border-info" id="duracao" name="duracao"
                            required>
                        @error('duracao')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="preco">Preço:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">R$</span>
                            </div>
                            <input type="text" class="form-control border-info" id="preco" name="preco"
                                required>
                        </div>
                        @error('preco')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for="descricao">Descrição:</label>
                        <textarea class="form-control border-info" id="descricao" name="descricao"></textarea>
                        @error('descricao')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
            </form>
            <div class="container mt-5">
                <h1>Lista de Serviços</h1>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Nome do Serviço</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Duração (Horas)</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($servicos as $servico)
                            <tr>
                                <td>{{ $servico->nome }}</td>
                                <td>{{ $servico->descricao }}</td>
                                <td>{{ $servico->duracao }}</td>
                                <td>R$ {{ number_format($servico->preco, 2, ',', '.') }}</td>
                                <td>
                                    <!-- Botão Editar -->
                                    <a href="{{ route('servicos.edit', $servico->id) }}"
                                        class="btn btn-warning btn-sm">Editar</a>
                                    <!-- Botão Excluir -->
                                    <form action="{{ route('servicos.destroy', $servico->id) }}" method="POST"
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

                <!-- Paginação com Bootstrap -->
                <div class="d-flex justify-content-center">
                    {{ $servicos->links('pagination::bootstrap-5') }} <!-- Usando a paginação do Bootstrap 5 -->
                </div>
            </div>

        </div>
        <script>
            document.getElementById('preco').addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');

                if (value) {
                    let formattedValue = value.replace(/(\d)(\d{2})$/, '$1,$2');

                    formattedValue = formattedValue.replace(/(?=(\d{3})+(\d{2}))/, '$1.');

                    e.target.value = `R$ ${formattedValue}`;
                } else {
                    e.target.value = '';
                }
            });

            document.getElementById('preco').addEventListener('keydown', function(e) {
                if (e.key === "Backspace" || e.key === "Delete") {
                    let value = e.target.value.replace('R$', '').replace(/\D/g,
                        '');

                    if (!value) {
                        e.target.value = '';
                    }
                }
            });
            document.getElementById('duracao').addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value) {
                    if (value.length <= 2) {
                        value = value.replace(/(\d{2})/, '$1');
                    } else if (value.length <= 4) {
                        value = value.replace(/(\d{2})(\d{2})/, '$1:$2');
                    }
                    e.target.value = value;
                }
            });

            document.getElementById('duracao').addEventListener('keydown', function(e) {
                if (e.key === "Backspace" || e.key === "Delete") {
                    e.target.value = e.target.value.replace(':', '').replace(/\D/g, '').slice(0, 4);
                }
            });
        </script>
        <script>
            function showSection(sectionId) {
                const section = document.getElementById(sectionId);
                section.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        </script>
    </div>
</body>
</html>