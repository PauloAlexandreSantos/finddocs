@extends('layouts._includes.merge.painel')

@section('titulo', 'Lista de Tarefas Submetidas')

@section('conteudo')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title justify-content-left">
                Lista de Tarefas Submetidas <br> Ano Lectivo: {{$it_id_anoLectivoLista}}.
                             
               
            </h2>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
        <!-- sweetalert -->
  <script src="/js/sweetalert2.all.min.js"></script>
  @if (session('status'))
      <script>
          Swal.fire(
              'Dados Actualizados com sucesso',
              '',
              'success'
          )

      </script>
  @endif

  <div class="form-group col-md-2">
                    <a href="{{route('imprimir_tarefas_submetidas',[$it_id_anoLectivo,$it_id_classesDiciplina,$it_id_anoLectivoLista])}}" class="form-control btn btn-dark">Gerar Pdf</a>
                </div>
    <table id="example" class="display table table-hover table-bordered">
        <thead class="thead-dark">
            <tr class="text-center">
                <th>TAREFA</th>
                <th>CLASSE</th>
                <th>DISCIPLINA</th>                  
                <th>QUANTIDADE</th>               
            </tr>
        </thead>
        <tbody class="bg-white">
           
                @foreach ($tarefas as $tarefa)
                    <tr class="text-center">
                        <th>{{$tarefa->vc_tarefa}}</th>
                        <th>{{$tarefa->vc_classe}}</th>
                        <th>{{$tarefa->vc_disciplina}}</th>
                        <th>{{$tarefa->quantidade}}</th>
                                             
                @endforeach
         
        </tbody>
    </table>
    <script src="/js/datatables/jquery-3.5.1.js"></script>
    <!-- Footer-->
        </div>
    </div>

@endsection
