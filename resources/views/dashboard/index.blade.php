<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        .card-custom {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background: linear-gradient(to bottom, #4e73df, #1c3d96);
            color: white;
            min-height: 100px;
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

        .graficos {
            border-radius: 5px;
            background: linear-gradient(to bottom, #d4d4d4, #ffffff);
            box-shadow: 0px 9px 10px rgb(216, 216, 216);
            padding: 15px;
        }

        .grafico1 {
            height: 350px;
        }

        .grafico2 {
            height: 350px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .filter-item {
            display: inline-block;
            margin-right: 15px;
            position: relative;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: white;
            border: 1px solid #ddd;
            z-index: 1;
            width: 200px;
            padding: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .modal-content {
            padding: 20px;
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
    <div class="container ml-auto">
        <div class="row justify-content-end">
            <div class="col-md-2">
                <button id="toggleFiltros" class="btn btn-primary mt-3" data-toggle="modal"
                    data-target="#filtrosModal">Mostrar Filtros</button>
            </div>
        </div>
    </div>
    <div class="modal fade" id="filtrosModal" tabindex="-1" role="dialog" aria-labelledby="filtrosModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="filtrosModalLabel">Filtros</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-2">
                                <label for="ano" class="form-label">Ano</label>
                                <select name="ano[]" id="ano" class="form-select" multiple>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="mes" class="form-label">Mês</label>
                                <select name="mes[]" id="mes" class="form-select" multiple>
                                    <option value="1">Janeiro</option>
                                    <option value="2">Fevereiro</option>
                                    <option value="3">Março</option>
                                    <option value="4">Abril</option>
                                    <option value="5">Maio</option>
                                    <option value="6">Junho</option>
                                    <option value="7">Julho</option>
                                    <option value="8">Agosto</option>
                                    <option value="9">Setembro</option>
                                    <option value="10">Outubro</option>
                                    <option value="11">Novembro</option>
                                    <option value="12">Dezembro</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary">Filtrar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="card card-custom">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="icon fas fa-users"></i>
                            <div>
                                <h5 class="card-title">Clientes Cadastrados</h5>
                            </div>
                        </div>
                        <p class="value">234</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card card-custom">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="icon fas fa-chart-bar"></i>
                            <div>
                                <h5 class="card-title">Gastos Fixos Mensais</h5>
                            </div>
                        </div>
                        <p class="value">$ 3.000,00</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card card-custom">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="icon fas fa-exchange-alt"></i>
                            <div>
                                <h5 class="card-title">Gastos Variáveis Mensais</h5>
                            </div>
                        </div>
                        <p class="value">$ 1.200,00</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card card-custom">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="icon fas fa-calendar-check"></i>
                            <div>
                                <h5 class="card-title">Agendamentos Realizados</h5>
                            </div>
                        </div>
                        <p class="value">450</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="card card-custom">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="icon fas fa-check-circle"></i>
                            <div>
                                <h5 class="card-title">Serviços Concluídos</h5>
                            </div>
                        </div>
                        <p class="value">350</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card card-custom">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="icon fas fa-clock"></i>
                            <div>
                                <h5 class="card-title">Serviços Pendentes</h5>
                            </div>
                        </div>
                        <p class="value">100</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card card-custom">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="icon fas fa-dollar-sign"></i>
                            <div>
                                <h5 class="card-title">Faturamento Mensal</h5>
                            </div>
                        </div>
                        <p class="value">$ 15.000,00</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card card-custom">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="icon fas fa-money-bill-wave"></i>
                            <div>
                                <h5 class="card-title">Lucro Líquido do Mês</h5>
                            </div>
                        </div>
                        <p class="value">$ 5.000,00</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="graficos container mt-0">
        <div class="row">
            <div class="grafico1 col-md-7">
                <canvas id="lineChart"></canvas>
            </div>
            <div class="grafico2 col-md-5 mb-3 pb-3">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>

    <script>
        const labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'];

        const dataLine = {
            labels: labels,
            datasets: [{
                    label: 'Gastos Fixos',
                    data: [3000, 2500, 2800, 2700, 3200, 3100, 7000],
                    fill: false,
                    borderColor: 'rgb(255, 99, 132)',
                    tension: 0.1
                },
                {
                    label: 'Gastos Variáveis',
                    data: [1500, 1700, 3800, 1600, 1550, 1500, 1450],
                    fill: false,
                    borderColor: 'rgb(54, 162, 235)',
                    tension: 0.1
                },
                {
                    label: 'Faturamento Mensal',
                    data: [3000, 4500, 2700, 5200, 5000, 5100, 5400],
                    fill: false,
                    borderColor: 'rgb(255, 205, 86)',
                    tension: 0.1
                },
                {
                    label: 'Lucro Líquido',
                    data: [2500, 2200, 2400, 2300, 2500, 2600, 2700],
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }
            ]
        };

        const configLine = {
            type: 'line',
            data: dataLine,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        const myLineChart = new Chart(document.getElementById('lineChart'), configLine);

        const data = {
            labels: ['Gastos Fixos', 'Gastos Variáveis', 'Faturamento Mensal', 'Lucro Líquido'],
            datasets: [{
                label: 'Resumo Financeiro',
                data: [3000, 1500, 5000, 2500],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)'
                ],
                hoverOffset: 4
            }]
        };

        const config = {
            type: 'doughnut',
            data: data,
        };

        const myChart = new Chart(document.getElementById('myChart'), config);
    </script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#toggleButtonAno').click(function() {
                $('#checkboxOptionsAno').stop().slideToggle(300).css('opacity', 1);
                $('#checkboxOptionsMes').slideUp(300);
            });

            $('#toggleButtonMes').click(function() {
                $('#checkboxOptionsMes').stop().slideToggle(300).css('opacity', 1);
                $('#checkboxOptionsAno').slideUp(300);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#toggleFiltros').click(function() {
                $('#filtros').toggleClass('show');
            });
        });
    </script>
</body>

</html>
