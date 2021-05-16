
@extends('layouts._includes.merge.painel')

@section('titulo', 'Cadastrar Disciplina')

@section('conteudo')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                Cadastrar Disciplina
            </h2>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ url('disciplinas/cadastrar')}}" method="post" class="row" enctype="multipart/form-data">
                @csrf

                @include('forms._formDisciplina.index')

                <div class=" col-md-4  ">
                    <label class="text-white">.</label>
                    <button type="submit" class=" col-md-12 text-center btn btn-dark"> Cadastrar</button>
                </div>
              
            </form>
        </div>
    </div>
    <!-- sweetalert -->
    <script src="/js/sweetalert2.all.min.js"></script>

    @if (session('status'))
        <script>
            Swal.fire(
                'Usuário Cadastrado',
                '',
                'success'
            )

        </script>
    @endif
    @if (session('aviso'))
        <script>
            Swal.fire(
                'Falha ao cadastrar usuário!',
                'Email existente ou senhas diferentes ',
                'error'
            )

        </script>
    @endif
    <!-- Footer-->

@endsection
