<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Sidebar</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .nav-pills>li>a {
            border-radius: 0;
        }

        #wrapper {
            padding-left: 0;
            -webkit-transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            transition: all 0.5s ease;
            overflow: hidden;
        }

        #wrapper.toggled {
            padding-left: 250px;
            overflow: hidden;
        }

        #sidebar-wrapper {
            z-index: 1000;
            position: absolute;
            left: 250px;
            width: 0;
            height: 100%;
            margin-left: -250px;
            overflow-y: auto;
            background: #000;
            -webkit-transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            transition: all 0.5s ease;
        }

        #wrapper.toggled #sidebar-wrapper {
            width: 250px;
        }

        #page-content-wrapper {
            position: absolute;
            padding: 15px;
            width: 100%;
            overflow-x: hidden;
        }

        .xyz {
            min-width: 360px;
        }

        #wrapper.toggled #page-content-wrapper {
            position: relative;
            margin-right: 0px;
        }

        .fixed-brand {
            width: auto;
        }

        .sidebar-nav {
            position: absolute;
            top: 0;
            width: 250px;
            margin: 0;
            padding: 0;
            list-style: none;
            margin-top: 2px;
        }

        .sidebar-nav li {
            text-indent: 15px;
            line-height: 40px;
        }

        .sidebar-nav li a {
            display: block;
            text-decoration: none;
            color: #999999;
        }

        .sidebar-nav li a:hover {
            text-decoration: none;
            color: #fff;
            background: rgba(255, 255, 255, 0.2);
            border-left: red 2px solid;
        }

        .sidebar-nav li a:active,
        .sidebar-nav li a:focus {
            text-decoration: none;
        }

        .sidebar-nav>.sidebar-brand {
            height: 65px;
            font-size: 18px;
            line-height: 60px;
        }

        .sidebar-nav>.sidebar-brand a {
            color: #999999;
        }

        .sidebar-nav>.sidebar-brand a:hover {
            color: #fff;
            background: none;
        }

        .no-margin {
            margin: 0;
        }

        @media (min-width: 768px) {
            #wrapper {
                padding-left: 250px;
            }

            .fixed-brand {
                width: 250px;
            }

            #wrapper.toggled {
                padding-left: 0;
            }

            #sidebar-wrapper {
                width: 250px;
            }

            #wrapper.toggled #sidebar-wrapper {
                width: 250px;
            }

            #wrapper.toggled-2 #sidebar-wrapper {
                width: 50px;
            }

            #wrapper.toggled-2 #sidebar-wrapper:hover {
                width: 250px;
            }

            #page-content-wrapper {
                padding: 20px;
                position: relative;
                -webkit-transition: all 0.5s ease;
                -moz-transition: all 0.5s ease;
                -o-transition: all 0.5s ease;
                transition: all 0.5s ease;
            }

            #wrapper.toggled #page-content-wrapper {
                position: relative;
                margin-right: 0;
                padding-left: 250px;
            }

            #wrapper.toggled-2 #page-content-wrapper {
                position: relative;
                margin-right: 0;
                margin-left: -200px;
                -webkit-transition: all 0.5s ease;
                -moz-transition: all 0.5s ease;
                -o-transition: all 0.5s ease;
                transition: all 0.5s ease;
                width: auto;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-default no-margin">
        <div class="navbar-header fixed-brand">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" id="menu-toggle">
                <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
            </button>
            <a class="navbar-brand" href="#"><i class="fa fa-rocket fa-4"></i> M-33</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active">
                    <button class="navbar-toggle collapse in" data-toggle="collapse" id="menu-toggle-2">
                        <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
                    </button>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav nav-pills nav-stacked" id="menu">
                <li>
                    <a href="#" onclick="showContent('dashboard')">
                        <span class="fa-stack fa-lg pull-left"><i class="fa fa-cloud-download fa-stack-1x"></i></span> 
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="#" onclick="showContent('agendamentos')">
                        <span class="fa-stack fa-lg pull-left"><i class="fa fa-calendar fa-stack-1x"></i></span> 
                        Agendamentos
                    </a>
                </li>
                <li class="active">
                    <a href="#" onclick="showContent('registro-gastos')">
                        <span class="fa-stack fa-lg pull-left"><i class="fa fa-dollar fa-stack-1x"></i></span> 
                        Registro Gastos
                    </a>
                    <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                        <li><a href="#" onclick="showContent('fixos')">Fixos</a></li>
                        <li><a href="#" onclick="showContent('variados')">Variados</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" onclick="showContent('servicos')">
                        <span class="fa-stack fa-lg pull-left"><i class="fa fa-calendar fa-stack-1x"></i></span> 
                        Cadastro Serviços
                    </a>
                </li>
            </ul>
        </div>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid xyz">
                <div class="row">
                    <!-- Conteúdo dinâmico -->
                    <div class="col-lg-12 content" id="dashboard">
                        <h1>Dashboard</h1>
                        <p>Bem-vindo ao painel de controle. Aqui você pode visualizar os dados gerais do sistema.</p>
                    </div>
                    <div class="col-lg-12 content" id="agendamentos" style="display: none;">
                        <h1>Agendamentos</h1>
                        <p>Gerencie seus agendamentos nesta seção. Adicione, edite ou visualize compromissos.</p>
                    </div>
                    <div class="col-lg-12 content" id="registro-gastos" style="display: none;">
                        <h1>Registro de Gastos</h1>
                        <p>Controle seus gastos fixos e variados nesta seção.</p>
                    </div>
                    <div class="col-lg-12 content" id="fixos" style="display: none;">
                        <h1>Gastos Fixos</h1>
                        <p>Visualize e registre gastos fixos como aluguel e contas mensais.</p>
                    </div>
                    <div class="col-lg-12 content" id="variados" style="display: none;">
                        <h1>Gastos Variados</h1>
                        <p>Gerencie gastos variados como compras e despesas inesperadas.</p>
                    </div>
                    <div class="col-lg-12 content" id="servicos">
                        <div class="container mt-5">
                            <h1 class="text-center mb-4">Cadastrar Novo Serviço</h1>

                            <form method="POST" action="{{ route('servicos.store') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control" id="nome" name="nome" required>
                                </div>

                                <div class="form-group">
                                    <label for="descricao">Descrição</label>
                                    <textarea class="form-control" id="descricao" name="descricao"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="duracao">Duração (em minutos)</label>
                                    <input type="number" class="form-control" id="duracao" name="duracao" required>
                                </div>

                                <div class="form-group">
                                    <label for="preco">Preço</label>
                                    <input type="number" step="0.01" class="form-control" id="preco" name="preco" required>
                                </div>

                                <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Alternar entre telas dinâmicas
        function showContent(contentId) {
            document.querySelectorAll('.content').forEach(function (content) {
                content.style.display = 'none';
            });
            document.getElementById(contentId).style.display = 'block';
        }

        // Menu Toggle
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

        $("#menu-toggle-2").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled-2");
            $('#menu ul').hide();
        });

        function initMenu() {
            $('#menu ul').hide();
            $('#menu ul').children('.current').parent().show();
            $('#menu li a').click(function () {
                var checkElement = $(this).next();
                if ((checkElement.is('ul')) && (checkElement.is(':visible'))) {
                    return false;
                }
                if ((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
                    $('#menu ul:visible').slideUp('normal');
                    checkElement.slideDown('normal');
                    return false;
                }
            });
        }

        $(document).ready(function () {
            initMenu();
        });
    </script>
</body>

</html>
