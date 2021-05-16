@extends('layouts.admin')

@section('titulo', 'Editar Tarefa a Submeter')

 @section('conteudo')
    <div class="card mt-3">
        <div class="card-body">
            <h2>Editar Tarefa a Submeter</h2>
        </div>
    </div>
    <script src="/js/sweetalert2.all.min.js"></script>
    @if (session('teste'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Tarefa a Submeter Inexistente',
        })
    </script>
@endif


    <div class="card">
        <div class="card-body">
            <form form action="{{route('Tarefas_Submetidas.update',$tarefas->id)}}" method="post" class="row">
                @method('put')
                @csrf
                @include('forms._formTarefaSubmeter.index')

                <div class=" col-md-12 text-center d-flex justify-content-center ">
                    <button type="submit" class=" col-md-2 text-center btn btn-dark"> Confirmar</button>
                </div>
            </form>

        </div>
    </div>
    <!-- sweetalert -->
    <script src="/js/sweetalert2.all.min.js"></script>

    @if (session('status'))
        <script>
            Swal.fire(
                'Tarefa a Submeter Actualizado',
                '',
                'success'
            )

        </script>
    @endif
    @if (session('aviso'))
        <script>
            Swal.fire(
                'Falha ao actualizar Tarefa a Submeter!',
                '',
                'error'
            )

        </script>
    @endif
    

@endsection
