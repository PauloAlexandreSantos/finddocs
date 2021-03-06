

@extends('layouts._includes.merge.painel')

@section('titulo', 'Editar Classe')

@section('conteudo')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                Editar Classe
            </h2>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form form action="{{ route('classes.actualizar', $classe->id) }}" method="post" class="row">
                @method('put')
                @csrf
                @include('forms._formClasse.index')

                <div class=" col-md-12 text-center d-flex justify-content-center ">
                    <button type="submit" class=" col-md-2 text-center btn btn-dark"> Comfirmar</button>
                </div>
            </form>

        </div>
    </div>
  
    <!-- Footer-->

@endsection
