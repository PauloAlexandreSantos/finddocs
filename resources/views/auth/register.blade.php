



@extends('layouts._includes.merge.painel')

@section('titulo', 'Usuário/Cadastrar')

@section('conteudo')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
               Cadastrar Usuário
            </h2>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}" class="ml-3">
                @csrf
                @include('forms._formUser.index')
                <div class="form-group col-sm-4">
            <label for="" class="text-white form-label">.</label>
            <button type="submit" class="form-control btn btn-dark">   {{ __('Cadastrar') }}</button>
        </div>
                
            </form>
        </div>
    </div>

@endsection
