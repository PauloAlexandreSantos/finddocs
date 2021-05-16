<?php

namespace App\Http\Controllers\Admin\relatorios;

use App\Http\Controllers\Controller;
use App\Models\AnoLectivo;
use App\Models\Escola;
use App\Models\Cabecalho;
use App\Models\Estatistica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Matricula;
use App\Models\Logger;

class RelatorioAlunoController extends Controller
{
    protected $matricula;

    public function __construct(Matricula $matricula)
    {
        $this->matricula=$matricula;
        $this->Logger = new Logger();
      
    }

         
    public function listarAlunoClasse(Request $r){
        $cabecalho=Cabecalho::find(1);
        $it_id_anoLectivo=$r->it_id_anoLectivo;
        $it_id_anoLectivoLista=$it_id_anoLectivo;
        $it_id_escola=$r->it_id_escola;
        $it_id_escolaLista=$it_id_escola;

        $classes= $this->matricula->alunosClasse($it_id_anoLectivo,$it_id_escola);
      
        
        if($it_id_anoLectivo==0)
            $it_id_anoLectivoLista=AnoLectivo::min('ya_inicio').'-'.AnoLectivo::min('ya_fim').' à '.AnoLectivo::max('ya_inicio').'-'.AnoLectivo::max('ya_fim');
        else{
            $it_id_anoLectivoLista=AnoLectivo::find($it_id_anoLectivo);
            $it_id_anoLectivoLista=$it_id_anoLectivoLista->ya_inicio.'-'.$it_id_anoLectivoLista->ya_fim;
            }
        
        if($it_id_escola==0)
            $it_id_escolaLista="AVEA (todas as escolas do sistema)";
        else{
            $it_id_escolaLista=Escola::find($it_id_escola);
            $it_id_escolaLista=$it_id_escolaLista->vc_escola;
        }
   
        $dados['it_id_anoLectivo']=$it_id_anoLectivo;
        $dados['it_id_escola']=$it_id_escola;
        $dados['classes']=$classes;
        $dados['cabecalho']=$cabecalho;
        $dados['it_id_anoLectivoLista']=$it_id_anoLectivoLista;
        $dados['it_id_escolaLista']=$it_id_escolaLista;
        return view("admin.relatorios.aluno.quantidade_aluno_classe.index",$dados);
    }
     
    public function imprimirAlunoClasse($it_id_anoLectivo,$it_id_escola,$it_id_anoLectivoLista,$it_id_escolaLista){
        $cabecalho=Cabecalho::find(1);
        $classes= $this->matricula->alunosClasse($it_id_anoLectivo,$it_id_escola);

        $dados['it_id_anoLectivoLista']=$it_id_anoLectivoLista;
        $dados['it_id_escolaLista']=$it_id_escolaLista;
        $dados['it_id_anoLectivo']=$it_id_anoLectivo;
        $dados['it_id_escola']=$it_id_escola;
        $dados['cabecalho']=$cabecalho;
        $dados['classes']=$classes;
        
        $css = file_get_contents("css/Alunos_municipio/bootstrap.min.css");
        
        $mpdf = new \Mpdf\Mpdf();
    
        $html = view("admin.pdfs.quantidade_aluno_classe.index",$dados);
        $mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);
      
        $mpdf->Output("matricula.pdf", "I");
      
   
    }

    public function verAlunosClasse(){
     $anoLectivos=AnoLectivo::all();
     $escolas=Escola::all();
     $it_id_escola=0;
     $it_id_anolectivo=0;
     $dados['anoLectivos']= $anoLectivos;
     $dados['escolas']= $escolas;
     $dados['it_id_escola']= $it_id_escola;
     $dados['it_id_anolectivo']= $it_id_anolectivo;
        return view('admin.relatorios.aluno.quantidade_aluno_classe.ver.index',$dados);
    }

    public function paginaRelatorioAlunoClasse(){
     
      
   
    }

}
