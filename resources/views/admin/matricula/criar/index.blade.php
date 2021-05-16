
@extends('layouts._includes.merge.painel')

@section('titulo', 'Matricular Aluno')

@section('conteudo')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                 Matricular Aluno
            </h2>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{url('/matricula/cadastrar')}}" method="post" class="row">
                @csrf

                @include('forms._formMatricula.index')

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
                'Matrícula Cadastrado',
                '',
                'success'
            )

        </script>
    @endif
    @if (session('aviso'))
        <script>
            Swal.fire(
                'Falha ao cadastrar a Matrícula!',
                'Neste ano, o aluno já existe!',
                'error'
            )

        </script>
    @endif
    

@endsection

