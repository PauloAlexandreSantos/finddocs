<nav class="topnav navbar navbar-light">
    <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
        <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>
    <form class="form-inline mr-auto searchform text-muted">
        <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search"
            placeholder="Digite algo..." aria-label="Search">
    </form>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
                <i class="fe fe-sun fe-16"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-shortcut">
                <span class="fe fe-grid fe-16"></span>
            </a>
        </li>
        <li class="nav-item nav-notif">
            <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-notif">
                <span class="fe fe-bell fe-16"></span>
                <span class="dot dot-md bg-success"></span>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="avatar avatar-sm mt-2">
                    @php
                        $img = Auth::User()->profile_photo_path;
                    @endphp
                    <img src="{{ url("storage/{$img}") }}" alt="..." class="avatar-img rounded-circle">
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Perfil</a>
                <a class="dropdown-item" href="#">Configurações</a>
                <a class="nav-link text-danger" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Terminar a Sessão
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
        </form>
    </ul>
</nav>

@if (null !== Auth::user())
    <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
            <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        <nav class="vertnav navbar navbar-light">
            <!-- nav bar -->
            <div class="w-100  d-flex">
                <a class="navbar-brand mx-auto  flex-fill text-center" href="{{ url('') }}">
                    <img rel="icon" src="/images/insignia/logo.png" style="width:50px; margin:auto" />

                </a>
            </div>


            <ul class="navbar-nav flex-fill w-100 mb-2">
                <p class="text-muted nav-heading mt-4 mb-1">
                    <span>Painel</span>
                </p>
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item w-100">
                        <a class="nav-link" href="{{ url('/home') }}">
                            <i class="fe fe-help-circle fe-16"></i>
                            <span class="ml-3 item-text">Painel</span>
                        </a>
                    </li>
                </ul>
                @if (Auth::User()->vc_tipoUtilizador == 'Administrador')
                    <p class="text-muted nav-heading mt-4 mb-1">
                        <span>Usuários</span>
                    </p>
                    <li class="nav-item dropdown">
                        <a href="#ui-elements" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle nav-link">
                            <i class="fe fe-users fe-16"></i>
                            <span class="ml-3 item-text"> Funcionários</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">

                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ url('admin/users/cadastrar') }}"><span
                                        class="ml-1 item-text">Cadastrar Funcionário</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ url('admin/users/listar') }}"><span
                                        class="ml-1 item-text">Listar Funcionários</span></a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#professor" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle nav-link">
                            <i class="fe fe-users fe-16"></i>
                            <span class="ml-3 item-text"> Professores</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="professor">


                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ url('professores/') }}"><span
                                        class="ml-1 item-text">Listar Professor</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ url('professores/professorEscola') }}"><span
                                        class="ml-1 item-text">Listar Profesor|Escola</span></a>
                            </li>


                        </ul>
                    </li>
                @endif


                @if (Auth::User()->vc_tipoUtilizador == 'Administrador')

                    <li class="nav-item dropdown">
                        <a href="#pai" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                            <i class="fe fe-credit-card fe-16"></i>
                            <span class="ml-3 item-text">Pai</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="pai">

                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('pais', Auth::user()->id) }}"><span
                                        class="ml-1 item-text">Lista Pais
                                    </span></a>
                            </li>


                        </ul>
                    </li>
                @endif


                @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Encarregado')

                    <li class="nav-item dropdown">
                        <a href="#filho" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                            <i class="fe fe-credit-card fe-16"></i>
                            <span class="ml-3 item-text">Filho</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="filho">
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('user.escrever', Auth::user()->id) }}"><span
                                        class="ml-1 item-text">Cadastrar Filho</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('user.filhos', Auth::user()->id) }}"><span
                                        class="ml-1 item-text">Listar Filhos
                                    </span></a>
                            </li>


                        </ul>
                    </li>
                @endif

                @if (Auth::User()->vc_tipoUtilizador == 'Administrador')

                    <li class="nav-item dropdown">
                        <a href="#aluno" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                            <i class="fe fe-users fe-16"></i>
                            <span class="ml-3 item-text"> Alunos</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="aluno">

                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('ver_quantidade_alunos_classe') }}"><span
                                        class="ml-1 item-text">Quantidade de Alunos por Classe</span></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link pl-3"
                                    href="{{ route('ver_quantidade_tarefas_submetidas') }}"><span
                                        class="ml-1 item-text">Quantidade de Tarefas Submetidas</span></a>
                            </li>

                        </ul>
                        <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">

                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ url('admin/alunos/pesquisar') }}"><span
                                        class="ml-1 item-text">Total de Alunos Por Município</span></a>
                            </li>

                        </ul>
                    </li>
                @endif


                @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Encarregado')
                    <p class="text-muted nav-heading mt-4 mb-1">
                        <span>Estudantes</span>
                    </p>



                    <li class="nav-item dropdown">
                        <a href="#forms" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                            <i class="fe fe-credit-card fe-16"></i>
                            <span class="ml-3 item-text">Matrícula</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="forms">
                            <li class="nav-item">
                                <a class="nav-link pl-3"
                                    href="{{ route('matricula.create', Auth::user()->id) }}"><span
                                        class="ml-1 item-text">Cadastrar Matrícula</span></a>
                            </li>
                            @php
                                $id = Auth::user()->id;
                            @endphp
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ url("/matricula") }}"><span
                                        class="ml-1 item-text">Listar
                                        Matrículas
                                    </span></a>
                            </li>


                        </ul>
                    </li>
                @endif
                @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Professor')
                <p class="text-muted nav-heading mt-4 mb-1">
                    <span> Tarefas</span>
                </p>
                <li class="nav-item dropdown">
                  
                        <a href="#tables" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                            <i class="fe fe-file-plus fe-16"></i>
                            <span class="ml-3 item-text"> Tarefas</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="tables">

                            @if (Auth::User()->vc_tipoUtilizador == 'Administrador')

                                <li class="nav-item">
                                    <a class="nav-link pl-3" href="{{ url('tarefas/criar') }}"><span
                                            class="ml-1 item-text">Criar Tarefas</span></a>
                                </li>
                            @endif

                            <li class="nav-item">
                                @php
                                    $id_user = Auth::User()->id;
                                @endphp
                                <a class="nav-link pl-3" href="{{ url("/tarefas") }}"><span
                                        class="ml-1 item-text">Listar
                                        Tarefas</span></a>
                            </li>





                        </ul>

                </li>
