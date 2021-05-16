@extends('layouts._includes.merge.painel')

@section('titulo', 'Home')

@section('conteudo')
    <div class="card">
        <div class="card-body">
            <h2 class="h5 page-title">
                Painel do Ambiente Virtual de Ensino Angolano
            </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 my-2">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <strong class="card-title">Alunos Online</strong>
                            <p class="small mb-0"><span class="fe fe-12 fe-arrow-up text-success"></span><span
                                    class="text-muted">37.7%</span></p>
                        </div>
                        <div class="col-4 text-right">
                            <span class="sparkline inlinebar"><canvas width="40" height="32"
                                    style="display: inline-block; width: 40px; height: 32px; vertical-align: top;"></canvas></span>
                        </div>
                    </div> <!-- /. row -->
                </div> <!-- /. card-body -->
            </div> <!-- /. card -->
        </div> <!-- /. col -->
        <div class="col-md-4 my-2">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <strong class="card-title">Alunos Offline</strong>
                            <p class="small mb-0"><span class="fe fe-12 fe-arrow-down text-danger"></span><span
                                    class="text-muted">-6.8%</span></p>
                        </div>
                        <div class="col-4 text-right">
                            <span class="sparkline inlineline"><canvas width="100" height="32"
                                    style="display: inline-block; width: 100.297px; height: 32px; vertical-align: top;"></canvas></span>
                        </div>
                    </div> <!-- /. row -->
                </div> <!-- /. card-body -->
            </div> <!-- /. card -->
        </div> <!-- /. col -->
        <div class="col-md-4 my-2">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <strong class="card-title">Professores Online</strong>
                            <p class="small mb-0"><span class="fe fe-12 fe-arrow-up text-success"></span><span
                                    class="text-muted">32.7%</span></p>
                        </div>
                        <div class="col-4 text-right">
                            <span class="sparkline inlinepie"><canvas width="32" height="32"
                                    style="display: inline-block; width: 32px; height: 32px; vertical-align: top;"></canvas></span>
                        </div>
                    </div> <!-- /. row -->
                </div> <!-- /. card-body -->
            </div> <!-- /. card -->
        </div> <!-- /. col -->
    </div>

    {{-- graficos --}}
     <div class="row">

      <div class="col-md-6 mb-2">
            <div class="card shadow">
                <div class="card-header">
                    <strong class="card-title mb-0">Alunos por Província</strong>
                </div>
                <div class="card-body">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
           
                   <div id="chart1" style="height: 300px;"></div>
                        <!-- Charting library -->
                        <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
                        <!-- Chartisan -->
                        <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
                        <!-- Your application script -->
                        <script>
                            const chart1 = new Chartisan({
                                el: '#chart1',
                                url: "@chart('Aluno')",
                                hooks: new ChartisanHooks()
                                .colors(['#4299E1','#FE0045','#C07EF1','#67C560','#ECC94B','#A299F1','#42CCE1','#FETT45','purple','green','maroon','wheat','pea','golden','yellow','coral','khaki','lime'])
                                    .datasets('pie')
                                    .axis(false)
                            });
                        </script>
                </div> <!-- /.card-body -->
            </div> <!-- /.card -->
        </div>

        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-header">
                    <strong class="card-title mb-0">Alunos por Classe</strong>
                </div>
                <div class="card-body">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <!-- Chart's container -->
                        <div id="chart" style="height: 300px;"></div>
                        <!-- Charting library -->
                        <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
                        <!-- Chartisan -->
                        <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
                        <!-- Your application script -->
                        <script>
                            const chart = new Chartisan({
                                el: '#chart',
                                url: "@chart('my_chart')",
                                hooks: new ChartisanHooks()
                                .colors(['#4299E1','#FE0045','#C07EF1','#67C560','#ECC94B'])
                                    .datasets('bar')
                                    .axis(true)
                            });
                        </script>
                </div> <!-- /.card-body-->
            </div> <!-- /.card-->
        </div>
    </div> 


        <!-- <div class="py-12">
            
        </div> -->

    {{-- ./graficos --}}
    {{-- pra baixo --}}
    <div class="col-12">
        <div class="w-50 mx-auto text-center justify-content-center py-5 my-5">
            <h2 class="page-title mb-0">Como podemos ajudar?</h2>
            <p class="lead text-muted mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <form class="searchform searchform-lg">
                <input class="form-control form-control-lg bg-white rounded-pill pl-5" type="search" placeholder="Pesquisar"
                    aria-label="Search">
                <p class="help-text mt-2 text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </form>
        </div>
        <div class="row my-2">
            <div class="col-6 col-lg-3">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <i class="fe fe-info fe-32 text-primary"></i>
                        <a href="#">
                            <h3 class="h5 mt-4 mb-1">Começar</h3>
                        </a>
                        <p class="text-muted">Passo a passo para aprender a manusear o AVEA</p>
                    </div> <!-- .card-body -->
                </div> <!-- .card -->
            </div> <!-- .col-md-->
            <div class="col-6 col-lg-3">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <i class="fe fe-help-circle fe-32 text-success"></i>
                        <a href="./page-faqs.html">
                            <h3 class="h5 mt-4 mb-1">FAQs</h3>
                        </a>
                        <p class="text-muted">Perguntas frequentes</p>
                    </div> <!-- .card-body -->
                </div> <!-- .card -->
            </div> <!-- .col-md-->
            <div class="col-6 col-lg-3">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <i class="fe fe-globe fe-32 text-warning"></i>
                        <a href="#">
                            <h3 class="h5 mt-4 mb-1">Base de Conhecimento</h3>
                        </a>
                        <p class="text-muted">Saiba mais sobre o AVEA</p>
                    </div> <!-- .card-body -->
                </div> <!-- .card -->
            </div> <!-- .col-md-->
            <div class="col-6 col-lg-3">
                <div class="card shadow">
                    <div class="card-body">
                        <i class="fe fe-alert-triangle fe-32 text-danger"></i>
                        <a href="#">
                            <h3 class="h5 mt-4 mb-1">Comunicando</h3>
                        </a>
                        <p class="text-muted">Reportar um erro</p>
                    </div> <!-- .card-body -->
                </div> <!-- .card -->
            </div> <!-- .col-md-->
        </div> <!-- .row -->

    </div>
@endsection
