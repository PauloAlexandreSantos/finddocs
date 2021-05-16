@extends('layouts._includes.merge.painel')

@section('titulo', 'Cadastrar Filho')

@section('conteudo')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                Cadastrar Filho
            </h2>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            @php
                $id_user = Auth::user()->id;
            @endphp
            <form action="{{ url("$id_user/users/escreverFilho") }}" method="post" class="mt-4"
                enctype="multipart/form-data">

                <div class="register1">
                    @csrf


                    @include('site.forms._formUser.index')

                    <div class="row">
                        <div class=" col-md-6 text-center d-flex justify-content-right ">
                            <button type="submit" class=" col-md-6 text-center btn btn-dark"> Cadastrar</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
 <!-- sweetalert -->
 <script src="/js/sweetalert2.all.min.js"></script>
    @if (session('status'))
        <script>
            Swal.fire(
                'Dados Cadastrados com sucesso',
                '',
                'success'
            )

        </script>
        @endif

        @if (session('error'))
        <script>
            Swal.fire(
                'Seleciona a foto!',
                '',
                'error'
            )

        </script>
    @endif
@endsection
