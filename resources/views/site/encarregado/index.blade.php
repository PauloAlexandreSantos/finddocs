@extends('layouts._includes.merge.site')
@section('titulo', 'Avea - Cadastrar Encarregado')
@section('conteudo')

    <div class="main-container">
        <header class="signup">
            <div class="background-image-holder parallax-background">
                <img class="background-image" alt="Background Image" src="/site/img/index.encarregado.jpg">
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center">
                        <h1 class="text-white">Bem-vindo(a) Encarregado(a) de Educação!<br>

                            <p class="text-white lead">
                                Os seus dados pessoais são protegidos e respeitados dentro da Lei de Protecção de Dados
                                Pessoais
                            </p>
                        </h1>
                    </div>
                </div>
                <!--end of row-->

                <div class="row">

                    <div class="col-sm-12 text-center">
                        <div class="photo-form-wrapper">

                            <form action="{{ url('users/salvar') }}" method="post" class="mt-4" class="row"
                                enctype="multipart/form-data">

                                @csrf
                                {{-- <div class="col-md-12">
                                    <h4 class="text-white">
                                        <b>Dados Pessoais</b>
                                        <hr>
                                    </h4>
                                </div> --}}
                                <div class="col-md-3 col-sm-6">
                                    <span class="text-white">Carregue sua foto de Perfil</span>
                                    <input type="file" name="profile_photo_path" required>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <span class="text-white">Primeiro Nome</span>
                                    <input class="signup-name-field text-black" type="text" placeholder="Primeiro Nome"
                                        name="vc_primemiroNome" required autocomplete="off">
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <span class="text-white">Nomes do Meio</span>
                                    <input class="signup-name-field text-black" type="text" placeholder="Nomes do Meio">
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <span class="text-white">Apelido</span>
                                    <input class="signup-name-field text-black" name="vc_apelido" type="text"
                                        placeholder="Apelido" required autocomplete="off">
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <span class="text-white">Bilhete de Identidade</span>
                                    <input class="signup-name-field text-black" type="text" name="vc_BI"
                                        placeholder="Bilhete de Identidade" minlength="14" maxlength="14" required
                                        autocomplete="off">
                                </div>

                                <div class="col-md-3 col-sm-6">
                                    <span class="text-white">Gênero</span>
                                    <select class="text-black" name="vc_genero" required>
                                        <option disabled value="" selected>selecione o gênero</option>
                                        <option value="masculino">Masculino</option>
                                        <option value="feminino">Feminino</option>
                                    </select>
                                </div>

                                <div class="col-md-3 col-sm-6">
                                    <span class="text-white">Telefone</span>
                                    <input class="signup-number-field text-black" type="number" placeholder="Telefone"
                                        name="vc_telefone" required min="900000000" max="1000000000" maxlength="9"
                                        autocomplete="off">
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <span class="text-white">Data de Nascimento</span>
                                    <input class="signup-date-field text-black" type="date"
                                        placeholder="Data de Nascimento">
                                </div>

                                {{-- <div class="col-md-12">

                                    <h4 class="text-white">
                                        <b>Dados da Conta</b>
                                        <hr>
                                    </h4>
                                </div> --}}

                                <div class="col-md-3 col-sm-6">
                                    <span class="text-white">Nome de Utilizador</span>
                                    <input class="signup-name-field text-black" type="text" placeholder="Nome de Utilizador"
                                        name="vc_nomeUtilizador" required autocomplete="off">
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <span class="text-white">Endereço de Email</span>
                                    <input class="form-email text-black" type="email" placeholder="Endereço de Email"
                                        name="vc_email" required autocomplete="off">
                                </div>

                                <div class="col-md-3 col-sm-6">
                                    <span class="text-white">Senha</span>
                                    <input class="form-password text-black" type="password" placeholder="Senha"
                                        name="password" required>
                                </div>

                                <div class="col-md-3 col-sm-6">
                                    <span class="text-white">Confirmar a Senha</span>
                                    <input class="form-password2 text-black" type="password" placeholder="Confirmar a Senha"
                                        name="password_confirmation" required>
                                </div>


                                <input type="submit" class="btn btn-primary btn-filled" value="Cadastrar-se">

                            </form>

                        </div>
                        <!--end of photo form wrapper-->
                        <div class="text-center">
                            <span class="text-white">
                                Já possui uma conta? <a href="{{ route('login') }}">Iniciar sessão ➞</a>
                            </span>
                        </div>
                    </div>

                </div>
                <!--end of row-->

            </div>
            <!--end of container-->
        </header>

        {{-- <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 text-center">
                        <i class="icon icon-jumbo icon_info"></i>
                        <div id="tweets" data-widget-id="492085717044981760">

                        </div>
                        <p>
                            Após fazer o cadastro e o login, <strong>vá em actualizar os seus dados para completar o
                                cadastro</strong> com os dados pessoais
                        </p>
                    </div>
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </section> --}}

    </div>


    <script src="/js/sweetalert2.all.min.js"></script>
    @if (session('aviso'))
        <script>
            Swal.fire(
                'Falha ao cadastrar usuário!',
                'Email existente ou senhas diferentes ',
                'error'
            )

        </script>
    @endif
@endsection
