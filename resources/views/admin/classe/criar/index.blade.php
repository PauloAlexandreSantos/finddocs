

@extends('layouts._includes.merge.painel')

@section('titulo', 'Cadastrar Classe')

@section('conteudo')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                Cadastrar Classe
            </h2>
        </div>
        
        <script src="/js/sweetalert2.all.min.js"></script>
    @if (session('teste'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Classe Inexistente',
        })
    </script>
@endif
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ url('classes/cadastrar')}}" method="post" class="row">
                @csrf

                @include('forms._formClasse.index')

                <div class=" col-md-12 text-center d-flex justify-content-left ">
                    <button type="submit" class=" col-md-2 text-center btn btn-dark"> Cadastrar</button>
                </div>
              
            </form>
        </div>
    </div>
 <!-- sweetalert -->
 <script src="/js/sweetalert2.all.min.js"></script>

 @if (session('status'))
     <script>
         Swal.fire(
             'Classe Cadastrado',
             '',
             'success'
         )

     </script>
 @endif
 @if (session('aviso'))
     <script>
         Swal.fire(
             'Falha ao cadastrar Classe!',
             '',
             'error'
         )

     </script>
 @endif
@endsection
