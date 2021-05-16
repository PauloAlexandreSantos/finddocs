@extends('layouts._includes.merge.site')
@section('titulo', 'Avea')
@section('conteudo')
    <div class="main-container">
        <section class="hero-slider">
            <ul class="slides">
                <li class="overlay">
                    <div class="background-image-holder parallax-background">
                        <img class="background-image" alt="Background Image" src="/site/img/hero17.jpg">
                    </div>

                    <div class="container align-vertical">
                        <div class="row">
                            <div class="col-md-10 col-sm-10">
                                <h1 class="text-white">Apresentamos para si à plataforma de ensino a distância e
                                    semi-presencial no ensino primário e secundário do governo angolano</h1>

                                @empty(Auth::user()->vc_tipoUtilizador)
                                    <a href="{{ url('/site/users/cadastrar') }}" class="btn btn-primary btn-filled">Cadastrar
                                        Encarregado</a>
                                @endempty
                            </div>
                        </div>
                    </div>
                    <!--end of container-->
                </li>
                <!--end of individual slide-->

                <!--end of individual slide-->

                <li class="overlay">
                    <div class="background-image-holder parallax-background">
                        <img class="background-image" alt="Background Image" src="/site/img/hero7.jpg">
                    </div>

                    <div class="container align-vertical">
                        <div class="row">
                            <div class="col-md-8 col-sm-9">
                                <h1 class="text-white">Ambiente Virtual de Ensino Angolano. <br>Ferramenta de apoio no seu
                                    processo de ensino-aprendizagem.

                                </h1>
                                {{-- <a target="_blank" href="http://www.mediumra.re/pivot/variant/builder.html"
                                    class="btn btn-primary btn-white">Customize Pivot</a> --}}

                                @empty(Auth::user()->vc_tipoUtilizador)
                                    <a href="{{ url('/site/users/cadastrar') }}" class="btn btn-primary btn-filled">Cadastrar
                                        Encarregado</a>
                                @endempty
                            </div>
                        </div>
                    </div>
                    <!--end of container-->
                </li>
                <!--end of individual slide-->


            </ul>
        </section>

        {{-- disciplinas --}}
        <section class="blog-masonry bg-muted">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 text-center">
                        <div class="row">
                            <div class="col-12 col-md-12 text-left">
                                <h1 class="mb--4">
                                    <b>1ª Classe </b>
                                    <small>Iº Ciclo do Ensino Primário</small>
                                </h1>
                            </div>
                            <div class="col-12 col-md-12 text-left">
                                <div class="row disciplinas_slick">
                                    @foreach ($cds as $item)
                                        @if ($item->vc_classe == 1)
                                            <div class="col-md-4 blog-masonry-item ">
                                                <div class="item-inner">
                                                    <img src="storage/{{ $item->vc_imagem }}" class="size-image-ch">
                                                    <div class="post-title">
                                                        <div class="post-meta">
                                                            <span class="sub alt-font">{{ $item->vc_disciplina }}</span>
                                                            <span class="sub alt-font">{{ $item->vc_classe }}ª
                                                                classe</span>
                                                        </div>
                                                        <a target="_blank"
                                                            href="{{ route('materia.aluno', ['id' => $item->id]) }}"
                                                            class="link-text">Ver
                                                            Matéria</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-12 col-md-12 text-left">
                                <h1 class="mb--4">
                                    <b>4ª Classe</b>
                                    <small>IIº Ciclo do Ensino Primário</small>
                                </h1>
                            </div>
                            <div class="col-12 col-md-12 text-left">
                                <div class="row disciplinas_slick">
                                    @foreach ($cds as $item)
                                        @if ($item->vc_classe == 4)
                                            <div class="col-md-4 blog-masonry-item ">
                                                <div class="item-inner">
                                                    <img src="storage/{{ $item->vc_imagem }}" class="size-image-ch">
                                                    <div class="post-title">
                                                        <div class="post-meta">
                                                            <span class="sub alt-font">{{ $item->vc_disciplina }}</span>
                                                            <span class="sub alt-font">{{ $item->vc_classe }}ª
                                                                classe</span>
                                                        </div>
                                                        <a target="_blank"
                                                            href="{{ route('materia.aluno', ['id' => $item->id]) }}"
                                                            class="link-text">Ver
                                                            Matéria</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>


                            <div class="col-12 col-md-12 text-left ">
                                <h1 class="mb--4">
                                    <b>7ª Classe </b>
                                    <small>Iº Ciclo do Ensino Secundário</small>
                                </h1>
                            </div>
                            <div class="col-12 col-md-12 text-left">
                                <div class="row disciplinas_slick">
                                    @foreach ($cds as $item)
                                        @if ($item->vc_classe == 7)
                                            <div class="col-md-4 blog-masonry-item ">
                                                <div class="item-inner">
                                                    <img src="storage/{{ $item->vc_imagem }}" class="size-image-ch">
                                                    <div class="post-title">
                                                        <div class="post-meta">
                                                            <span class="sub alt-font">{{ $item->vc_disciplina }}</span>
                                                            <span class="sub alt-font">{{ $item->vc_classe }}ª
                                                                classe</span>
                                                        </div>
                                                        <a target="_blank"
                                                            href="{{ route('materia.aluno', ['id' => $item->id]) }}"
                                                            class="link-text">Ver Matéria</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                        </div>


                    </div>

                    <div class="col-12 col-md-12 text-center ">
                        <a href="{{ route('site.anos-escolaridade') }}" class="btn btn-primary">ver mais classes</a>
                    </div>
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </section>

        {{-- ./disciplinas --}}



        <section class="side-image text-heavy clearfix">
            <div class="image-container col-md-5 col-sm-3 pull-left">
                <div class="background-image-holder">
                    <img class="background-image" alt="Background Image" src="/site/img/side2.jpg">
                </div>
            </div>

            <div class="container">

                <div class="row">

                    <div class="col-md-6 col-md-offset-6 col-sm-8 col-sm-offset-4 content clearfix">
                        <h1>Sobre o ensino à distância</h1>
                        <p class="lead">
                            As metodologias mais eficientes no ensino presencial são também as mais adequadas ao
                            ensino a distância. O que muda, basicamente, não é a metodologia de ensino, mas a forma de
                            comunicação.
                        </p>
                        @empty(Auth::user()->vc_tipoUtilizador)
                            <a href="{{ url('/site/users/cadastrar') }}" class="btn btn-primary">Cadastrar
                                Encarregado</a>
                        @else
                            <a href="{{ route('home') }}" class="btn btn-primary btn-filled">Acessar o meu painel</a>
                        @endempty
                        <br>

                        <div class="col-sm-6 no-pad-left feature">
                            <h5>Tons Of Elements</h5>
                            <p>
                                Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci
                                velit, sed quia non numquam eius modi tempora incidunt ut labor
                            </p>
                        </div>

                        <div class="col-sm-6 no-pad-left feature">
                            <h5>Video Walkthroughs</h5>
                            <p>
                                Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci
                                velit, sed quia non numquam eius modi tempora incidunt ut labor
                            </p>
                        </div>
                    </div>

                </div>
                <!--end of row-->

            </div>
        </section>


        <section class="side-image clearfix">

            <div class="container">
                <div class="row">
                    <div class="col-md-6 content col-sm-8 clearfix">
                        <h1>Plataforma didática do MED</h1>

                        <ul class="blog-snippet-2">
                            <li>
                                <div class="icon">
                                    <i class="icon icon-pencil"></i>
                                </div>
                                <div class="title">
                                    <a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid,
                                        aspernatur?</a>
                                    <span class="sub alt-font">Published on July 15th 2014</span>
                                </div>
                            </li>

                            <li>
                                <div class="icon">
                                    <i class="icon icon-calendar"></i>
                                </div>
                                <div class="title">
                                    <a href="#">Lorem ipsum dolor sit amet consectetur.</a>
                                    <span class="sub alt-font">Published on July 10th 2014</span>
                                </div>
                            </li>

                            <li>
                                <div class="icon">
                                    <i class="icon icon-newspaper"></i>
                                </div>
                                <div class="title">
                                    <a href="#">Lorem ipsum dolor sit amet.</a>
                                    <span class="sub alt-font">Published on July 7th 2014</span>
                                </div>
                            </li>

                            <li>
                                <div class="icon">
                                    <i class="icon icon-pencil"></i>
                                </div>
                                <div class="title">
                                    <a href="#">Lorem, ipsum dolor sit amet consectetur adipisicing.</a>
                                    <span class="sub alt-font">Published on July 3rd 2014</span>
                                </div>
                            </li>
                        </ul>

                    </div>
                    <!--end of row-->


                </div>
                <!--end of container-->
            </div>

            <div class="image-container col-md-5 col-sm-3 pull-right">
                <div class="background-image-holder">
                    <img class="background-image" alt="Background Image" src="/site/img/hero10.jpg">
                </div>
            </div>

        </section>

        <section class="clients-3">
            <div class="container">
                <div class="col-12 col-md-12 text-center">
                    <div class="row">
                        <div class="col-md-4">
                            <img alt="Client Logo" src="/site/img/gov.ao.png" width="100" height="80">
                        </div>
                        <div class="col-md-4">
                            <img alt="Client Logo" src="/site/img/minttics.gov.png">
                        </div>

                        <div class="col-md-4">
                            <img alt="Client Logo" src="/site/img/med.gov.png">
                        </div>

                    </div>
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </section>



    </div>


@endsection
