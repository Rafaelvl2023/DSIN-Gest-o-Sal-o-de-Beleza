<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamentos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            background-image: url(https://institutoanahickmann.com.br/wp-content/uploads/2021/11/cab.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
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

        .pagination .page-item .page-link {
            font-size: 0.875rem;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
        }

        .pagination .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
        }

        .pagination .page-item .page-link:hover {
            background-color: #f1f1f1;
            border-color: #007bff;
        }

        .pagination .page-link {
            color: #007bff;
        }

        .pagination .page-item.disabled .page-link {
            color: #6c757d;
            background-color: #e9ecef;
            border-color: #ddd;
        }

        .whatsapp-icon img {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 100px;
            height: 100px;
            cursor: pointer;
            z-index: 1000;
            animation: blink 1.3s infinite;
        }

        .textWhats {
            text-align: center;
            font-size: 25px;
            color: #28a745;
            font-weight: bold;
            padding-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3),
                -1px -1px 2px rgba(0, 0, 0, 0.1);
            transform: perspective(300px) rotateX(10deg);
        }

        @keyframes blink {
            0% {
                opacity: 0.8;
                transform: scale(1);
            }

            50% {
                opacity: 1;
                transform: scale(1.1);
                filter: brightness(1.5);
            }

            100% {
                opacity: 0.8;
                transform: scale(1);
            }
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

        .form-container {
            background-color: rgba(255, 255, 255, 0.842);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .checkbox-container {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s ease-in-out;
            border: 1px solid #ccc;
            padding-left: 20px;
            margin-top: 0px;
            background-color: #f9f9f9;
        }

        .checkbox-container.open {
            max-height: 200px;
        }

        #flash-message {
            transition: opacity 1s ease-out;
            opacity: 1;
        }

        #flash-message.fade-out {
            opacity: 0;
        }
    </style>
</head>

