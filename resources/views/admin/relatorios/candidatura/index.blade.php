@extends('layouts.admin')
@section('titulo', 'Home')

 @section('conteudo')
    <div class="card mt-3">
        <div class="card-body">
            <h3>Relatório Estatístico de Candidatura</h3>
        </div>
    </div>


 


    <div class="card">
        <div class="card-body">
            <form action="{{url('Admin/recebeRec')}}" class="row" method="POST" target="_blank">
                @csrf
                <div class="form-group col-md-4">
                    <label for="vc_anolectivo" class="form-label">Ano Lectivo:</label>
                    <select name="vc_anolectivo" id="vc_anolectivo" class="form-control" required>
                        <option value="Todos">Todos</option>
                        @foreach ($anoslectivos as $anolectivo)
                            <option value="{{ $anolectivo->ya_inicio . '-' . $anolectivo->ya_fim }}">
                                {{ $anolectivo->ya_inicio . '-' . $anolectivo->ya_fim }}
                            </option>
                        @endforeach
                    </select>

                </div>
               
                <div class="form-group col-md-3">
                    <label for="" class="form-label text-white">.</label>
                    <button class="form-control btn btn-dark">Pesquisar</button>
                </div>

            </form>
        </div>
    </div>





@endsection


