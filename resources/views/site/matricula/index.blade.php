@extends('layouts._includes.merge.site')
@section('titulo','home')
@section('conteudo')
    <div id="">
        <!-- [LOGIN] -->
        <div class="row" style="margin-right: 0px !important; margin-left: 0px !important">

            <div class="col-lg-6" style="
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: 200%;
                    background-image: -webkit-gradient(linear, right top, left bottom, from(#174694), to(#3a79e777)), url(/images/site/SlideShow 4.jpg);
                    height: 100vh; overflow-y: auto; width: 100%;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12" style="position: relative; top: 400px">
                            <div class="p-0">
                                <h1 class="text-white">AVEA</h1>
                                <h2 class="text-white">Ambiente Virtual de Ensino Angolano</h2>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-lg-6" id="login_user">
                <div class="p-5" style="position: relative; top: -55px">
                    <div class="row">
                        <div class="col-lg-12 mt-4">
                            <h4>Bem-vindo(a)!</h4>
                            <p>Entre com a sua conta para acessar nossa plataforma <a href="{{ route('site') }}">AVEA</a></p>

                            <div class="resultado p-2 text-center mt-2 bg-danger rounded" style="display: none"></div>
                        </div>
                    </div>

                    <form action="{{ url('/matricula/cadastrar')}}" method="post"  class="mt-4" enctype="multipart/form-data">

                       
                        @csrf

                        @include('forms._formMatricula.index')

                           
                        <div class=" col-md-12 text-center d-flex justify-content-center ">
                            <button type="submit" class=" col-md-2 text-center btn btn-dark"> Cadastrar</button>
                        </div>
                    </form>
                    <div class="col-lg-6 mt-4">
                        <p>Já possuis uma conta? <a href="{{ route('login') }}">Login</a></p>
                    </div>
                   
                </div>
            </div>
            
        </div>
        <!-- [END LOGIN] -->
    </div>
    <!-- sweetalert -->
    <script src="/js/sweetalert2.all.min.js"></script>

    @if (session('status'))
        <script>
            Swal.fire(
                'Usuário Cadastrado',
                '',
                'success'
            )

        </script>
    @endif
    @if (session('aviso'))
        <script>
            Swal.fire(
                'Falha ao cadastrar usuário!',
                'Email existente ou senhas diferentes ',
                'error'
            )

        </script>
    @endif

    <!-- Jquery JS-->
    <script src="/site/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <!-- <script src="/site/vendor/bootstrap-4.1/popper.min.js"></script> -->
    <script src="/site/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <!-- <script src="/site/vendor/animsition/animsition.min.js"></script> -->
    <!-- Main JS-->
    <script src="/site/js/main.js"></script>
    <script>
            // Previsualização 
            function readURL(input) {
                if (input.files || input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $("#image1")
                            .attr('src', e.target.result)
                            .width(150)
                            .height(140)
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
            // Função
            function CadastroPorPassos(){

                $("#continuar_cadastro").on("click", function(e){
                    e.preventDefault();

                    if($("#nome").val() == '' || $("#sobrenome").val() == '' || $("#data").val() == '' || $("#email").val() == '' || $("#tel").val() == ''){
                        $(".resultado").html("<span class='text-white'>Por favor , preencha todos os campos</span>").addClass("animated bounceIn").fadeIn(500, function(){
                            // $(this).fadeOut(3000).addClass("animated bounceOut faster");
                        });
                        // $(".resultado").fadeIn(3000).addClass("animated bounceOut faster");
                    }else {
                        $(".register1").fadeOut(400, function(){
                            $(".register2").fadeIn(400);
                        });
                    }
                });

                $("#regressar_cadastro").on("click", function(e){
                    e.preventDefault();

                    $(".register2").fadeOut(400, function(){
                        $(".register1").fadeIn(400);
                    });
                });

            }
            CadastroPorPassos();

            $("#escola_frequenta").on("change", function(){
                var escola = $(this).val();

                if(escola == 'Sim'){
                    $(".res_questao").attr('disabled', false);
                }else {
                    $(".res_questao").attr('disabled', true);
                }
            });

            $("#provincia").on("change", function(){
                var id = $(this).val();

                $.ajax({
                    url: "public/busca_municipio.php",
                    type: "POST",
                    data: {id:id},
                    beforeSend: function(){
                        $('#municipio_select').css({'display':'block'});
                        $('#municipio_select').html('Carregando');
                        $('#municipio_select').attr('disabled', false)
                    }, 
                    success: function(data){
                        $('#municipio_select').css({'display':'block'});
                        $('#municipio_select').html(data);
                    }, 
                    error:function(){
                        $('#municipio_select').css({'display':'block'});
                        $('#municipio_select').html('Houve um erro ao carregar');
                    }
                });
            })
    </script>
@endsection