@extends('layouts._includes.merge.painel')

@section('titulo', 'Lista de Tarefas')

@section('conteudo')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                Lista de Tarefas
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
                        'Tarefa cadastrada com sucesso',
                        '',
                        'success'
                    )

                </script>
            @endif

            <script src="/js/sweetalert2.all.min.js"></script>
            @if (session('eliminar'))
                <script>
                    Swal.fire(
                        'Tarefa eliminada com sucesso',
                        '',
                        'success'
                    )

                </script>
            @endif


            <script src="/js/sweetalert2.all.min.js"></script>
            @if (session('actualizar'))
                <script>
                    Swal.fire(
                        'Tarefa actualizada com sucesso',
                        '',
                        'success'
                    )

                </script>
            @endif


            <table class="table datatables table-hover table-bordered" id="dataTable-1">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th>ID</th>
                        <th>TÍTULO</th>
                        <th>DESCRIÇÃO</th>
                        <th>DATA DE ENTREGA</th>
                        <th>CLASSE|DISCIPLINA</th>

                        <th>ACÇÕES</th>
                    </tr>
                </thead>
                <tbody class="bg-white">

                    @foreach ($tarefas as $tarefa)

                        <tr class="text-center">
                            <th>{{ $tarefa->id }}</th>
                            <th>{{ $tarefa->vc_tarefa }}</th>
                            <th>{{ $tarefa->vc_descricao }}</th>
                            <th>{{ $tarefa->dt_data_entrega }}</th>

                            <th>{{ $tarefa->vc_classe }}ª Classe|{{ $tarefa->vc_disciplina }}</th>

                            @csrf
                            @method('delete')
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-dark btn-sm dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="fa fa-clone fa-sm" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                            @if(Auth::User()->vc_tipoUtilizador=='Administrador' )
                                            <a href="{{ route('tarefas.editar', $tarefa->id_tarefa) }}"
                                                class="dropdown-item">Editar</a>


                                            <a href="{{ route('tarefas.eliminar', $tarefa->id_tarefa) }}"
                                                class="dropdown-item"
                                                data-confirm="Tem certeza que deseja eliminar?">Eliminar</a>
                                            @endif
                                            @if(Auth::User()->vc_tipoUtilizador=='Administrador' ||   Auth::User()->vc_tipoUtilizador=='Professor')
                                            <a href="{{ route('tarefas.respostas', $tarefa->id_tarefa) }}"
                                                class="dropdown-item">Respostas</a>
                                                @endif
                                            @if(Auth::User()->vc_tipoUtilizador=='Administrador' ||   Auth::User()->vc_tipoUtilizador=='Filho')
                                            <a href="{{ route('Tarefas_Submetidas.submeter', $tarefa->id_tarefa) }}"
                                                class="dropdown-item">Submeter</a>
                                                @endif

                                                 @if(Auth::User()->vc_tipoUtilizador=='Administrador' )
                                            <a href="{{route('gabarito.criar')}}"
                                                class="dropdown-item">Enviar Gabarito</a>
                                                @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <script src="/js/datatables/jquery-3.5.1.js"></script>

            <script>
                $(document).ready(function() {

                    //start delete
                    $('a[data-confirm]').click(function(ev) {
                        var href = $(this).attr('href');
                        if (!$('#confirm-delete').length) {
                            $('table').append(
                                '<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"> <div class="modal-header"> <h5 class="modal-title" id="exampleModalLabel">Eliminar os dados</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que pretende elimnar?</div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button> <a  class="btn btn-info" id="dataConfirmOk">Eliminar</a> </div></div></div></div>'
                            );
                        }
                        $('#dataConfirmOk').attr('href', href);
                        $('#confirm-delete').modal({
                            shown: true
                        });
                        return false;

                    });
                    //end delete
                });

            </script>
            <!-- Footer-->
        </div>
    </div>

@endsection
