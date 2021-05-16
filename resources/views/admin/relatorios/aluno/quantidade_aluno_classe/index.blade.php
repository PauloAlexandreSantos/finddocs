@extends('layouts._includes.merge.painel')

@section('titulo', 'Lista de Alunos por Classes')

@section('conteudo')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title justify-content-left">
                Lista de Alunos por Classes <br> Escola: {{$it_id_escolaLista}} <br> Ano Lectivo: {{$it_id_anoLectivoLista}}.
                             
               
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
                    <a href="{{route('imprimir_alunos_classe',[$it_id_anoLectivo,$it_id_escola,$it_id_anoLectivoLista,$it_id_escolaLista])}}" class="form-control btn btn-dark">Gerar Pdf</a>
                </div>
    <table id="example" class="display table table-hover table-bordered">
        <thead class="thead-dark">
            <tr class="text-center">
                <th>CLASSE</th>              
                <th>Quantidade</th>               
            </tr>
        </thead>
        <tbody class="bg-white">
           
                @foreach ($classes as $classe)
                    <tr class="text-center">
                        <th>{{$classe->vc_classe}}</th>
                        <th>{{$classe->quantidade}}</th>
                                             
                @endforeach
         
        </tbody>
    </table>
    <script src="/js/datatables/jquery-3.5.1.js"></script>
    <!-- Footer-->
        </div>
    </div>

@endsection
