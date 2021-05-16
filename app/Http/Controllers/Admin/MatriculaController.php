<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\AnoLectivo;
use Illuminate\Http\Request;
use App\Models\Matricula;
use App\Models\Escola;
use App\Models\User;
use App\Models\Classe;
use App\Models\Logger;
use Illuminate\Support\Facades\Auth;

class MatriculaController extends Controller
 {
    private $Logger, $matricula;

    public function __construct( Matricula $matricula )
 {
        $this->matricula = $matricula;
        $this->Logger = new Logger();
    }

    public function index()
 {
        $anoslectivos = AnoLectivo::all();
        $classes = Classe::all();
        return view( 'admin.matricula.pesquisar.index', compact( 'anoslectivos' ), compact( 'classes' ) );
    }

    public function create( $id_user )
 {

        $Response['users'] = User::where( 'current_team_id', auth::id() )->get();
        $Response['escolas'] = Escola::all();
        $Response['classes'] = Classe::all();
        $Response['anosLectivo'] = AnoLectivo::all();
        return view( 'admin.matricula.criar.index', $Response );
    }

    public function store( Request $request )
 {
        $vf = Matricula::where( 'it_id_utilizador', $request->it_id_utilizador )
        ->where( 'it_id_anolectivo', $request->it_id_anolectivo )->count();
        if ( $vf == 0 )
        Matricula::create( $request->all() );
        else
        return redirect()->back()->with( 'aviso', 1 );

        $this->Logger->Log( 'info', 'Adicionou uma Matrícula' );
        return redirect()->back()->with( 'status', 1 );
    }

    public function edit( $id )
 {

        $Response['matriculas'] = Matricula::find( $id );
        $Response['users'] = User::where( 'current_team_id', auth::id() )->get();
        $Response['escolas'] = Escola::all();
        $Response['classes'] = Classe::all();
        $Response['classe'] = Classe ::find( $Response['matriculas']->it_id_classe );

        $Response['anosLectivo'] = AnoLectivo::all();
        return view( 'admin.matricula.editar.index', $Response );
    }

    public function update( Request $request, $id )
 {
        Matricula::find( $id )->update( [
            'it_id_utilizador'=>$request->it_id_utilizador,
            'it_id_escola'=>$request->it_id_escola,
            'it_id_anolectivo'=>$request->it_id_anolectivo,
            'it_id_classe'=>$request->it_id_classe,

        ] );
        $this->Logger->Log( 'info', 'Actualizou uma Matrícula' );
        return redirect()->back()->with( 'status', 1 );
    }

    public function listar( Request $dados )
 {
        $matriculas = collect();
        /**Matricula:: */

        $user =  User::find( Auth::id() );

        if ( $user->vc_tipoUtilizador == 'Administrador' ) {

            if ( $dados->it_id_anolectivo == 'Todos' && $dados->id_classe == 'Todos' ) {
                $matriculas =  $this->matriculasTodos() ;
            } else if ( $dados->it_id_anolectivo == 'Todos' && $dados->id_classe != 'Todos' ) {

                $matriculas = $this->matriculasClasse( $dados->id_classe ) ;
            } else if ( $dados->it_id_anolectivo != 'Todos' && $dados->id_classe == 'Todos' ) {

                $matriculas = $this->matriculasAno( $dados );

            } else {

                $matriculas = $this->matriculasAnos( $dados, $dados->id_classe );

            }

        } else {

            $matriculas = DB::table( 'matriculas' )
            ->join( 'escolas', 'escolas.id', 'matriculas.it_id_escola' )
            ->join( 'anoslectivos', 'anoslectivos.id', 'matriculas.it_id_anolectivo' )
            ->join( 'users', 'users.id', 'matriculas.it_id_utilizador' )
            ->join( 'classes', 'classes.id', 'matriculas.it_id_classe' )
            ->where( 'matriculas.it_id_anolectivo', $dados->it_id_anolectivo )
            ->where( 'matriculas.it_id_classe', $dados->id_classe )
            ->where( 'matriculas.it_estado', 1 )
            ->where( 'users.current_team_id', Auth::id() )
            ->select( 'users.vc_primemiroNome', 'users.vc_apelido', 'matriculas.*', 'classes.vc_classe', 'anoslectivos.ya_inicio', 'anoslectivos.ya_fim', 'escolas.vc_escola' )
            ->get();
        }

        return view( 'admin.matricula.index', compact( 'matriculas' ) );
    }

    public function matriculasAnos( $dados, $id_classe ) {
        return DB::table( 'matriculas' )
        ->join( 'escolas', 'escolas.id', 'matriculas.it_id_escola' )
        ->join( 'anoslectivos', 'anoslectivos.id', 'matriculas.it_id_anolectivo' )
        ->join( 'users', 'users.id', 'matriculas.it_id_utilizador' )
        ->join( 'classes', 'classes.id', 'matriculas.it_id_classe' )
        ->select( 'users.vc_primemiroNome', 'users.vc_apelido', 'matriculas.*', 'classes.vc_classe', 'anoslectivos.ya_inicio', 'anoslectivos.ya_fim', 'escolas.vc_escola' )
        ->where( 'classes.id', $id_classe )
        ->where( 'matriculas.it_id_anolectivo', $dados->it_id_anolectivo )
        ->where( 'matriculas.it_estado', 1 )
        ->get();
    }

    public function matriculasTodos() {
        return DB::table( 'matriculas' )
        ->join( 'escolas', 'escolas.id', 'matriculas.it_id_escola' )
        ->join( 'anoslectivos', 'anoslectivos.id', 'matriculas.it_id_anolectivo' )
        ->join( 'users', 'users.id', 'matriculas.it_id_utilizador' )
        ->join( 'classes', 'classes.id', 'matriculas.it_id_classe' )
        ->select( 'users.vc_primemiroNome', 'users.vc_apelido', 'matriculas.*', 'classes.vc_classe', 'anoslectivos.ya_inicio', 'anoslectivos.ya_fim', 'escolas.vc_escola' )

        ->where( 'matriculas.it_estado', 1 )
        ->get();
    }

    public function matriculasAno( $dados ) {

        return DB::table( 'matriculas' )
        ->join( 'escolas', 'escolas.id', 'matriculas.it_id_escola' )
        ->join( 'anoslectivos', 'anoslectivos.id', 'matriculas.it_id_anolectivo' )
        ->join( 'users', 'users.id', 'matriculas.it_id_utilizador' )
        ->join( 'classes', 'classes.id', 'matriculas.it_id_classe' )
        ->select( 'users.vc_primemiroNome', 'users.vc_apelido', 'matriculas.*', 'classes.vc_classe', 'anoslectivos.ya_inicio', 'anoslectivos.ya_fim', 'escolas.vc_escola' )
        ->where( 'matriculas.it_id_anolectivo', $dados->it_id_anolectivo )
        ->where( 'matriculas.it_estado', 1 )
        ->get();
    }

    public function matriculasClasse( $id_classe ) {

        return DB::table( 'matriculas' )

        ->join( 'escolas', 'escolas.id', 'matriculas.it_id_escola' )
        ->join( 'anoslectivos', 'anoslectivos.id', 'matriculas.it_id_anolectivo' )
        ->join( 'users', 'users.id', 'matriculas.it_id_utilizador' )
        ->join( 'classes', 'classes.id', 'matriculas.it_id_classe' )
        ->select( 'users.vc_primemiroNome', 'users.vc_apelido', 'matriculas.*', 'classes.vc_classe', 'anoslectivos.ya_inicio', 'anoslectivos.ya_fim', 'escolas.vc_escola' )
        ->where( 'classes.id', $id_classe )
        ->where( 'matriculas.it_estado', 1 )
        ->get();
    }

}
