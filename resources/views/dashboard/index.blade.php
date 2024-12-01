<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
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
    <h1>Dashboard AQUI</h1>
</body>
</html>
