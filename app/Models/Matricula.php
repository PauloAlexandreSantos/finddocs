<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Matricula extends Model
 {
    use HasFactory;
    protected $fillable = [
        'it_id_escola',
        'it_id_classe',
        'it_id_anolectivo',
        'it_id_utilizador',
        'it_estado',

    ];

    public function alunosClasse($it_id_anoLectivo,$it_id_escola){
        if($it_id_anoLectivo>0 && $it_id_escola>0)
        {
        $alunoClasse = DB::table( 'matriculas')
        ->where([['matriculas.it_estado', 1],['matriculas.it_id_anolectivo',$it_id_anoLectivo],['matriculas.it_id_escola',$it_id_escola]])
        ->join( 'classes', 'matriculas.it_id_classe', 'classes.id' )
        ->select('classes.vc_classe',DB::raw('count(*) as quantidade'))
        ->groupBy('classes.vc_classe')
        ->get();

       
        }
        
        

        else if($it_id_anoLectivo>0 && $it_id_escola==0)
        {
         $alunoClasse = DB::table( 'matriculas')
        ->where([['matriculas.it_estado', 1],['matriculas.it_id_anolectivo',$it_id_anoLectivo]])
        ->join( 'classes', 'matriculas.it_id_classe', 'classes.id' )
        ->select('classes.vc_classe',DB::raw('count(*) as quantidade'))
        ->groupBy('classes.vc_classe')
        ->get();
        }

        else if($it_id_anoLectivo==0 && $it_id_escola>0)
        {
        $alunoClasse = DB::table( 'matriculas')
        ->where([['matriculas.it_estado', 1],['matriculas.it_id_escola',$it_id_escola]])
        ->join( 'classes', 'matriculas.it_id_classe', 'classes.id' )
        ->select('classes.vc_classe',DB::raw('count(*) as quantidade'))
        ->groupBy('classes.vc_classe')
        ->get();
            
        }

        else if($it_id_anoLectivo==0 && $it_id_escola==0)
        {
        $alunoClasse = DB::table( 'matriculas')
        ->where('matriculas.it_estado', 1)
        ->join( 'classes', 'matriculas.it_id_classe', 'classes.id' )
        ->select('classes.vc_classe',DB::raw('count(*) as quantidade'))
        ->groupBy('classes.vc_classe')
        ->get();
 
/*$alunoClasse = DB::table( 'matriculas')
        ->where('matriculas.it_estado', 1)
        ->join( 'classes', 'matriculas.it_id_classe', 'classes.id' )
        ->join( 'users', 'matriculas.it_id_utilizador', 'users.id' )
        ->select('classes.vc_classe','users.vc_genero',DB::raw('count(classes.vc_classe) as quantidade'))
        ->groupBy('classes.vc_classe','users.vc_genero')->where('users.vc_genero','masculino')
        //->select('users.vc_genero',DB::raw('count(users.vc_genero) as homens'))->where('users.vc_genero','feminino')
        //->groupBy('users.vc_genero')
        ->get();
       */
    }
      

        return $alunoClasse;
    }
    
    
}
