@extends('layouts._includes.merge.site')
@section('titulo', 'Avea - Login')
@section('conteudo')


    <h1 class="text-white">Aceder a minha conta
        <p class="text-white lead">Introduza os seus dados de acesso à sua conta!</p>
    </h1>


    <form method="post" action="{{ route('login') }}">
        @csrf
        <div class="row">
            <div class="col-md-3 col-sm-4 col-md-offset-3 col-sm-offset-2">
                <input class="signup-email-field validate-required validate-email" id="email" type="email"
                    placeholder="Endereço de email" name="vc_email" required autocomplete="off">
            </div>

            <div class="col-md-3 col-sm-4">
                <input class="form-password" id="password" type="password" placeholder="Palavra passe" name="password"
                    required autocomplete="off">
            </div>

            <div class="col-md-12 col-md-offset-0 col-sm-4 col-sm-offset-4 text-center">
                {{-- <input  class="btn btn-primary " value=""> --}}
                <input type="submit" class="btn btn-primary btn-filled" value="Entrar">
            </div>
        </div>
        <!--end of row-->
    </form>
@endsection
