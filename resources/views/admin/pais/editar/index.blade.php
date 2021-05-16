@extends('layouts._includes.merge.painel')

@section('titulo', 'Editar Usuário')

@section('conteudo')
    <div class="card mt-3">
        <div class="card-body">
            <h3>Editar Professor|Escola</h3>
        </div>
    </div>


    <div class="card">
        <div class="card-body">
            <form form action="{{ route('professor.atualizar', $professorEscola['0']->id_fun_escola) }}" method="post" class="row" enctype="multipart/form-data">
                @method('put')
                @csrf
                @include('forms._formProfessor.index')
                <div class="col-md-12 py-1  text-center  d-flex justify-content-center">
                    <input type="submit" class="col-md-2 btn btn-dark" value="Confirmar alterações">
                </div>
            </form>
        </div>
    </div>
    <!-- sweetalert -->
    <script src="/js/sweetalert2.all.min.js"></script>
    @if (session('up'))
        <script>
            Swal.fire(
                'Dados Actualizados com sucesso',
                '',
                'success'
            )

        </script>
    @endif

    

@endsection
