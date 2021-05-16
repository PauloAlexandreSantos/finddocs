
@extends('layouts._includes.merge.painel')

@section('titulo', ' Respostas')

@section('conteudo')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
               Respostas
            </h2>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            @foreach ($respostas as $resposta)
                  
                       <p class="text-center">{{$resposta->vc_nomeUtilizador}}</p>
            <a href="{{ url("storage/{$resposta->vc_pdf}") }}"  target="_blanck" class="col-sm-3">{{$resposta->vc_tarefa}}</a>
            
         
 
         @endforeach

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
    <!-- Footer-->
@endsection
