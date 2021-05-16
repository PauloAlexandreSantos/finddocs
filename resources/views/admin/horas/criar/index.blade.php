@extends('layouts.admin')

@section('titulo', 'Cadastrar Duração da Aula')

 @section('conteudo')
    <div class="card mt-3">
        <div class="card-body">
            <h2>Cadastrar Duração da Aula</h2>
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
            <form action="{{url('/horas/cadastrar')}}" method="post" class="row">
                @csrf

                @include('forms._formHoras.index')

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
                'Duração da Aula Cadastrado',
                '',
                'success'
            )

        </script>
    @endif
    @if (session('aviso'))
        <script>
            Swal.fire(
                'Falha ao cadastrar Hora!',
                '',
                'error'
            )

        </script>
    @endif
    

@endsection
