

@extends('layouts._includes.merge.painel')

@section('titulo', 'Adicionar PDF')

@section('conteudo')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                Editar PDF
            </h2>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ url("/materia/uploadPDFEditar/$PDF->id")}}" method="POST" class="row" enctype="multipart/form-data">
                @method('put')
                @csrf
                @include('forms._formPDF.index')

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
                'Usuário Cadastrado',
                '',
                'success'
            )

        </script>
    @endif
    @if (session('aviso'))
        <script>
            Swal.fire(
                'Falha ao cadastrar usuário!',
                'Email existente ou senhas diferentes ',
                'error'
            )

        </script>
    @endif
    @if (session('up'))
    <script>
        Swal.fire(
            'Ficheiro actualizado com sucesso',
            '',
            'success'
        )

    </script>
@endif
@endsection
