<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Novo Gasto Fixo</title>
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
        <button class="navbar-toggler ml-auto d-md-none" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-bars text-white"></i>
        </button>

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
    <div id="gastosFixos" class="content-section text-center">
        <div class="container mt-5">
            <h2 class="text-center mb-4">Cadastrar Novo Gasto Fixo</h2>
            <form action="{{ route('gastos_fixos.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" id="nome" class="form-control border-info" required>
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="valor">Valor:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">R$</span>
                            </div>
                            <input type="text" class="form-control border-info" id="precogastosFixos" name="valor"
                                required>
                        </div>
                        @error('valor')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-2 form-group">
                        <label for="categoria">Categoria:</label>
                        <select name="categoria" id="categoria" class="form-control border-info" required>
                            <option disabled selected>Selecione</option>
                            <option value="aluguel">Aluguel</option>
                            <option value="salarios">Salários</option>
                            <option value="energia">Energia</option>
                            <option value="agua">Água</option>
                            <option value="internet">Internet</option>
                            <option value="telefone">Telefone</option>
                            <option value="manutencao">Manutenção</option>
                            <option value="seguros">Seguros</option>
                            <option value="publicidade">Publicidade</option>
                        </select>
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="recorrencia">Recorrência:</label>
                        <select name="recorrencia" id="recorrencia" class="form-control border-info" required>
                            <option disabled selected>Selecione</option>
                            <option value="mensal">Mensal</option>
                            <option value="anual">Anual</option>
                            <option value="semanal">Semanal</option>
                            <option value="diaria">Diária</option>
                        </select>
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="data_vencimento">Data de Vencimento:</label>
                        <input type="date" name="data_vencimento" id="data_vencimento"
                            class="form-control border-info" required>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-12 form-group">
                        <label for="descricao">Descrição:</label>
                        <textarea name="descricao" id="descricao" class="form-control border-info"></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
            </form>
        </div>
        <div class="container mt-5">
            <h2>Gastos Fixos</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Data de Vencimento</th>
                        <th scope="col">Recorrência</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($gastosFixos as $gasto)
                        <tr>
                            <td>{{ $gasto->nome }}</td>
                            <td>{{ $gasto->valor }}</td>
                            <td>{{ $gasto->categoria }}</td>
                            <td>{{ \Carbon\Carbon::parse($gasto->data_vencimento)->format('d/m/Y') }}</td>
                            <td>{{ ucfirst($gasto->recorrencia) }}</td>
                            <td>{{ $gasto->descricao }}</td>
                            <td>
                                <a href="{{ route('gastos_fixos.edit', $gasto->id) }}"
                                    class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('gastos_fixos.destroy', $gasto->id) }}" method="POST"
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
                {{ $gastosFixos->links('pagination::bootstrap-4') }}
            </div>
        </div>

        <script>
            document.getElementById('precogastosFixos').addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');

                if (value) {
                    let formattedValue = value.replace(/(\d)(\d{2})$/, '$1,$2');

                    formattedValue = formattedValue.replace(/(?=(\d{3})+(\d{2}))/, '$1.');

                    e.target.value = `R$ ${formattedValue}`;
                } else {
                    e.target.value = '';
                }
            });

            document.getElementById('precogastosFixos').addEventListener('keydown', function(e) {
                if (e.key === "Backspace" || e.key === "Delete") {
                    let value = e.target.value.replace('R$', '').replace(/\D/g,
                        '');

                    if (!value) {
                        e.target.value = '';
                    }
                }
            });
        </script>
    </div>
</body>

</html>
