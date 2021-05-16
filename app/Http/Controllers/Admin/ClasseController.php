<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\ClasseDisciplina;
use App\Models\Disciplina;
use App\Models\Escola;
use Illuminate\Support\Facades\DB;
use App\Models\AnoLectivo;

use Illuminate\Http\Request;
use App\Models\Logger;

class ClasseController extends Controller {
    //
    private $Logger;

    public function __construct()
 {
        $this->Logger = new Logger();
    }

    public function  listar() {
      $classes  = DB::table( 'classes' )
        /*->join( 'escolas', function ( $join ) {
        $join->on( 'escolas.id', '=', 'classes.it_id_escola');
        })*/->select('classes.*','classes.id as id_classe')
      ->get();
    
        return view( 'admin.classe.index', compact( 'classes' ) );

    }//hh
    public function criar() {
        $escolas = Escola::all();
        return view( 'admin.classe.criar.index', compact( 'escolas' ) );

    }

    public function cadastrar( Request $classe ) {
        Classe::create( $classe->all() );
        $this->Logger->Log( 'info', 'Adicionou Classe' );
        return redirect()->route( 'classes' )->with('status', 1);
    }

    public function editar( $id ) {
        $classe =   Classe::find( $id );
         $escolas = Escola::all();
        $escola =  Escola::find( $classe->it_id_escola );
        return view( 'admin.classe.editar.index', compact( 'classe' ), ['escolas' =>$escolas, 'escola' => $escola] );
    }

    public function actualizar( Request $turma, $id ) {
        Classe::find( $id )->update( $turma->all() );
        $this->Logger->Log( 'info', 'Actualizou Classe' );
        return redirect()->route( 'classes' )->with('status', 1);
    }

    public function eliminar( $id ) {
        Classe::find( $id )->update( ['it_estado'=>0] );
        $this->Logger->Log( 'info', 'Eliminou Classe' );
        return redirect()->route( 'classes' );
    }
}
