@extends('layouts._includes.merge.painel')

@section('titulo', 'Lista de Professores')

@section('conteudo')
    <div class="card mt-3">
        <div class="card-body">
            <h3>Lista de Professores</h3>
        </div>
    </div>



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
    <table class="table datatables table-hover table-bordered" id="dataTable-1">
        <thead class="thead-dark">
            <tr class="text-center">
                <th>ID</th>
                <th>NOME</th>
                <th>FOTO</th>
                <th>EMAIL</th>
                <th>TELEFONE</th>
                <th>ACÇÕES</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @if ($professores)
                @foreach ($professores as $professor)
                    <tr class="text-center">
                        <th>{{ $professor->id }}</th>
                        <th>{{ $professor->vc_primemiroNome . ' ' . $professor->vc_apelido }}</th>
                        <td><img src="{{ url("storage/{$professor->profile_photo_path}") }}"
                                alt="{{ $professor->vc_primeiroNome . ' ' . $professor->vc_ultimoNome }}" width="40">
                        </td>
                        <th>{{ $professor->vc_email }}</th>
                        <td>{{ $professor->vc_telefone }}</td>
                        @csrf
                        @method('delete')
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-dark btn-sm dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-clone fa-sm" aria-hidden="true"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a href="{{ route('professores.vincularEscola', $professor->id) }}"
                                        class="dropdown-item">Vincular escola</a>

                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
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



@endsection
