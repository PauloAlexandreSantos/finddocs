@extends('layouts._includes.merge.site')
@section('titulo', 'Avea - Manuais Escolares')
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
                        <h1 class="text-white">Manuais Escolares</h1>
                       {{--  <p class="text-white lead">Lorem ipsum dolor s</p> --}}
                    </div>
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </header>

        <section class="blog-masonry bg-muted">

            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <ul class="blog-filters">
                            <li data-filter="*" class="active">Todos Manuais</li>
                            <li data-filter=".1classe">1ª Classe</li>
                            <li data-filter=".2classe">2ª Classe</li>
                            <li data-filter=".3classe">3ª Classe</li>
                            <li data-filter=".4classe">4ª Classe</li>
                            <li data-filter=".5classe">5ª Classe</li>
                            <li data-filter=".6classe">6ª Classe</li>
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

                            {{-- start 1ª classe --}}
                            <div class="col-md-4 col-sm-4 blog-masonry-item 1classe">
                                <div class="item-inner">
                                    <a target="_blank" href="/pdfs/livros/1classe/EDM01-LR.pdf">
                                        <img alt="Blog Preview" src="/images/Livros/Capas/1classe/EDM01.png">
                                    </a>
                                    <div class="post-title">
                                        <div class="post-meta">
                                            <span class="sub alt-font">Estudo do Meio</span>
                                            <span class="sub alt-font">1ª Classe</span>
                                        </div>
                                        <a target="_blank" href="/pdfs/livros/1classe/EDM01-LR.pdf"
                                            class="link-text">Ler o livro</a>
                                    </div>
                                </div>
                            </div>
                            <!--end of individual post-->

                            <div class="col-md-4 col-sm-4 blog-masonry-item 1classe">
                                <div class="item-inner">
                                    <a target="_blank" href="/pdfs/livros/1classe/EMP01-LR.pdf">
                                        <img alt="Blog Preview" src="/images/Livros/Capas/1classe/EMP01.png">
                                    </a>
                                    <div class="post-title">
                                        <div class="post-meta">
                                            <span class="sub alt-font">Estudo Manual e Plástica</span>
                                            <span class="sub alt-font">1ª Classe</span>
                                        </div>
                                        <a target="_blank" href="/pdfs/livros/1classe/EMP01-LR.pdf"
                                            class="link-text">Ler o livro</a>
                                    </div>
                                </div>
                            </div>
                            <!--end of individual post-->

                            <div class="col-md-4 col-sm-4 blog-masonry-item 1classe">
                                <div class="item-inner">
                                    <a target="_blank" href="/pdfs/livros/1classe/GRMAT01-LRF06.pdf">
                                        <img alt="Blog Preview" src="/images/Livros/Capas/1classe/MAT01.png">
                                    </a>
                                    <div class="post-title">
                                        <div class="post-meta">
                                            <span class="sub alt-font">Matemática</span>
                                            <span class="sub alt-font">1ª Classe</span>
                                        </div>
                                        <a target="_blank" href="/pdfs/livros/1classe/GRMAT01-LRF06.pdf"
                                            class="link-text">Ler o livro</a>
                                    </div>
                                </div>
                            </div>
                            <!--end of individual post-->

                            <div class="col-md-4 col-sm-4 blog-masonry-item 1classe">
                                <div class="item-inner">
                                    <a target="_blank" href="/pdfs/livros/1classe/PRT01-LR.pdf">
                                        <img alt="Blog Preview" src="/images/Livros/Capas/1classe/PRT01.png">
                                    </a>
                                    <div class="post-title">
                                        <div class="post-meta">
                                            <span class="sub alt-font">Língua Portuguesa</span>
                                            <span class="sub alt-font">1ª Classe</span>
                                        </div>
                                        <a target="_blank" href="/pdfs/livros/1classe/PRT01-LR.pdf"
                                            class="link-text">Ler o livro</a>
                                    </div>
                                </div>
                            </div>
                            <!--end of individual post-->

                            {{-- end 1ª classe --}}


                            {{-- start 2ª classe --}}
                            <div class="col-md-4 col-sm-4 blog-masonry-item 2classe">
                                <div class="item-inner">
                                    <a target="_blank" href="/pdfs/livros/2classe/EDM02-LR.pdf">
                                        <img alt="Blog Preview" src="/images/Livros/Capas/2classe/EDM02.png">
                                    </a>
                                    <div class="post-title">
                                        <div class="post-meta">
                                            <span class="sub alt-font">Estudo do Meio</span>
                                            <span class="sub alt-font">2ª Classe</span>
                                        </div>
                                        <a target="_blank" href="/pdfs/livros/2classe/EDM02-LR.pdf"
                                            class="link-text">Ler o livro</a>
                                    </div>
                                </div>
                            </div>
                            <!--end of individual post-->

                            <div class="col-md-4 col-sm-4 blog-masonry-item 2classe">
                                <div class="item-inner">
                                    <a target="_blank" href="/pdfs/livros/2classe/MAT02-LR.pdf">
                                        <img alt="Blog Preview" src="/images/Livros/Capas/2classe/MAT02.png">
                                    </a>
                                    <div class="post-title">
                                        <div class="post-meta">
                                            <span class="sub alt-font">Matemática</span>
                                            <span class="sub alt-font">2ª Classe</span>
                                        </div>
                                        <a target="_blank" href="/pdfs/livros/2classe/MAT02-LR.pdf"
                                            class="link-text">Ler o livro</a>
                                    </div>
                                </div>
                            </div>
                            <!--end of individual post-->


                            <div class="col-md-4 col-sm-4 blog-masonry-item 2classe">
                                <div class="item-inner">
                                    <a target="_blank" href="/pdfs/livros/2classe/PRT02-LR.pdf">
                                        <img alt="Blog Preview" src="/images/Livros/Capas/2classe/PRT02.png">
                                    </a>
                                    <div class="post-title">
                                        <div class="post-meta">
                                            <span class="sub alt-font">Língua Portuguesa</span>
                                            <span class="sub alt-font">2ª Classe</span>
                                        </div>
                                        <a target="_blank" href="/pdfs/livros/2classe/PRT02-LR.pdf"
                                            class="link-text">Ler o livro</a>
                                    </div>
                                </div>
                            </div>
                            <!--end of individual post-->
                            {{-- end 2ª classe --}}

                            {{-- start 3ª classe --}}
                            <div class="col-md-4 col-sm-4 blog-masonry-item 3classe">
                                <div class="item-inner">
                                    <a target="_blank" href="/pdfs/livros/3classe/EDM03-LR.pdf">
                                        <img alt="Blog Preview" src="/images/Livros/Capas/3classe/EDM03.png">
                                    </a>
                                    <div class="post-title">
                                        <div class="post-meta">
                                            <span class="sub alt-font">Estudo do Meio</span>
                                            <span class="sub alt-font">3ª Classe</span>
                                        </div>
                                        <a target="_blank" href="/pdfs/livros/3classe/EDM03-LR.pdf"
                                            class="link-text">Ler o livro</a>
                                    </div>
                                </div>
                            </div>
                            <!--end of individual post-->
                            <div class="col-md-4 col-sm-4 blog-masonry-item 3classe">
                                <div class="item-inner">
                                    <a target="_blank" href="/pdfs/livros/3classe/EMP03-LR.pdf">
                                        <img alt="Blog Preview" src="/images/Livros/Capas/3classe/EMP03.png">
                                    </a>
                                    <div class="post-title">
                                        <div class="post-meta">
                                            <span class="sub alt-font">Educação Manual e Plástica</span>
                                            <span class="sub alt-font">3ª Classe</span>
                                        </div>
                                        <a target="_blank" href="/pdfs/livros/3classe/EMP03-LR.pdf"
                                            class="link-text">Ler o livro</a>
                                    </div>
                                </div>
                            </div>
                            <!--end of individual post-->
                            <div class="col-md-4 col-sm-4 blog-masonry-item 3classe">
                                <div class="item-inner">
                                    <a target="_blank" href="/pdfs/livros/3classe/MAT03-LR.pdf">
                                        <img alt="Blog Preview" src="/images/Livros/Capas/3classe/MAT03.png">
                                    </a>
                                    <div class="post-title">
                                        <div class="post-meta">
                                            <span class="sub alt-font">Matemática</span>
                                            <span class="sub alt-font">3ª Classe</span>
                                        </div>
                                        <a target="_blank" href="/pdfs/livros/3classe/MAT03-LR.pdf"
                                            class="link-text">Ler o livro</a>
                                    </div>
                                </div>
                            </div>
                            <!--end of individual post-->
                            <div class="col-md-4 col-sm-4 blog-masonry-item 3classe">
                                <div class="item-inner">
                                    <a target="_blank" href="/pdfs/livros/3classe/PRT03-LR.pdf">
                                        <img alt="Blog Preview" src="/images/Livros/Capas/3classe/PRT03.png">
                                    </a>
                                    <div class="post-title">
                                        <div class="post-meta">
                                            <span class="sub alt-font">Língua Portuguesa</span>
                                            <span class="sub alt-font">3ª Classe</span>
                                        </div>
                                        <a target="_blank" href="/pdfs/livros/3classe/PRT03-LR.pdf"
                                            class="link-text">Ler o livro</a>
                                    </div>
                                </div>
                            </div>
                            <!--end of individual post-->
                            {{-- end 3ª classe --}}

                            {{-- start 4ª classe --}}
                            <div class="col-md-4 col-sm-4 blog-masonry-item 4classe">
                                <div class="item-inner">
                                    <a target="_blank" href="/pdfs/livros/1classe/EDM01-LR.pdf">
                                        <img alt="Blog Preview" src="/images/Livros/Capas/4classe/EDM04.png">
                                    </a>
                                    <div class="post-title">
                                        <div class="post-meta">
                                            <span class="sub alt-font">Estudo do Meio</span>
                                            <span class="sub alt-font">4ª Classe</span>
                                        </div>
                                        <a target="_blank" href="/pdfs/livros/1classe/EDM01-LR.pdf"
                                            class="link-text">Ler o livro</a>
                                    </div>
                                </div>
                            </div>
                            <!--end of individual post-->
                            <div class="col-md-4 col-sm-4 blog-masonry-item 4classe">
                                <div class="item-inner">
                                    <a target="_blank" href="/pdfs/livros/3classe/EMP03-LR.pdf">
                                        <img alt="Blog Preview" src="/images/Livros/Capas/4classe/EMP04.png">
                                    </a>
                                    <div class="post-title">
                                        <div class="post-meta">
                                            <span class="sub alt-font">Educação Manual e Plástica</span>
                                            <span class="sub alt-font">4ª Classe</span>
                                        </div>
                                        <a target="_blank" href="/pdfs/livros/3classe/EMP03-LR.pdf"
                                            class="link-text">Ler o livro</a>
                                    </div>
                                </div>
                            </div>
                            <!--end of individual post-->
                            <div class="col-md-4 col-sm-4 blog-masonry-item 4classe">
                                <div class="item-inner">
                                    <a target="_blank" href="/pdfs/livros/3classe/MAT03-LR.pdf">
                                        <img alt="Blog Preview" src="/images/Livros/Capas/4classe/MAT04.png">
                                    </a>
                                    <div class="post-title">
                                        <div class="post-meta">
                                            <span class="sub alt-font">Matemática</span>
                                            <span class="sub alt-font">4ª Classe</span>
                                        </div>
                                        <a target="_blank" href="/pdfs/livros/3classe/MAT03-LR.pdf"
                                            class="link-text">Ler o livro</a>
                                    </div>
                                </div>
                            </div>
                            <!--end of individual post-->
                            <div class="col-md-4 col-sm-4 blog-masonry-item 4classe">
                                <div class="item-inner">
                                    <a target="_blank" href="/pdfs/livros/3classe/PRT03-LR.pdf">
                                        <img alt="Blog Preview" src="/images/Livros/Capas/4classe/PRT04.png">
                                    </a>
                                    <div class="post-title">
                                        <div class="post-meta">
                                            <span class="sub alt-font">Língua Portuguesa</span>
                                            <span class="sub alt-font">4ª Classe</span>
                                        </div>
                                        <a target="_blank" href="/pdfs/livros/3classe/PRT03-LR.pdf"
                                            class="link-text">Ler o livro</a>
                                    </div>
                                </div>
                            </div>
                            <!--end of individual post-->
                            {{-- end 4ª classe --}}

                            {{-- start 5ª classe --}}
                            <div class="col-md-4 col-sm-4 blog-masonry-item 5classe">
                                <div class="item-inner">
                                    <a target="_blank" href="/pdfs/livros/1classe/EDM01-LR.pdf">
                                        <img alt="Blog Preview" src="/images/Livros/Capas/5classe/CDN05.png">
                                    </a>
                                    <div class="post-title">
                                        <div class="post-meta">
                                            <span class="sub alt-font">Ciências da Natureza</span>
                                            <span class="sub alt-font">5ª Classe</span>
                                        </div>
                                        <a target="_blank" href="/pdfs/livros/1classe/EDM01-LR.pdf"
                                            class="link-text">Ler o livro</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 blog-masonry-item 5classe">
                                <div class="item-inner">
                                    <a target="_blank" href="/pdfs/livros/1classe/EDM01-LR.pdf">
                                        <img alt="Blog Preview" src="/images/Livros/Capas/5classe/EMC05.png">
                                    </a>
                                    <div class="post-title">
                                        <div class="post-meta">
                                            <span class="sub alt-font">Educação Moral e Cívica</span>
                                            <span class="sub alt-font">5ª Classe</span>
                                        </div>
                                        <a target="_blank" href="/pdfs/livros/1classe/EDM01-LR.pdf"
                                            class="link-text">Ler o livro</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 blog-masonry-item 5classe">
                                <div class="item-inner">
                                    <a target="_blank" href="/pdfs/livros/1classe/EDM01-LR.pdf">
                                        <img alt="Blog Preview" src="/images/Livros/Capas/5classe/EMP05.png">
                                    </a>
                                    <div class="post-title">
                                        <div class="post-meta">
                                            <span class="sub alt-font">Educação Manual e Plástica</span>
                                            <span class="sub alt-font">5ª Classe</span>
                                        </div>
                                        <a target="_blank" href="/pdfs/livros/1classe/EDM01-LR.pdf"
                                            class="link-text">Ler o livro</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 blog-masonry-item 5classe">
                                <div class="item-inner">
                                    <a target="_blank" href="/pdfs/livros/1classe/EDM01-LR.pdf">
                                        <img alt="Blog Preview" src="/images/Livros/Capas/5classe/GRF05.png">
                                    </a>
                                    <div class="post-title">
                                        <div class="post-meta">
                                            <span class="sub alt-font">Geografia</span>
                                            <span class="sub alt-font">5ª Classe</span>
                                        </div>
                                        <a target="_blank" href="/pdfs/livros/1classe/EDM01-LR.pdf"
                                            class="link-text">Ler o livro</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4 blog-masonry-item 5classe">
                                <div class="item-inner">
                                    <a target="_blank" href="/pdfs/livros/1classe/EDM01-LR.pdf">
                                        <img alt="Blog Preview" src="/images/Livros/Capas/5classe/HIS05.png">
                                    </a>
                                    <div class="post-title">
                                        <div class="post-meta">
                                            <span class="sub alt-font">História</span>
                                            <span class="sub alt-font">5ª Classe</span>
                                        </div>
                                        <a target="_blank" href="/pdfs/livros/1classe/EDM01-LR.pdf"
                                            class="link-text">Ler o livro</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 blog-masonry-item 5classe">
                                <div class="item-inner">
                                    <a target="_blank" href="/pdfs/livros/1classe/EDM01-LR.pdf">
                                        <img alt="Blog Preview" src="/images/Livros/Capas/5classe/MAT05.png">
                                    </a>
                                    <div class="post-title">
                                        <div class="post-meta">
                                            <span class="sub alt-font">Matemática</span>
                                            <span class="sub alt-font">5ª Classe</span>
                                        </div>
                                        <a target="_blank" href="/pdfs/livros/1classe/EDM01-LR.pdf"
                                            class="link-text">Ler o livro</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 blog-masonry-item 5classe">
                                <div class="item-inner">
                                    <a target="_blank" href="/pdfs/livros/1classe/EDM01-LR.pdf">
                                        <img alt="Blog Preview" src="/images/Livros/Capas/5classe/PRT05.png">
                                    </a>
                                    <div class="post-title">
                                        <div class="post-meta">
                                            <span class="sub alt-font">Língua Portuguesa</span>
                                            <span class="sub alt-font">5ª Classe</span>
                                        </div>
                                        <a target="_blank" href="/pdfs/livros/1classe/EDM01-LR.pdf"
                                            class="link-text">Ler o livro</a>
                                    </div>
                                </div>
                            </div>
                            {{-- end 5ª classe --}}

                            {{-- start 6ª classe --}}
                            <div class="col-md-4 col-sm-4 blog-masonry-item 6classe">
                                <div class="item-inner">
                                    <a target="_blank" href="/pdfs/livros/1classe/EDM01-LR.pdf">
                                        <img alt="Blog Preview" src="/images/Livros/Capas/6classe/CDN06.png">
                                    </a>
                                    <div class="post-title">
                                        <div class="post-meta">
                                            <span class="sub alt-font">Ciência da Natureza</span>
                                            <span class="sub alt-font">6ª Classe</span>
                                        </div>
                                        <a target="_blank" href="/pdfs/livros/1classe/EDM01-LR.pdf"
                                            class="link-text">Ler o livro</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 blog-masonry-item 6classe">
                                <div class="item-inner">
                                    <a target="_blank" href="/pdfs/livros/1classe/EDM01-LR.pdf">
                                        <img alt="Blog Preview" src="/images/Livros/Capas/6classe/EMC06.png">
                                    </a>
                                    <div class="post-title">
                                        <div class="post-meta">
                                            <span class="sub alt-font">Educação Moral e Cívica</span>
                                            <span class="sub alt-font">6ª Classe</span>
                                        </div>
                                        <a target="_blank" href="/pdfs/livros/1classe/EDM01-LR.pdf"
                                            class="link-text">Ler o livro</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 blog-masonry-item 6classe">
                                <div class="item-inner">
                                    <a target="_blank" href="/pdfs/livros/1classe/EDM01-LR.pdf">
                                        <img alt="Blog Preview" src="/images/Livros/Capas/6classe/EMP06.png">
                                    </a>
                                    <div class="post-title">
                                        <div class="post-meta">
                                            <span class="sub alt-font">Educação Manual e Plástica</span>
                                            <span class="sub alt-font">6ª Classe</span>
                                        </div>
                                        <a target="_blank" href="/pdfs/livros/1classe/EDM01-LR.pdf"
                                            class="link-text">Ler o livro</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 blog-masonry-item 6classe">
                                <div class="item-inner">
                                    <a target="_blank" href="/pdfs/livros/1classe/EDM01-LR.pdf">
                                        <img alt="Blog Preview" src="/images/Livros/Capas/6classe/GRF06.png">
                                    </a>
                                    <div class="post-title">
                                        <div class="post-meta">
                                            <span class="sub alt-font">Geografia</span>
                                            <span class="sub alt-font">6ª Classe</span>
                                        </div>
                                        <a target="_blank" href="/pdfs/livros/1classe/EDM01-LR.pdf"
                                            class="link-text">Ler o livro</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 blog-masonry-item 6classe">
                                <div class="item-inner">
                                    <a target="_blank" href="/pdfs/livros/1classe/EDM01-LR.pdf">
                                        <img alt="Blog Preview" src="/images/Livros/Capas/6classe/HIS06.png">
                                    </a>
                                    <div class="post-title">
                                        <div class="post-meta">
                                            <span class="sub alt-font">História</span>
                                            <span class="sub alt-font">6ª Classe</span>
                                        </div>
                                        <a target="_blank" href="/pdfs/livros/1classe/EDM01-LR.pdf"
                                            class="link-text">Ler o livro</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 blog-masonry-item 6classe">
                                <div class="item-inner">
                                    <a target="_blank" href="/pdfs/livros/1classe/EDM01-LR.pdf">
                                        <img alt="Blog Preview" src="/images/Livros/Capas/6classe/MAT06.png">
                                    </a>
                                    <div class="post-title">
                                        <div class="post-meta">
                                            <span class="sub alt-font">Matemática</span>
                                            <span class="sub alt-font">6ª Classe</span>
                                        </div>
                                        <a target="_blank" href="/pdfs/livros/1classe/EDM01-LR.pdf"
                                            class="link-text">Ler o livro</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 blog-masonry-item 6classe">
                                <div class="item-inner">
                                    <a target="_blank" href="/pdfs/livros/1classe/EDM01-LR.pdf">
                                        <img alt="Blog Preview" src="/images/Livros/Capas/6classe/PRT06.png">
                                    </a>
                                    <div class="post-title">
                                        <div class="post-meta">
                                            <span class="sub alt-font">Língua Portuguesa</span>
                                            <span class="sub alt-font">6ª Classe</span>
                                        </div>
                                        <a target="_blank" href="/pdfs/livros/1classe/EDM01-LR.pdf"
                                            class="link-text">Ler o livro</a>
                                    </div>
                                </div>
                            </div>
                            {{-- end 5ª classe --}}

                        </div>
                    </div>
                </div>
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