<body>
    <div class="whatsapp-icon">
        <img src="https://ouch-cdn2.icons8.com/1oizdSHZL50V6Q9nrhAoQ1yymCfuay57pGsUUgpdOKo/rs:fit:456:456/czM6Ly9pY29uczgu/b3VjaC1wcm9kLmFz/c2V0cy9wbmcvOTY0/L2U0NTdjYWFlLWMy/MWUtNDU5Yi1iMzcy/LTQ4OWIwM2U5ZDgw/OC5wbmc.png"
            alt="WhatsApp Icon">
    </div>
    <nav class="navbar navbar-expand-custom navbar-mainbg">
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-bars text-white"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
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
    <div class="total">
        <div class="form-container container col-md-6 mt-5">
            <h4 class="text-center mb-4">Agende seu serviço agora</h4>

            <form method="POST" action="{{ route('agendamentos.store') }}">
                @csrf
                <input type="hidden" name="status" value="pendente">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="servicos">Serviços:</label>
                        <button type="button" id="dropdownButton" class="btn btn-secondary form-control text-left">
                            Selecione os Serviços
                        </button>
                        <div id="checkboxList" class="checkbox-container">
                            @foreach ($servicos as $servico)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="servico_ids[]"
                                        value="{{ $servico->id }}" id="servico{{ $servico->id }}">
                                    <label class="form-check-label" for="servico{{ $servico->id }}">
                                        {{ $servico->nome }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="data_agendamento">Data e Hora Desejada</label>
                        <input type="datetime-local" class="form-control" id="data_agendamento" name="data_agendamento"
                            required>
                    </div>
                    <div class="form-group text-center col-md-3 btn-sm" style="margin-top: 31px;">
                        <button type="submit" class="btn btn-primary btn-sm btn-block">Agendar</button>
                    </div>
                </div>
            </form>

            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirmação de Agendamento</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p id="message"></p>
                            <p id="suggestionMessage"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" id="acceptDateButton">Aceitar a nova
                                data</button>
                            <button type="button" class="btn btn-secondary" id="rejectDateButton">Não aceita</button>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

            <script>
                $(document).ready(function() {
                    var responseData = @json(session('responseData') ?? null);

                    if (responseData && responseData.modal) {
                        function showModal(responseData) {
                            if (responseData.modal) {
                                $('#message').text(responseData.message);
                                $('#suggestionMessage').text("Sugestão de data: " + responseData.sugestao_data);

                                $('#modal').modal('show');

                                $('#acceptDateButton').off('click').on('click', function() {
                                    $('input[name="data_agendamento"]').val(responseData.sugestao_data);

                                    $('#modal').modal('hide');
                                });

                                $('#rejectDateButton').off('click').on('click', function() {
                                    $('#modal').modal('hide');
                                });
                            }
                        }

                        showModal(responseData);
                    }
                });
            </script>
        </div>
        <div class="container" style="background-color: rgba(255, 255, 255, 0.842);">
            <h4 class="text-center my-4">Agendamentos Cadastrados</h4>
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center">Usuário</th>
                        <th scope="col">Serviços</th>
                        <th class="text-center">Data do Agendamento</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Observações</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($agendamentos as $agendamento)
                        <tr>
                            <td class="text-center">{{ $agendamento->usuario->nome }}</td>
                            <td>
                                @foreach (json_decode($agendamento->servico_ids) as $servicoId)
                                    @php
                                        $servico = \App\Models\Servico::find($servicoId);
                                    @endphp
                                    <div>{{ $servico ? $servico->nome : 'Serviço não encontrado' }}</div>
                                @endforeach
                            </td>
                            <td class="text-center">
                                {{ \Carbon\Carbon::parse($agendamento->data_agendamento)->format('d/m/Y H:i') }}
                            </td>
                            <td class="text-center">{{ $agendamento->status }}</td>
                            <td class="text-center">{{ $agendamento->observacoes }}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#editModal" data-agendamento-id="{{ $agendamento->id }}"
                                    data-data-agendamento="{{ $agendamento->data_agendamento }}"
                                    data-status-agendamento="{{ $agendamento->status }}"
                                    data-observacoes-agendamento="{{ $agendamento->observacoes }}">
                                    Editar
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    @if (session('error'))
                        <div id="flash-message" class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {{ $agendamentos->links('pagination::bootstrap-4') }}
            </div>

            <h5 class="textWhats">Qualquer dúvida, entre em contato comigo pelo WhatsApp!!!</h5>
        </div>

        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Editar Agendamento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editForm" method="POST" action="{{ route('agendamentos.update', ':id') }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" id="agendamentoId" name="agendamento_id">

                            <div class="form-group">
                                <label for="data_agendamento">Data e Hora do Agendamento</label>
                                <input type="datetime-local" class="form-control" id="modalDataAgendamento"
                                    name="data_agendamento">
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script>
            $('#editModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var agendamentoId = button.data('agendamento-id');
                var dataAgendamento = button.data('data-agendamento');
                var statusAgendamento = button.data('status-agendamento');
                var observacoesAgendamento = button.data('observacoes-agendamento');

                var formAction = '{{ route('agendamentos.update', ':id') }}'.replace(':id', agendamentoId);
                $('#editForm').attr('action', formAction);

                var formattedDate = moment(dataAgendamento).format('YYYY-MM-DDTHH:mm');
                $('#modalDataAgendamento').val(formattedDate);

                $('#modalStatus').val(statusAgendamento);
                $('#modalObservacoes').val(observacoesAgendamento);
            });
        </script>
        <script>
            if (document.getElementById('flash-message')) {
                setTimeout(function() {
                    document.getElementById('flash-message').classList.add('fade-out');

                    setTimeout(function() {
                        document.getElementById('flash-message').style.display = 'none';
                    }, 1000);
                }, 3000);
            }
        </script>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
    <script>
        $('#editarModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var agendamentoId = button.data('id');
            var servicos = button.data('servicos').split(',');
            var dataAgendamento = button.data('data');
            var status = button.data('status');
            var observacoes = button.data('observacoes');

            var modal = $(this);
            modal.find('#agendamento-id').val(agendamentoId);
            modal.find('#data_agendamento').val(dataAgendamento);
            modal.find('#status').val(status);
            modal.find('#observacoes').val(observacoes);

            $('input[name="servico_ids[]"]').each(function() {
                if (servicos.includes($(this).val())) {
                    $(this).prop('checked', true);
                }
            });
        });
    </script>
    <script>
        document.getElementById('dropdownButton').addEventListener('click', function() {
            const checkboxList = document.getElementById('checkboxList');
            checkboxList.classList.toggle('open');
        });

        document.addEventListener('click', function(event) {
            const dropdownButton = document.getElementById('dropdownButton');
            const checkboxList = document.getElementById('checkboxList');
            if (!dropdownButton.contains(event.target) && !checkboxList.contains(event.target)) {
                checkboxList.classList.remove('open');
            }
        });
    </script>
</body>

</html>