@endif


@if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Professor')
<p class="text-muted nav-heading mt-4 mb-1">
    <span> Materia</span>
</p>

<li class="nav-item dropdown">
    <a href="#charts" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
        <i class="fe fe-edit-3 fe-16"></i>
        <span class="ml-3 item-text"> Materia</span>
    </a>
    <ul class="collapse list-unstyled pl-4 w-100" id="charts">
        @if (Auth::User()->vc_tipoUtilizador == 'Administrador' )
            <li class="nav-item">
                <a class="nav-link pl-3" href="{{ url('/materia') }}"><span class="ml-1 item-text">Cadastrar
                        Materia</span></a>
            </li>
          
        @endif

        @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Aluno')
            <li class="nav-item">
                <a class="nav-link pl-3"
                    href="{{ route('materia.minhasMateria', ['id' => Auth::user()->id]) }}"><span
                        class="ml-1 item-text">Minhas materia</span></a>
            </li>
        @endif

        @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Professor')
            <li class="nav-item">
                <a class="nav-link pl-3"
                    href="{{ route('materia.buscasDiscicplina') }}"><span
                        class="ml-1 item-text">Listar Materia</span></a>
            </li>
        @endif

    </ul>
</li>
@endif

@if (Auth::User()->vc_tipoUtilizador == 'Filho' || Auth::User()->vc_tipoUtilizador == 'Aluno')
    <p class="text-muted nav-heading mt-4 mb-1">
        <span>Vida academica</span>
    </p>

    <li class="nav-item dropdown">
        <a href="#disciplinas" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
            <i class="fe fe-edit-3 fe-16"></i>
            <span class="ml-3 item-text"> Aulas</span>
        </a>
        {{-- <i class="fe fe-edit-3 fe-16"></i> --}}
        {{-- {{ $disciplinas2 }} --}}
     
        @isset($disciplinas2)
            @foreach ($disciplinas2 as $item)
                {{-- <span class="ml-3 item-text">{{ $item->vc_disciplina }}</span> --}}
                <ul class="collapse list-unstyled pl-4 w-100" id="disciplinas">
                    <li class="nav-item">
                        @isset($item->vc_disciplina)
                        
                            <a class="nav-link pl-3" href="{{ route('materia.aluno', ['id' => $item->id_classe_disciplinas]) }}"><span
                                    class="ml-1 item-text">{{ $item->vc_disciplina }}</span></a>
                        @endisset
                    </li>
                </ul>
            @endforeach
        @endisset
    </li>


    <li class="nav-item dropdown">
        <a href="#tarefasII" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
            <i class="fe fe-file-plus fe-16"></i>
            <span class="ml-3 item-text"> Tarefas</span>
        </a>
        {{-- <i class="fe fe-edit-3 fe-16"></i> --}}
        {{-- {{ $disciplinas2 }} --}}
        @isset($disciplinas2)
            @foreach ($disciplinas2 as $item)
                {{-- <span class="ml-3 item-text">{{ $item->vc_disciplina }}</span> --}}
                <ul class="collapse list-unstyled pl-4 w-100" id="tarefasII">
                    <li class="nav-item">
                        @isset($item->vc_disciplina)
                        
                            <a class="nav-link pl-3" href="{{ route('alunos.minhaTarefa', ['id_classe_disciplina' => $item->id_classe_disciplinas]) }}"><span
                                    class="ml-1 item-text">{{ $item->vc_disciplina }}</span></a>
                        @endisset
                    </li>
                </ul>
            @endforeach
        @endisset
    </li>
