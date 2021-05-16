
@extends('layouts._includes.merge.painel')

@section('titulo', 'Cadastrar Escola')

@section('conteudo')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                Cadastrar Escola
            </h2>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            @php
                $id_user=Auth::user()->id;
            @endphp
            <form action="{{ url("escolas/$id_user/cadastrar")}}" method="post" class="row"  enctype="multipart/form-data">
                @csrf

                @include('forms._formEscola.index')

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
                'Usuário Cadastrado',
                '',
                'success'
            )

        </script>
    @endif
    @if (session('aviso'))
        <script>
            Swal.fire(
                'Falha ao cadastrar escola!',
                'Email existente ou senhas diferentes ',
                'error'
            )

        </script>
    @endif
@endsection
