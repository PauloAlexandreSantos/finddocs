@extends('layouts._includes.merge.site')
@section('titulo', 'Ano Lectivo')
@section('conteudo')

<div class="" style="height: 240px; background: #124871">
    <div class="container pt-5">
        <div class="row pt-4 text-center">
            <div class="col-lg-3">
                <div class="bg-white rounded" style="padding: 30px 20px;">
                    <h1 class="h5 mt-2">1º e 2º anos</h1>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="bg-white rounded" style="padding: 30px 20px;">
                    <h1 class="h5 mt-2">3º e 4º anos</h1>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="bg-white rounded" style="padding: 30px 20px;">
                    <h1 class="h5 mt-2">5º anos</h1>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="bg-white rounded" style="padding: 30px 20px;">
                    <h1 class="h5 mt-2">6º ano</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- [MAIN] -->
<main class="mt-3 mb-5">
    <div class="container">
        <div class="bg-white rounded">
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-4">
                        <h1 class="h5">Ano letivo 2020/2021</h1>
                    </div>
                </div>
            </div>
            <div class="row p-4">
                <?php 
                    for($index = 1; $index <= 9; $index++):?>
                        <div class="col-lg-4 mb-4">
                            <div class="bg-white">
                                <img class="rounded" src="Assets/images/niveis/1.jpg" style="height: 140px; width: 100%;" alt="">
                                <div class="mt-2">
                                    <p class="" style="font-size: 12px">Portugues</p>
                                    <small>Ano letivo</small>
                                </div>
                            </div>
                        </div>
                <?php endfor;?>
            </div>
        </div>
    </div>
</main>
<!-- [END MAIN] -->

@endsection