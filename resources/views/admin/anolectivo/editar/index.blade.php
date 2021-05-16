

    @extends('layouts._includes.merge.painel')

@section('titulo', 'Home')

@section('conteudo')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                Editar Ano Lectivo <b>{{ $anolectivo->ya_inicio."-".$anolectivo->ya_fim }}</b>
            </h2>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <form action=" {{ route('admin/anolectivo/atualizar', $anolectivo->id) }}" method="post" class="row">
            @csrf
            @method('PUT')

            <div class="form-group col-sm-2">
                <label for="" class="form-label">ID do Ano Lectivo</label>
                <input type="text" class="form-control" value="{{ isset($anolectivo->id) ? $anolectivo->id : '' }}" disabled>
            </div>

            @include('forms._formAnoLectivo.index')
            <div class="form-group col-sm-2">
                <label for="" class="text-white form-label">.</label>
                <button class="form-control btn btn-dark">Salvar Alterações</button>
            </div>
        </form>

    </div>
</div>

@endsection
