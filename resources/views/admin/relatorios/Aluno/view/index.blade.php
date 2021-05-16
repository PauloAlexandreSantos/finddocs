@extends('layouts._includes.merge.painel')

@section('titulo', 'Alunos por Município')

 @section('conteudo')
    <div class="card mb-2">
        <div class="card-body">
        <h2 class="h5 page-title">
       Total de  Alunos por Município
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
                            
                               
                  
  <div class="form-group col-md-2">
                    <a href="{{route('admin.visualizar.pdf',[$data,$data1])}}" class="form-control btn btn-dark">Gerar Relatório</a>
                </div>
  <table id="example" class="display table table-hover table-bordered">
        <thead class="thead-dark">
            <tr class="text-center">
        
                <th width="1px">Nº</th>
                <th>Municipio</th>
                <th>Total de Alunos</th>
            </tr>
        </thead>
        <tbody class="bg-white">

            <?php $contador = 1; ?>
            <?php foreach ($totalGeral as $totalGeral) : ?>

                <tr class="text-center">
                    <td><?php echo $contador++; ?></td>
                    <td><?php echo $totalGeral->m ?></td>
                    <td><?php echo $totalGeral->total ?></td>
                </tr>

            <?php endforeach; ?>

            <br>
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
    
    </div>
    </div>

@endsection

