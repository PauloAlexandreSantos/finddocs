

@extends('layouts._includes.merge.painel')

@section('titulo', 'Cadastrar Materia')

@section('conteudo')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                Cadastrar Materia
            </h2>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="card-text text-info text-center"> <i>A classe disciplina deve ser igual a classe disciplina do horário</i> </div>
            <form action="{{ url('materia/cadastrar')}}" method="POST" enctype="multipart/form-data">
                @csrf

                @include('forms._formMateria.index')

                <div class=" col-md-12 text-center d-flex justify-content-center ">
                    <button type="submit" class=" col-md-2 text-center btn btn-dark"> Cadastrar</button>
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
                'Falha ao cadastrar materia!',
                'A classe disciplina deve ser igual a classe disciplina do horário ',
                'error'
            )

        </script>
    @endif
    <!-- Footer-->

@endsection
