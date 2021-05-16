

@extends('layouts._includes.merge.painel')

@section('titulo', 'Lista do Gabarito')

@section('conteudo')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                Lista do Gabarito
            </h2>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">

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
                          <th>TEMA</th>
                          <th>CLASSE</th>
                          <th>DISCIPLINA</th>
                          <th>DATA DE REGISTRO</th>
                          <th>ACÇÕES</th>

                      </tr>
                  </thead>
                  <tbody class="bg-white">

                          @foreach ($gabaritos as $gabarito)
                              <tr class="text-center">
                                   <th>{{$gabarito->id}}</th>
                                  <th>{{$gabarito->id}}</th>
                                  <th>{{$gabarito->id}}</th>
                                  <th>{{$gabarito->vc_descricao_gabarito}}</th>
                                  <th>
                                    <a href="/storage/{{ $gabarito->vc_gabarito}}" target="_blank" style="height:2 0px; width:50px;">Chave da tarefa</a>
                                </th>


                                  @csrf
                                  @method('delete')

                                  <td>
                                      <div class="dropdown">
                                          <button class="btn btn-dark btn-sm dropdown-toggle" type="button" id="dropdownMenuButton"
                                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="fa fa-clone fa-sm" aria-hidden="true"></i>
                                          </button>
                                          {{-- <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            @if(Auth::User()->vc_tipoUtilizador=='Administrador' || Auth::User()->vc_tipoUtilizador=='Professor')
                                              <a href="{{ route('materia.editar') }}"
                                                  class="dropdown-item">Editar</a>

                                                  <a href="{{ route('materia.addvideo') }}" class="dropdown-item"
                                                     >Adicionar VIDEO</a>
                                                     <a href="{{ route('materia.addPDF') }}" class="dropdown-item"
                                                      >Adicionar PDF</a>
                                                      @endif

                                                     <a href="{{ route('materia.supervisionar') }}" class="dropdown-item"
                                                      >Supervisionar</a>


                                                      @if(Auth::User()->vc_tipoUtilizador=='Administrador' || Auth::User()->vc_tipoUtilizador=='Professor')
                                              <a href="{{ route('materia.excluir') }}" class="dropdown-item"
                                              data-confirm="Tem certeza que deseja eliminar?">Eliminar</a>
                                              @endif
                                          </div> --}}
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

@endsection
