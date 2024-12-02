<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-custom {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background: linear-gradient(to bottom, #4e73df, #1c3d96);
            /* Gradiente vertical */
            color: white;
            min-height: 100px;
            /* Ajuste o valor conforme necessário */
        }

        .card-custom .card-body {
            padding: 20px;
            padding-bottom: 0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-custom .card-title {
            font-size: 15px;
            margin-bottom: 0px;
        }

        .card-custom .card-text {
            font-size: 18px;
        }

        .card-custom .icon {
            font-size: 20px;
            margin-right: 10px;
        }

        .card-custom .value {
            font-size: 20px;
            font-weight: bold;
        }

        .card-custom .footer {
            font-size: 14px;
            text-align: right;
        }
    </style>
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
    <div class="container mt-5">
        <div class="row">
            <!-- Card 1 -->
            <div class="col-md-3 mb-3">
                <div class="card card-custom">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="icon fas fa-users"></i>
                            <div>
                                <h5 class="card-title">Usuários Ativos</h5>
                            </div>
                        </div>
                        <p class="value">1,234</p>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="col-md-3 mb-3">
                <div class="card card-custom">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="icon fas fa-chart-line"></i>
                            <div>
                                <h5 class="card-title">Vendas Mensais</h5>
                            </div>
                        </div>
                        <p class="value">$ 4,567</p>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="col-md-3 mb-3">
                <div class="card card-custom">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="icon fas fa-dollar-sign"></i>
                            <div>
                                <h5 class="card-title">Lucro Total</h5>
                            </div>
                        </div>
                        <p class="value">$ 12,345</p>
                    </div>
                </div>
            </div>
            <!-- Card 4 -->
            <div class="col-md-3 mb-3">
                <div class="card card-custom">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="icon fas fa-box-open"></i>
                            <div>
                                <h5 class="card-title">Produtos em Estoque</h5>
                            </div>
                        </div>
                        <p class="value">2,345</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Card 5 -->
            <div class="col-md-3 mb-3">
                <div class="card card-custom">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="icon fas fa-truck"></i>
                            <div>
                                <h5 class="card-title">Pedidos Pendentes</h5>
                            </div>
                        </div>
                        <p class="value">345</p>
                    </div>
                </div>
            </div>
            <!-- Card 6 -->
            <div class="col-md-3 mb-3">
                <div class="card card-custom">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="icon fas fa-calendar-check"></i>
                            <div>
                                <h5 class="card-title">Tarefas Concluídas</h5>
                            </div>
                        </div>
                        <p class="value">45</p>
                    </div>
                </div>
            </div>
            <!-- Card 7 -->
            <div class="col-md-3 mb-3">
                <div class="card card-custom">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="icon fas fa-comments"></i>
                            <div>
                                <h5 class="card-title">Mensagens Não Lidas</h5>
                            </div>
                        </div>
                        <p class="value">12</p>
                    </div>
                </div>
            </div>
            <!-- Card 8 -->
            <div class="col-md-3 mb-3">
                <div class="card card-custom">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="icon fas fa-cogs"></i>
                            <div>
                                <h5 class="card-title">Configurações Sistema</h5>
                            </div>
                        </div>
                        <p class="value">12</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Font Awesome para ícones -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- Bootstrap JS e dependências -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
