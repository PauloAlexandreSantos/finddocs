<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ClasseDisciplina;
use App\Models\Classe;
use App\Models\Disciplina;
use App\Models\Logger;

class ClasseDisciplinaController extends Controller {
    //
    private $Logger;
    public function __construct()
    {
        $this->Logger = new Logger();
    }
    public function  listar() {
       $classesDiscilpnas=DB::table('classe_disciplinas')
        ->join('classes', function ($join) {
            $join->on('classes.id', '=', 'classe_disciplinas.classe_id');
        })
        ->join('disciplinas', function ($join) {
            $join->on('disciplinas.id', '=', 'classe_disciplinas.disciplina_id');
          
        })->select('classe_disciplinas.id as id_c_d','classe_disciplinas.*','disciplinas.*','classes.*')
      ->where('classe_disciplinas.it_estado','=',1) ->get();
   
        return view( 'admin.classeDisciplina.index', compact( 'classesDiscilpnas' ) );

    }
    public function  classeDisciplinas($id_classe) {
        $classesDiscilpnas=DB::table('classe_disciplinas')
         ->join('classes', function ($join) {
             $join->on('classes.id', '=', 'classe_disciplinas.classe_id');
  
         })
         ->join('disciplinas', function ($join) {
             $join->on('disciplinas.id', '=', 'classe_disciplinas.disciplina_id');
           
         })->select('classe_disciplinas.id as id_c_d','classe_disciplinas.*','disciplinas.*','classes.*')
       ->where('classe_disciplinas.it_estado','=',1) ->where('classe_disciplinas.classe_id','=',$id_classe) ->get();
         return view( 'admin.classeDisciplina.index', compact( 'classesDiscilpnas' ) );

     }
    public function criar($id) {
        $classe=Classe::find($id);
        $disciplinas=Disciplina::all();
        return view( 'admin.classeDisciplina.criar.index' ,compact('classe'),compact('disciplinas'));

    }

    public function cadastrar( Request $classeDisciplinas ) {
        
      $result=  ClasseDisciplina::where('classe_id',$classeDisciplinas->classe_id)
        ->where('disciplina_id',$classeDisciplinas->disciplina_id)
        ->where('it_estado',1)->count();
      
        if($result==0)
             ClasseDisciplina::create($classeDisciplinas->all());
       else
       return redirect()->back()->with('aviso',1);
        $this->Logger->Log('info','Atribui Disciplina a uma classe');
       return redirect()->route( 'classesDisciplinas.classeDisciplinas',$classeDisciplinas->classe_id)->with('status',1);
    }

    public function editar( $id ) {
        $classeDisciplina=ClasseDisciplina::find($id);
        $classe=Classe::find($classeDisciplina->classe_id);
        $classeDisciplina=DB::table('classe_disciplinas')
        ->join('classes', function ($join) {
            $join->on('classes.id', '=', 'classe_disciplinas.classe_id');
 
        })
        ->join('disciplinas', function ($join) {
            $join->on('disciplinas.id', '=', 'classe_disciplinas.disciplina_id');
          
        })
        ->select('classe_disciplinas.id as id_c_d','classe_disciplinas.*','disciplinas.*','classes.*')
        ->where('classe_disciplinas.id','=',$id)
        ->get();

    
        $classes=Classe::all();
        $disciplinas=Disciplina::all();
        return view( 'admin.classeDisciplina.editar.index', compact( 'classeDisciplina' ), ['classe'=>$classe,'disciplinas'=>$disciplinas]);
    }

    public function actualizar( Request $classeDisciplina, $id ) {
        $result=  ClasseDisciplina::where('classe_id',$classeDisciplina->classe_id)
        ->where('disciplina_id',$classeDisciplina->disciplina_id)
        ->where('it_estado',1)->count();
      
        if($result==0)
        ClasseDisciplina::find( $id )->update( $classeDisciplina->all() );
        else
        return redirect()->back()->with('aviso',1);
        $this->Logger->Log('info','Actualizou uma Disciplina a uma classe');
        return redirect()->route( 'classesDisciplinas.classeDisciplinas', $classeDisciplina->classe_id)->with('status',1);;
    }

    public function eliminar( $id ) {
        $classeDisciplina1=ClasseDisciplina::find($id);
        ClasseDisciplina::find( $id )->update( ['it_estado'=>0] );
        $this->Logger->Log('info','Eliminou uma Disciplina a uma classe');
        return redirect()->route( 'classesDisciplinas.classeDisciplinas', $classeDisciplina1->classe_id);
    }
}
