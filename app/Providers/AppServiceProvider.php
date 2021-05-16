<?php

namespace App\Providers;

use ConsoleTVs\Charts\Registrar as Charts;
use App\Models\Cabecalho;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Charts $charts)
    {


        view()->composer('*', function ($view) {
            $response['cabecalho'] = Cabecalho::orderby('id', 'desc')->first();
            $cabecalhos = $response['cabecalho'];
            $cabe = session()->get('cabecalhos', $cabecalhos);
            $cab = $cabe;
            session()->has('cabecalhos') ? session()->get('cabecalhos') : [''];
            $view->with('cab', $cab);
        });
        $charts->register([
            \App\Charts\AlunoClasseChart::class,
            \App\Charts\AlunosPorProvincia::class
        ]);
    }
}