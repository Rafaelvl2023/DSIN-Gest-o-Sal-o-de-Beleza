<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Serviços</title>
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
        <!-- Botão de alternância visível apenas em telas pequenas -->
        <button class="navbar-toggler ml-auto d-md-none" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-bars text-white"></i>
        </button>

        <!-- Itens da Navbar -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);" onclick="window.location.href = '{{ route('agendamentos_dashboard.index') }}'">
                        <i class="far fa-address-book"></i> Agendamentos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);" onclick="window.location.href = '{{ route('dashboard.index') }}'">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);" onclick="window.location.href = '{{ route('gastos_fixos.index') }}'">
                        <i class="far fa-clone"></i> Gastos Fixos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);" onclick="window.location.href = '{{ route('gastos_variados.index') }}'">
                        <i class="far fa-chart-bar"></i> Gastos Variados
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);" onclick="window.location.href = '{{ route('servicos.index') }}'">
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
    <div id="servicos" class="content-section text-center">
        <div class="container mt-5">
            <h2 class="text-center mb-4">Cadastrar Novo Serviço</h2>

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
                                    <a href="{{ route('servicos.edit', $servico->id) }}"
                                        class="btn btn-warning btn-sm">Editar</a>
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

                <div class="d-flex justify-content-center">
                    {{ $servicos->links('pagination::bootstrap-5') }}
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
