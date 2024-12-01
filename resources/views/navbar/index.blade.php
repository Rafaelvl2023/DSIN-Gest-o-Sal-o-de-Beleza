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