@endif

@if (Auth::user()->vc_tipoUtilizador == 'Administrador')
    <p class="text-muted nav-heading mt-4 mb-1">
        <span> Configurações</span>
    </p>

    <li class="nav-item dropdown">
        <a href="#escola" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
            <i class="fe fe-box fe-16"></i>
            <span class="ml-3 item-text"> Escola</span>
        </a>
        <ul class="collapse list-unstyled pl-4 w-100" id="escola">

            <li class="nav-item">
                <a class="nav-link pl-3" href="{{ url('escolas/criar') }}"><span class="ml-1 item-text">Cadastrar
                        Escola</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link pl-3" href="{{ url('escolas') }}"><span class="ml-1 item-text">Listar
                        Escolas</span></a>
            </li>

        </ul>
    </li>

    <li class="nav-item dropdown">
        <a href="#conf" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
            <i class="fe fe-list fe-16"></i>
            <span class="ml-3 item-text"> Classe</span>
        </a>
        <ul class="collapse list-unstyled pl-4 w-100" id="conf">
            <li class="nav-item">
                <a class="nav-link pl-3" href="{{ url('classes/criar') }}"><span class="ml-1 item-text">Cadastrar
                        Classe</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link pl-3" href="{{ url('classes') }}"><span class="ml-1 item-text">Listar
                        Classe</span></a>
            </li>
        </ul>
    </li>
@endif




<li class="nav-item dropdown">
    <a href="#horario" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
        <i class="fe fe-clock fe-16"></i>
        <span class="ml-3 item-text"> Horário</span>
    </a>
    <ul class="collapse list-unstyled pl-4 w-100" id="horario">
        @if (Auth::user()->vc_tipoUtilizador == 'Administrador')
            <li class="nav-item">
                <a class="nav-link pl-3" href="{{ url('/horarios/criar') }}"><span class="ml-1 item-text">Cadastrar
                        Horário</span></a>
            </li>
        @endif
        <li class="nav-item">
            <a class="nav-link pl-3" href="{{ url('/horarios') }}"><span class="ml-1 item-text">Listar
                    Horários</span></a>
        </li>
    </ul>
</li>
@if (Auth::user()->vc_tipoUtilizador == 'Administrador')
    <li class="nav-item dropdown">
        <a href="#anoLectivo" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
            <i class="fe fe-calendar fe-16"></i>
            <span class="ml-3 item-text"> Anos Lectivo</span>
        </a>
        <ul class="collapse list-unstyled pl-4 w-100" id="anoLectivo">
            <li class="nav-item">
                <a class="nav-link pl-3" href="{{ url('/admin/anolectivo/cadastrar') }}"><span
                        class="ml-1 item-text">Cadastrar</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link pl-3" href="{{ url('/admin/anolectivo') }}"><span
                        class="ml-1 item-text">Listar</span></a>
            </li>
        </ul>
    </li>


    <li class="nav-item dropdown">
        <a href="#Disciplinas" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
            <i class="fe fe-book-open fe-16"></i>
            <span class="ml-3 item-text"> Disciplinas</span>
        </a>
        <ul class="collapse list-unstyled pl-4 w-100" id="Disciplinas">
            <li class="nav-item">
                <a class="nav-link pl-3" href="{{ url('disciplinas/criar') }}"><span
                        class="ml-1 item-text">Cadastrar</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link pl-3" href="{{ url('disciplinas') }}"><span
                        class="ml-1 item-text">Listar</span></a>
            </li>
        </ul>
    </li>


    <p class="text-muted nav-heading mt-4 mb-1">
        <span> Logs de Actidade</span>
    </p>

    <li class="nav-item dropdown">
        <a href="#logs" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
            <i class="fe fe-database fe-16"></i>
            <span class="ml-3 item-text"> Logs</span>
        </a>
        <ul class="collapse list-unstyled pl-4 w-100" id="logs">
            <li class="nav-item">
                <a class="nav-link pl-3" href="{{ url('admin/logs/pesquisar') }}"><span class="ml-1 item-text">Lista
                        de Logs</span></a>
            </li>


        </ul>
    </li>
@endif
</ul>
</nav>
</aside>

@endif
