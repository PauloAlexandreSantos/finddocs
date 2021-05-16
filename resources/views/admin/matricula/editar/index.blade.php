@extends('layouts._includes.merge.painel')

@section('titulo', 'Editar Matrícula')

 @section('conteudo')
    <div class="card mt-3">
        <div class="card-body">
            <h2>Editar Matrícula</h2>
        </div>
    </div>
    <script src="/js/sweetalert2.all.min.js"></script>
    @if (session('teste'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Matrícula Inexistente',
        })
    </script>
@endif


    <div class="card">
        <div class="card-body">
            <form form action="{{ route('matricula.update', $matriculas->id) }}" method="post" class="row">
                @method('put')
                @csrf
                @include('forms._formMatricula.index')

                <div class=" col-md-4  ">
                    <label class="text-white">.</label>
                    <button type="submit" class=" col-md-12 text-center btn btn-dark">Actualizar</button>
                </div>
            </form>

        </div>
    </div>
    <!-- sweetalert -->
    <script src="/js/sweetalert2.all.min.js"></script>

    @if (session('status'))
        <script>
            Swal.fire(
                'Matrícula Actualizado',
                '',
                'success'
            )

        </script>
    @endif
    @if (session('aviso'))
        <script>
            Swal.fire(
                'Falha ao actualizar Matrícula!',
                '',
                'error'
            )

        </script>
    @endif
    

@endsection
