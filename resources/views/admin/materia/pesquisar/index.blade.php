
@extends('layouts._includes.merge.painel')

@section('titulo', ' Buscar Materia')

@section('conteudo')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                 Buscar Materia
            </h2>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{url('/materia/listarMateria/')}}" method="post" class="row">
                @csrf

                <div class="form-group col-md-6">
                    <label for="vc_anolectivo" class="form-label">Ano Lectivo:</label>
                    <select name="id_anoLectivo" id="vc_anolectivo" class="form-control" required>
                        <option value="" disabled selected>Seleciona o ano:</option>
                        @foreach ($anoslectivos as $anolectivo)
                            <option value="{{ $anolectivo->id }}">
                                {{ $anolectivo->ya_inicio . '-' . $anolectivo->ya_fim }}
                            </option>
                        @endforeach
                    </select>

                </div>
               
                    <div class="form-group col-md-6 ">
                        <label for="it_id_classeDisciplina">{{ __('ClasseDisciplina') }}</label>
                        <select class="form-control" name="it_id_classeDisciplina" id="it_id_classeDisciplina" required >
                    
                            <option value="" disabled selected>Seleciona a Classe|Disciplina</option>
                    @foreach ($classesDisciplinas as $classeDisciplina)
                    <option value="{{$classeDisciplina->id_c_d}}" >
                        {{$classeDisciplina->vc_classe}}ª Classe|{{$classeDisciplina->vc_disciplina}}</option>
                         @endforeach
                         
                        </select>
                
                    </div>
                
                <div class=" col-md-12 text-center d-flex justify-content-center ">
                    <button type="submit" class=" col-md-2 text-center btn btn-dark"> Buscar</button>
                </div>
              
            </form>
        </div>
    </div>
    <!-- sweetalert -->
    <script src="/js/sweetalert2.all.min.js"></script>

    @if (session('status'))
        <script>
            Swal.fire(
                'Matrícula Cadastrado',
                '',
                'success'
            )

        </script>
    @endif
    @if (session('aviso'))
        <script>
            Swal.fire(
                'Falha ao cadastrar a Matrícula!',
                '',
                'error'
            )

        </script>
    @endif
    

@endsection

