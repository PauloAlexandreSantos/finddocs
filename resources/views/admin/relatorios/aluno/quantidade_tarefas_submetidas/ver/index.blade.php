

@extends('layouts._includes.merge.painel')

@section('titulo', 'Relatório de Tarefas Submetidas')

@section('conteudo')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                Relatório de Tarefas Submetidas
            </h2>
        </div>
        
        <script src="/js/sweetalert2.all.min.js"></script>
    @if (session('teste'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Classe Inexistente',
        })
    </script>
@endif
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{route('listar_tarefas_submetidas')}}" method="post" class="row">
                @csrf

                @include('forms._formQuantidadeTarefaSubmetida.index')
                <div class="col-md-12 text-left  justify-content-left">
                <button type="submit" class="btn btn-dark" href="{{route('listar_alunos_classe',[1,1])}}"> Ver Lista
                </button>
            </div>
              
            </form>
        </div>
    </div>
 <!-- sweetalert -->

@endsection
