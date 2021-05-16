@extends('layouts._includes.merge.site')
@section('titulo', 'ERRO 404')
@section('conteudo')
    <div class="main-container">
        <section class="no-pad error-page bg-primary fullscreen-element">
            <div class="container align-vertical">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <i class="icon icon-compass"></i>
                        <h1 class="jumbo">404</h1>
                        <h1><strong>Parece que o desencaminhamos!</strong><br>Vamos voltar aos trilhos ...</h1>
                        <a href="{{ url('/')}}" class="btn btn-primary btn-white" target="default">Me leve para casa</a>
                      {{--   <a href="#" class="btn btn-primary btn-white btn-text-only">Report This</a> --}}
                    </div>
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </section>
    </div>

@endsection
