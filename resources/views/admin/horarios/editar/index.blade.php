

@extends('layouts._includes.merge.painel')

@section('titulo', 'Editar Horário')

@section('conteudo')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                Editar Horário
            </h2>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('horarios.update', $horario['0']->id_horario) }}" method="post" class="row">
                @method('put')
                @csrf
                @include('forms._formHorario.index')


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
                'Horário Actualizado',
                '',
                'success'
            )

        </script>
    @endif
    @if (session('aviso'))
        <script>
            Swal.fire(
                'Falha ao actualizar Horário!',
                '',
                'error'
            )

        </script>
    @endif
@endsection
