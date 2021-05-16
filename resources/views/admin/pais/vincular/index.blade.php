@extends('layouts._includes.merge.painel')

@section('titulo', 'Professor|Escola')

 @section('conteudo')
    <div class="card mt-3">
        <div class="card-body">
            <h2>Professor|Escola</h2>
        </div>
    </div>

    <script src="/js/sweetalert2.all.min.js"></script>
    
    @if (session('status'))
 
        <script>
            Swal.fire(
                'Professor vinculado com  sucesso',
                '',
                'success'
            )

        </script>
    @endif


    @if (session('up'))
 
    <script>
        Swal.fire(
            'Professor actualizado com  sucesso',
            '',
            'success'
        )

    </script>
@endif

    <div class="card shadow mt-2">
        <div class="card-body">
            <form action="{{ url("professores/$id_professor/vincular")}}" method="post" class="row"  enctype="multipart/form-data">
                @csrf

                @include('forms._formProfessor.index')

                <div class=" col-md-12 text-center d-flex justify-content-center ">
                    <button type="submit" class=" col-md-2 text-center btn btn-dark"> Cadastrar</button>
                </div>
                {{-- <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div> --}}
            </form>
        </div>
    </div>
    <!-- sweetalert -->
    
    

@endsection
