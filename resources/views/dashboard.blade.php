<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Example</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
        }

        i {
            margin-right: 10px;
        }

        .navbar-logo {
            padding: 15px;
            color: #fff;
        }

        .navbar-mainbg {
            background-color: #5161ce;
            padding: 0px;
        }

        #navbarSupportedContent {
            overflow: hidden;
            position: relative;
        }

        #navbarSupportedContent ul {
            padding: 0px;
            margin: 0px;
        }

        #navbarSupportedContent ul li a i {
            margin-right: 10px;
        }

        #navbarSupportedContent li {
            list-style-type: none;
            float: left;
        }

        #navbarSupportedContent ul li a {
            color: rgba(255, 255, 255, 0.5);
            text-decoration: none;
            font-size: 15px;
            display: block;
            padding: 20px 20px;
            transition-duration: 0.6s;
            transition-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55);
            position: relative;
        }

        /* Cor vermelha para o link ativo */
        #navbarSupportedContent>ul>li.active>a {
            color: rgb(255, 217, 0);
            background-color: transparent;
            transition: all 0.7s;
        }

        #navbarSupportedContent a:not(:only-child):after {
            content: "\f105";
            position: absolute;
            right: 20px;
            top: 10px;
            font-size: 14px;
            font-family: "Font Awesome 5 Free";
            display: inline-block;
            padding-right: 3px;
            vertical-align: middle;
            font-weight: 900;
            transition: 0.5s;
        }

        #navbarSupportedContent .active>a:not(:only-child):after {
            transform: rotate(90deg);
        }

        .hori-selector {
            display: inline-block;
            position: absolute;
            height: 100%;
            top: 0px;
            left: 0px;
            transition-duration: 0.6s;
            transition-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55);
            background-color: #fff;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            margin-top: 10px;
        }

        .hori-selector .right,
        .hori-selector .left {
            position: absolute;
            width: 25px;
            height: 25px;
            background-color: #fff;
            bottom: 10px;
        }

        .hori-selector .right {
            right: -25px;
        }

        .hori-selector .left {
            left: -25px;
        }

        .hori-selector .right:before,
        .hori-selector .left:before {
            content: '';
            position: absolute;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #5161ce;
        }

        .hori-selector .right:before {
            bottom: 0;
            right: -25px;
        }

        .hori-selector .left:before {
            bottom: 0;
            left: -25px;
        }

        @media (min-width: 992px) {
            .navbar-expand-custom {
                -ms-flex-flow: row nowrap;
                flex-flow: row nowrap;
                -ms-flex-pack: start;
                justify-content: flex-start;
            }

            .navbar-expand-custom .navbar-nav {
                -ms-flex-direction: row;
                flex-direction: row;
            }

            .navbar-expand-custom .navbar-toggler {
                display: none;
            }

            .navbar-expand-custom .navbar-collapse {
                display: -ms-flexbox !important;
                display: flex !important;
                -ms-flex-preferred-size: auto;
                flex-basis: auto;
            }
        }

        @media (max-width: 991px) {
            #navbarSupportedContent ul li a {
                padding: 12px 30px;
            }

            .hori-selector {
                margin-top: 0px;
                margin-left: 10px;
                border-radius: 0;
                border-top-left-radius: 25px;
                border-bottom-left-radius: 25px;
            }

            .hori-selector .left,
            .hori-selector .right {
                right: 10px;
            }

            .hori-selector .left {
                top: -25px;
                left: auto;
            }

            .hori-selector .right {
                bottom: -25px;
            }

            .hori-selector .left:before {
                left: -25px;
                top: -25px;
            }

            .hori-selector .right:before {
                bottom: -25px;
                left: -25px;
            }
        }

        .content-section {
            display: none;
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
                <div class="hori-selector">
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
                <li class="nav-item active">
                    <a class="nav-link" href="#agendamentos" onclick="showSection('agendamentos')"><i
                            class="far fa-address-book"></i>Agendamentos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#dashboard" onclick="showSection('dashboard')"><i
                            class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#gastosFixos" onclick="showSection('gastosFixos')"><i
                            class="far fa-clone"></i>Gastos Fixos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#gastosVariados" onclick="showSection('gastosVariados')"><i
                            class="far fa-gastosVariados-alt"></i>Gastos Variados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#servicos" onclick="showSection('servicos')"><i
                            class="far fa-chart-bar"></i>Serviços</a>
                </li>
                <!-- Botão Sair alinhado à direita -->
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
        <h1>Agendamento</h1>
        <p>Agendamento.</p>
    </div>

    <div id="dashboard" class="content-section text-center">
        <h1>Dashboard</h1>
        <p>Welcome to the Dashboard. Here you can see your recent activities, updates, and statistics.</p>
    </div>

    <div id="gastosFixos" class="content-section text-center">
        <div class="container mt-5">
            <h4 class="text-center mb-4">Cadastrar Novo Gasto Fixo</h4>
            <form action="{{ route('gastos_fixos.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" id="nome" class="form-control border-info" required>
                    </div>

                    <div class="col-md-2 form-group">
                        <label for="preco">Valor:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">R$</span>
                            </div>
                            <input type="text" class="form-control border-info" id="precogastosFixos" name="preco"
                                required>
                        </div>
                        @error('precogastosFixos')
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
        <script>
            document.getElementById('precogastosFixos').addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, ''); // remove tudo que não for número

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

    <div id="gastosVariados" class="content-section text-center">
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
                        <label for="preco">Valor:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">R$</span>
                            </div>
                            <input type="text" class="form-control border-info" id="precogastosVariados" name="preco"
                                required>
                        </div>
                        @error('precogastosVariados')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="categoria">Categoria:</label>
                        <select id="categoria" name="categoria" class="form-control border-info" required>
                            <option disabled selected>Selecione</option>
                            <option value="compras">Compras</option>
                            <option value="despesas_imprevistas">Despesas Imprevistas</option>
                            <option value="alimentacao">Alimentação</option>
                            <option value="transporte">Transporte</option>
                            <option value="manutencao">Manutenção</option>
                            <option value="saude">Saúde</option>
                            <option value="educacao">Educação</option>
                            <option value="diversao">Diversão</option>
                            <option value="cultura">Cultura</option>
                            <option value="viagem">Viagem</option>
                            <option value="presentes">Presentes</option>
                            <option value="comunicacao">Comunicação</option>
                            <option value="impostos">Impostos</option>
                            <option value="outros">Outros</option>
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
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <script>
        function showSection(sectionId) {
            // Hide all sections
            $('.content-section').hide();

            // Show the selected section
            $('#' + sectionId).show();

            // Update active class on navbar links
            $('#navbarSupportedContent ul li').removeClass("active");
            $("a[href='#" + sectionId + "']").parent().addClass('active');
        }

        $(document).ready(function() {
            setTimeout(function() {
                test();
            });
        });
    </script>
</body>

</html>
