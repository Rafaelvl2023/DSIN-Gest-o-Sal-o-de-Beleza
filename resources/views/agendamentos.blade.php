<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamentos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url(https://institutoanahickmann.com.br/wp-content/uploads/2021/11/cab.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }
        .form-container {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="form-container mx-auto">
            <h1 class="text-center mb-4">Agendamento de Serviço</h1>

            <form method="POST" action="{{ route('agendamentos.store') }}">
                @csrf

                <input type="hidden" name="usuario_id" value="{{ Auth::user()->id }}">

                <div class="form-group">
                    <label>Serviços</label><br>
                    @foreach($servicos as $servico)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="servico_ids[]" value="{{ $servico->id }}" id="servico_{{ $servico->id }}">
                            <label class="form-check-label" for="servico_{{ $servico->id }}">
                                {{ $servico->nome }}
                            </label>
                        </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="data_agendamento">Data e Hora</label>
                    <input type="datetime-local" class="form-control" id="data_agendamento" name="data_agendamento" required>
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary btn-lg">Agendar</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
