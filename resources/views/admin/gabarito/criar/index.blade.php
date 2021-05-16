
@extends('layouts._includes.merge.painel')

@section('titulo', 'Cadastrar Gabarito')

@section('conteudo')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                Cadastrar Gabarito
            </h2>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            @php
                $id_user=Auth::user()->id;
            @endphp
            <form action="{{ url("gabarito/store")}}" method="post" class="row"  enctype="multipart/form-data">
                @csrf

                @include('forms._formGabarito.index')

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
                'Gabarito Cadastrado',
                '',
                'success'
            )

        </script>
    @endif
    @if (session('aviso'))
        <script>
            Swal.fire(
                'Falha ao cadastrar gabarito!',

            )

        </script>
    @endif
@endsection
