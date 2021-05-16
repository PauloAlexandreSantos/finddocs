@extends('layouts.admin')

@section('titulo', 'Cadastrar Dias de Semana')

 @section('conteudo')
    <div class="card mt-3">
        <div class="card-body">
            <h2>Cadastrar Dias de Semana</h2>
        </div>
    </div>
    <script src="/js/sweetalert2.all.min.js"></script>
    @if (session('teste'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Dias de Semana Inexistente',
        })
    </script>
@endif


    <div class="card">
        <div class="card-body">
            <form action="{{url('/dias_semanas/cadastrar')}}" method="post" class="row">
                @csrf

                @include('forms._formDiasSemanas.index')

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
                'Dias de Semana Cadastrado',
                '',
                'success'
            )

        </script>
    @endif
    @if (session('aviso'))
        <script>
            Swal.fire(
                'Falha ao cadastrar Dias de Semana!',
                '',
                'error'
            )

        </script>
    @endif
    

@endsection
