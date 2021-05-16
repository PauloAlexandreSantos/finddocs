@extends('layouts.admin')

@section('titulo', 'Editar Dias de Semanas')

 @section('conteudo')
    <div class="card mt-3">
        <div class="card-body">
            <h2>Editar Dias de Semanas</h2>
        </div>
    </div>
    <script src="/js/sweetalert2.all.min.js"></script>
    @if (session('teste'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Dias de Semanas Inexistente',
        })
    </script>
@endif


    <div class="card">
        <div class="card-body">
            <form form action="{{url('/dias_semanas/actualizar')}}" method="post" class="row">
                @method('put')
                @csrf
                @include('forms._formDiasSemanas.index')


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
                'Dias de Semanas Actualizado',
                '',
                'success'
            )

        </script>
    @endif
    @if (session('aviso'))
        <script>
            Swal.fire(
                'Falha ao actualizar Dias de Semanas!',
                '',
                'error'
            )

        </script>
    @endif
    

@endsection
