@extends('layouts._includes.merge.site')
@section('titulo', 'Avea - Sobre o Avea')
@section('conteudo')

    <div class="main-container">
        <header class="page-header">
            <div class="background-image-holder parallax-background">
                <img class="background-image" alt="Background Image" src="/site/img/hero17.jpg">
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <span class="text-white alt-font">Ambiente Virtual de Ensino Angolano</span>
                        <h1 class="text-white">Sobre o AVEA</h1>
                        {{-- <p class="text-white lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et dolor rerum
                            consequuntur?</p> --}}
                    </div>
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </header>

        <section class="duplicatable-content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="feature">
                            <h5>O que é o Ambiente Virtual de Ensino Angolano?</h5>
                            <p>
                                Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut
                                et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a
                                sapiente delectus
                            </p>
                        </div>
                    </div>
                    <!--end 4 col-->

                    <div class="col-sm-4">
                        <div class="feature">
                            <h5>A quem se destina o Ambiente Virtual de Ensino Angolano?</h5>
                            <p>
                                Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut
                                et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a
                                sapiente delectus
                            </p>
                        </div>
                    </div>
                    <!--end 4 col-->

                    <div class="col-sm-4">
                        <div class="feature">
                            <h5>Como estão organizados os blocos pedagógicos?</h5>
                            <p>
                                Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut
                                et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a
                                sapiente delectus
                            </p>
                        </div>
                    </div>
                    <!--end 4 col-->
                </div>
                <!--end of row-->
            </div>
        </section>

        <section class="no-pad clearfix">

            <div class="col-md-6 col-sm-12 no-pad">

                <div class="feature-box">

                    <div class="background-image-holder overlay">
                        <img class="background-image" alt="Background Image" src="/site/img/header2.jpg">
                    </div>

                    <div class="inner">
                        <span class="alt-font text-white">República de Angola</span>
                        <h1 class="text-white">Educação em Angola</h1>
                        <p class="text-white">
                            A educação em Angola diz respeito ao conjunto de elementos formais que se somam para formar do
                            sistema de ensino do país, que mescla estabelecimentos de ensino público, privado e
                            comunitário/confessional.
                        </p>
                        <a href="https://pt.wikipedia.org/wiki/Educa%C3%A7%C3%A3o_em_Angola"
                            class="btn btn-primary btn-white" target="_blank">Saber mais</a>
                    </div>
                </div>

            </div>

            <div class="col-md-6 col-sm-12 no-pad">

                <div class="feature-box">

                    <div class="background-image-holder overlay">
                        <img class="background-image" alt="Background Image" src="/site/img/hero8.jpg">
                    </div>

                    <div class="inner">
                        <span class="alt-font text-white">#Wikipedia</span>
                        <h1 class="text-white">Educação a distância </h1>
                        <p class="text-white">
                            é uma modalidade de educação mediada por tecnologias em que discentes e docentes estão separados
                            espacial e/ou temporalmente, ou seja, não estão fisicamente presentes em um ambiente presencial
                            de ensino-aprendizagem
                        </p>
                        <a target="_blank" href="https://pt.wikipedia.org/wiki/Educa%C3%A7%C3%A3o_a_dist%C3%A2ncia"
                            class="btn btn-primary btn-white">Saber mais</a>
                    </div>
                </div>
            </div>

        </section>





    </div>

@endsection
