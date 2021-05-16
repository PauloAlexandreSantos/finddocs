@extends('layouts._includes.merge.painel')

@section('titulo', 'Home')

@section('conteudo')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                Cadastrar ano lectivo
            </h2>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin/anolectivo/cadastrar') }}" method="post" class="row">
                @csrf
                @include('forms._formAnoLectivo.index')
                <div class="form-group col-sm-4">
                    <label for="" class="text-white form-label">.</label>
                    <button class="form-control btn btn-dark">Cadastrar</button>
                </div>
            </form>

            <script src="/js/sweetalert2.all.min.js"></script>

            @if (session('aviso'))
                <script>
                    Swal.fire(
                        'Falha ao inserir o Ano lectivo !',
                        '',
                        'error'
                    )

                </script>
            @endif
            @if (session('status'))
                <script>
                    Swal.fire({
                        'Ano Lectivo Cadastrado',
                        '',
                    })

                </script>
            @endif

            @if (session('aviso'))
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro ao cadastrar Ano Lectivo',
                    })

                </script>
            @endif
        </div>
    </div>

@endsection
