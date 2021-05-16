@extends('layouts.admin')

@section('titulo', 'Editar Duração da Aula')

 @section('conteudo')
    <div class="card mt-3">
        <div class="card-body">
            <h2>Editar Duração da Aula</h2>
        </div>
    </div>
    <script src="/js/sweetalert2.all.min.js"></script>
    @if (session('teste'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Duração da Aula Inexistente',
        })
    </script>
@endif


    <div class="card">
        <div class="card-body">
            <form form action="{{url('')}}" method="post" class="row">
                @method('put')
                @csrf
                @include('forms._formHoras.index')

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
                'Duração da Aula Actualizado',
                '',
                'success'
            )

        </script>
    @endif
    @if (session('aviso'))
        <script>
            Swal.fire(
                'Falha ao actualizar Duração da Aula!',
                '',
                'error'
            )

        </script>
    @endif
    

@endsection
