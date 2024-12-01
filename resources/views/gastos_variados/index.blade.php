<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .content-section {
            background-color: #f9f9f9; /* Fundo cinza claro */
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

        /* Estilo para a formatação do valor monetário */
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
    <div id="gastosVariados" class="content-section text-center">
        {{-- @extends('gastos_variados.index') <!-- Estende o layout base -->

        @section('content')

            <!-- Incluindo o conteúdo da view gastos_variados.index -->
            @include('gastos_variados.index') <!-- Inclui o conteúdo da view de gastos variáveis -->
        @endsection --}}
        <div class="container mt-5">
            <h4 class="text-center mb-4">Cadastrar Novo Gasto Variado</h4>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('gastos_variados.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="nome">Nome do Gasto:</label>
                        <input type="text" id="nome" name="nome" class="form-control border-info"
                            value="{{ old('nome') }}" required>
                        @error('nome')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-2 form-group">
                        <label for="valor">Valor:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">R$</span>
                            </div>
                            <input type="text" class="form-control border-info" id="precogastosVariados"
                                name="valor" value="{{ old('valor') }}" required>
                        </div>
                        @error('valor')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-2 form-group">
                        <label for="categoria">Categoria:</label>
                        <select id="categoria" name="categoria" class="form-control border-info" required>
                            <option disabled selected>Selecione</option>
                            <option value="compras" {{ old('categoria') == 'compras' ? 'selected' : '' }}>Compras
                            </option>
                            <option value="despesas_imprevistas"
                                {{ old('categoria') == 'despesas_imprevistas' ? 'selected' : '' }}>Despesas Imprevistas
                            </option>
                            <option value="alimentacao" {{ old('categoria') == 'alimentacao' ? 'selected' : '' }}>
                                Alimentação</option>
                            <option value="transporte" {{ old('categoria') == 'transporte' ? 'selected' : '' }}>
                                Transporte</option>
                            <option value="manutencao" {{ old('categoria') == 'manutencao' ? 'selected' : '' }}>
                                Manutenção</option>
                            <option value="saude" {{ old('categoria') == 'saude' ? 'selected' : '' }}>Saúde</option>
                            <option value="educacao" {{ old('categoria') == 'educacao' ? 'selected' : '' }}>Educação
                            </option>
                            <option value="diversao" {{ old('categoria') == 'diversao' ? 'selected' : '' }}>Diversão
                            </option>
                            <option value="cultura" {{ old('categoria') == 'cultura' ? 'selected' : '' }}>Cultura
                            </option>
                            <option value="viagem" {{ old('categoria') == 'viagem' ? 'selected' : '' }}>Viagem
                            </option>
                            <option value="presentes" {{ old('categoria') == 'presentes' ? 'selected' : '' }}>
                                Presentes</option>
                            <option value="comunicacao" {{ old('categoria') == 'comunicacao' ? 'selected' : '' }}>
                                Comunicação</option>
                            <option value="impostos" {{ old('categoria') == 'impostos' ? 'selected' : '' }}>Impostos
                            </option>
                            <option value="outros" {{ old('categoria') == 'outros' ? 'selected' : '' }}>Outros
                            </option>
                        </select>
                        @error('categoria')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-2 form-group">
                        <label for="data">Data:</label>
                        <input type="date" id="data" name="data" class="form-control border-info"
                            value="{{ old('data') }}" required>
                        @error('data')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for="descricao">Descrição (Opcional):</label>
                        <textarea id="descricao" name="descricao" class="form-control border-info">{{ old('descricao') }}</textarea>
                        @error('descricao')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Cadastrar Gasto</button>
            </form>

        </div>
        <script>
            document.getElementById('precogastosVariados').addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');

                if (value) {
                    let formattedValue = value.replace(/(\d)(\d{2})$/, '$1,$2');

                    formattedValue = formattedValue.replace(/(?=(\d{3})+(\d{2}))/, '$1.');

                    e.target.value = `R$ ${formattedValue}`;
                } else {
                    e.target.value = '';
                }
            });

            document.getElementById('precogastosVariados').addEventListener('keydown', function(e) {
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
