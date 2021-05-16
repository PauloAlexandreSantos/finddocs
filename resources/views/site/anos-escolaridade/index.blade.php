@extends('layouts._includes.merge.site')
@section('titulo', 'Avea - Anos de Escolaridade')
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
                        <h1 class="text-white">Anos de Escolaridade</h1>

                    </div>
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </header>

        <section class="blog-masonry bg-muted">

            <div class="container">
                <div class="row">
                    <div class="text-center col-12 col-sm-12 ">
                        <ul class="blog-filters">
                            <li data-filter="*" class="active">Todas Classes</li>
                            @foreach ($classes as $tupla)
                                <li data-filter=".{{ $tupla->id }}classe">{{ $tupla->vc_classe }}ª classe</li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="blog-masonry-container">

                            @foreach ($disciplinas as $row)
                                <!--start individual post-->
                                <div class="col-md-4 col-sm-4 blog-masonry-item {{ $row->classe_id }}classe">
                                    <div class="item-inner">

                                        <img alt="Blog Preview" src="storage/{{ $row->vc_imagem }}">

                                        <div class="post-title">
                                            <div class="post-meta">
                                                <span class="sub alt-font">{{ $row->vc_disciplina }}</span>
                                                <span class="sub alt-font">{{ $row->vc_classe }}ª classe</span>
                                            </div>
                                            <a target="_blank" href="{{ route('materia.aluno', ['id' => $row->id]) }}" class="link-text">Ver Matéria</a>
                                        </div>
                                    </div>
                                </div>
                                <!--end of individual post-->
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>


        </section>



    </div>
@endsection
