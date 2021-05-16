@extends('layouts._includes.merge.site')
@section('titulo','home')
@section('conteudo')
    <div id="">
        <!-- [LOGIN] -->
        <div class="row" style="margin-right: 0px !important; margin-left: 0px !important">

            <div class="col-lg-8" style="
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: 200%;
                    background-image: -webkit-gradient(linear, right top, left bottom, from(#174694), to(#3a79e777)), url(Assets/Images/banners/banner-1.png);
                    height: 100vh; overflow-y: auto; width: 100%;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12" style="position: relative; top: 400px">
                            <div class="p-1">
                                <h1 class="text-white">AVEA</h1>
                                <h2 class="text-white">Ambiente Virtual de Ensino Angolano</h2>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="col-lg-4" id="login_user">
                <div class="p-5" style="position: relative; top: 180px">
                    <div class="col-lg-12 mt-4">
                        <h4>Bem-vindo(a)!</h4>
                        <p>Entre com a sua conta para acessar nossa plataforma <a href="{{ route('site') }}">AVEA</a></p>
                    </div>
                    <form action="" method="POST" class="mt-4">
                        <div class="col-lg-12 form-group">
                            <input type="email" name="email" class="form-control rounded-0 bg-white" placeholder="E-mail" >
                        </div>
                        <div class="col-lg-12 form-group">
                            <input type="password" name="senha" class="form-control rounded-0 bg-white" placeholder="Palavra-passe" >
                        </div>
                        <div class="col-lg-12 mt-3">
                            <input type="submit" name="login_entrar" class="form-control btn btn-primary rounded-0 bg-danger"  style="background-color: #124871 !important; border: 2px solid #fff" value="Login">
                        </div>
                    </form>
                    <div class="col-lg-12 mt-3">
                        <p>Não possui uma conta? <a href="criar_conta.php">Criar conta</a></p>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- [END LOGIN] -->
    </div>

    <!-- Jquery JS-->
    <script src="assets/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="assets/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="assets/vendor/slick/slick.min.js">
    </script>
    <script src="assets/vendor/wow/wow.min.js"></script>
    <script src="assets/vendor/animsition/animsition.min.js"></script>
    <script src="assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="assets/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="assets/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="assets/vendor/select2/select2.min.js">
    </script>
    <script src="assets/vendor/vector-map/jquery.vmap.js"></script>
    <script src="assets/vendor/vector-map/jquery.vmap.min.js"></script>
    <script src="assets/vendor/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="assets/vendor/vector-map/jquery.vmap.world.js"></script>

    <!-- Main JS-->
    <script src="assets/js/main.js"></script>
    <script>
       
    </script>
@endsection
