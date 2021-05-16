<?php
/* Este sistema esta protegido pelos direitos autoriais do Instituto de Telecomunicações criado ao
abrigo do decreto executivo conjunto nº29/85 de 29 de Abril,
dos Ministérios da Educação e dos Transportes e Comunicações,
publicado no Diário da República, 1ª série nº 35/85, nos termos
do artigo 62º da Lei Constitucional.

contactos:
site:www.itel.gov.ao
Telefone I: +244 931 313 333
Telefone II: +244 997 788 768
Telefone III: +244 222 381 640
Email I: secretariaitel@hotmail.com
Email II: geral@itel.gov.ao*/

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alunno;
use App\Models\AnoLectivo;
use App\Models\Cabecalho;
use App\Models\Candidatura;
use App\Models\IdadedeCandidatura;
use App\Models\Matricula;
// use App\Models\Turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\MenuController;

class HomeController extends Controller
{
    private $menuDisciplina;
    public function __construct()
    {
        $this->menuDisciplina = new MenuController();
        $this->middleware('auth');
    }

    public function raiz()
    {
        $disciplinas2 = $this->menuDisciplina->listarPorId();
        $response['disciplinas2'] = $disciplinas2;
        $response['cabecalho'] = Cabecalho::orderby('id', 'desc')->first();

        $anolectivo = AnoLectivo::orderby('id', 'desc')->first();
        if ($anolectivo) {
            $data = $anolectivo->ya_inicio . '-' . $anolectivo->ya_fim;

            $response['AnoLectivo'] = $data;

            // $response['selecionados'] = Alunno::where( [['vc_anoLectivo', $data]] )->count();
            // $response['candidaturas'] = Candidatura::where( [['vc_anoLectivo', $data]] )->count();
            // $response['matriculas'] = Matricula::where( [['vc_anoLectivo', $data]] )->count();
            // $response['idadedecandidatura'] = IdadedeCandidatura::orderby( 'id', 'desc' )->first();

            /* Gráficos */
            $response['Anosgraficos'] = AnoLectivo::orderby('id', 'asc')->get();
            // $response['Cursosgraficos'] = Candidatura::where( [['vc_anoLectivo', $data]] )->orderBy( 'vc_nomeCurso', 'asc' )->groupby( 'vc_nomeCurso' )->get( 'vc_nomeCurso' );

            /* ./Gráficos */
        } else {
            $response[''] = null;
        }

        return view('admin.index', $response);
    }
}