<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Escola;
use Illuminate\Http\Request;
use App\Models\FuncionarioEscola;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Logger;

class FuncionarioEscolaController extends Controller
{
    //
    private $Logger;
    public function __construct()
    {
        $this->Logger = new Logger();
    }
    public function listar()
    {
        $professores = User::where('vc_tipoUtilizador', 'Professor')->get();
        return view('admin.professor.index', compact('professores'));
    }

    public function vincularEscola($id)
    {
        $escolas = Escola::where('it_estado', 1)->get();
        $professor = User::find($id);
        $classesDisciplinas = DB::table('classe_disciplinas')
            ->join('classes', function ($join) {
                $join->on('classes.id', '=', 'classe_disciplinas.classe_id');
            })
            ->join('disciplinas', function ($join) {
                $join->on('disciplinas.id', '=', 'classe_disciplinas.disciplina_id');
            })->select('classe_disciplinas.id as id_c_d', 'classe_disciplinas.*', 'disciplinas.*', 'classes.*')
            ->where('classe_disciplinas.it_estado', '=', 1)->get();

        return view('admin.professor.vincular.index', ['escolas' => $escolas, 'professor' => $professor, 'classesDisciplinas' => $classesDisciplinas, 'id_professor' => $id]);
    }

    public function vincular(Request $resquest, $id)
    {

        FuncionarioEscola::create($resquest->all());

        return redirect()->back()->with('status', 1);
    }

    public function professorEscola()
    {
        $professoresEscolas = DB::table('funcionario_escolas')
            ->join('escolas', 'escolas.id', 'funcionario_escolas.it_id_escola')
            ->join('users', 'users.id', 'funcionario_escolas.it_id_utilizador')
            ->join('classe_disciplinas', 'classe_disciplinas.id', 'funcionario_escolas.it_id_classedisciplina')
            ->join('classes', function ($join) {
                $join->on('classes.id', '=', 'classe_disciplinas.classe_id');
            })
            ->join('disciplinas', function ($join) {
                $join->on('disciplinas.id', '=', 'classe_disciplinas.disciplina_id');
            })
            ->select('users.*', 'classes.*', 'escolas.*', 'funcionario_escolas.id as id_fun_escola', 'disciplinas.*', 'funcionario_escolas.*')
            ->where('funcionario_escolas.it_estado', 1)->get();


        return view('admin.professor.professorEscola.index', compact('professoresEscolas'));
    }




    public function editar($id)
    {
        $escolas = Escola::where('it_estado', 1)->get();
        $classesDisciplinas = DB::table('classe_disciplinas')
            ->join('classes', function ($join) {
                $join->on('classes.id', '=', 'classe_disciplinas.classe_id');
            })
            ->join('disciplinas', function ($join) {
                $join->on('disciplinas.id', '=', 'classe_disciplinas.disciplina_id');
            })->select('classe_disciplinas.id as id_c_d', 'classe_disciplinas.*', 'disciplinas.*', 'classes.*')
            ->where('classe_disciplinas.it_estado', '=', 1)->get();


        $professorEscola = DB::table('funcionario_escolas')
            ->join('escolas', 'escolas.id', 'funcionario_escolas.it_id_escola')
            ->join('users', 'users.id', 'funcionario_escolas.it_id_utilizador')
            ->join('classe_disciplinas', 'classe_disciplinas.id', 'funcionario_escolas.it_id_classedisciplina')
            ->join('classes', function ($join) {
                $join->on('classes.id', '=', 'classe_disciplinas.classe_id');
            })
            ->join('disciplinas', function ($join) {
                $join->on('disciplinas.id', '=', 'classe_disciplinas.disciplina_id');
            })
            ->select('users.*', 'classes.*', 'escolas.*', 'funcionario_escolas.id as id_fun_escola', 'disciplinas.*', 'funcionario_escolas.*')
            ->where('funcionario_escolas.it_estado', 1)->where('funcionario_escolas.id', $id)->get();

        return view('admin.professor.editar.index', ['escolas' => $escolas, 'professorEscola' => $professorEscola, 'classesDisciplinas' => $classesDisciplinas, 'id_professor' => $id]);
    }


    public function atualizar(Request $resquest, $id)
    {
        FuncionarioEscola::find($id)->update($resquest->all());
        $this->Logger->Log('info', 'Actualizou um Professor Escola');
        return redirect()->back()->with('up', 1);
    }
    public function excluir($id)
    {
        FuncionarioEscola::find($id)->delete();
        $this->Logger->Log('info', 'Eliminou um Professor Escola');
        return redirect()->back()->with('delete', 1);
    }
}
