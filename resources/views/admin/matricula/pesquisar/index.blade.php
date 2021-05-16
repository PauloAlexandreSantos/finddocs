
@extends('layouts._includes.merge.painel')

@section('titulo', 'Listar Matriculas')

@section('conteudo')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                 Listar Matriculas
            </h2>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{url('/matricula/listar')}}" method="post" class="row">
                @csrf

                <div class="form-group col-md-6">
                    <label for="vc_anolectivo" class="form-label">Ano Lectivo:</label>
                    <select name="it_id_anolectivo" id="vc_anolectivo" class="form-control">
                        <option value="Todos">Todos</option>
                        @foreach ($anoslectivos as $anolectivo)
                            <option value="{{ $anolectivo->id }}">
                                {{ $anolectivo->ya_inicio . '-' . $anolectivo->ya_fim }}
                            </option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group col-md-6">
                    <label for="vc_curso" class="form-label">Classe:</label>
                    <select name="id_classe" id="vc_curso" class="form-control">
                        <option value="Todos">Todos</option>
                        @foreach ($classes as $classe)
                            <option value="{{ $classe->id }}">
                                {{ $classe->vc_classe }}ª Classe
                            </option>
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

