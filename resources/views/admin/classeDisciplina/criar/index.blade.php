

@extends('layouts._includes.merge.painel')

@section('titulo', 'Vincular disciplina à classe')

@section('conteudo')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                Vincular disciplina à classe
            </h2>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ url('classesDisciplinas/cadastrar')}}" method="post" class="row">
                @csrf

                @include('forms._formclasseDisciplina.index')

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
                ' disciplina vinculado!',
                '',
                'success'
            )

        </script>
    @endif
    @if (session('aviso'))
        <script>
            Swal.fire(
                'Falha ao vincular disciplina!',
                'Disciplina já deve estar vinculada! ',
                'error'
            )

        </script>
    @endif
    <!-- Footer-->

@endsection
