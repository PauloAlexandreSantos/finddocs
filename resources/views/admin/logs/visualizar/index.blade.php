

@extends('layouts._includes.merge.painel')

@section('titulo', 'Logs de Actividade')

@section('conteudo')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                Logs de Actividade
            </h2>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
          
    <table class="table datatables table-hover table-bordered" id="dataTable-1">
        <thead class="thead-dark">
            <tr class="text-center">
                <th>ID</th>
                <th>DATA</th>
                <th>UTILIZADOR</th>
                <th>ACTIVIDADE</th>
            </tr>
        </thead>
        <tbody class="bg-white">
      
        @foreach ($logs as $log)

<tr class="text-center">

    <td>{{ $log->id}}</td>
    <td>{{ $log->created_at}}</td>
    <td>{{ $log->vc_primemiroNome."  ".$log->vc_apelido }}</td>
    <td>{{ $log->vc_descricao}}</td>
   
</tr>
@endforeach
        </tbody>
    </table>
        </div>
    </div>
@endsection
