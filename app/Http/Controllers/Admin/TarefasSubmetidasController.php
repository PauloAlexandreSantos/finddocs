<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TarefasSubmetidas;
use App\Models\Disciplina;
use App\Models\Matricula;
use App\Models\ClasseDisciplina;
use App\Models\Logger;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\MenuController;

class TarefasSubmetidasController extends Controller
{
    private $Logger;
    private $menuDisciplina;
    public function __construct()
    {
        $this->menuDisciplina = new MenuController();
        $this->Logger = new Logger();
    }
    public function index($id_user)
    {/*TarefasSubmetidas::where('it_estado', 1)->get(); */
        $user =  User::find( $id_user );
        if ( $user->vc_tipoUtilizador == 'Administrador' ) {
            $tarefas=DB::table('tarefas')
            ->join('classe_disciplinas', function ($join) {
                $join->on('tarefas.id_classe_disciplinas', '=', 'classe_disciplinas.id');
            })->join('classes', function ($join) {
                $join->on('classe_disciplinas.classe_id', '=', 'classes.id');
            })->join('disciplinas', function ($join) {
                $join->on('classe_disciplinas.disciplina_id', '=', 'disciplinas.id');
            })->join('funcionario_escolas', function ($join) {
                $join->on('funcionario_escolas.it_id_classedisciplina', '=', 'classe_disciplinas.id');
            })->select('tarefas.id as id_tarefa', 'disciplinas.*', 'tarefas.*', 'classes.*')
          ->where('tarefas.it_estado', '=', 1)    ->get();
        }else if($user->vc_tipoUtilizador == 'Professor'){
            $tarefas=DB::table('tarefas')
        ->join('classe_disciplinas', function ($join) {
            $join->on('tarefas.id_classe_disciplinas', '=', 'classe_disciplinas.id');
        })->join('classes', function ($join) {
            $join->on('classe_disciplinas.classe_id', '=', 'classes.id');
        })->join('disciplinas', function ($join) {
            $join->on('classe_disciplinas.disciplina_id', '=', 'disciplinas.id');
        })->join('funcionario_escolas', function ($join) {
            $join->on('funcionario_escolas.it_id_classedisciplina', '=', 'classe_disciplinas.id');
        })->select('tarefas.id as id_tarefa', 'disciplinas.*', 'tarefas.*', 'classes.*')
      ->where('tarefas.it_estado', '=', 1)  ->where('funcionario_escolas.it_id_utilizador', '=', $id_user)  ->get();
        }else if($user->vc_tipoUtilizador == 'Filho'){
            $tarefas=DB::table('tarefas')
        ->join('classe_disciplinas', function ($join) {
            $join->on('tarefas.id_classe_disciplinas', '=', 'classe_disciplinas.id');
        })->join('classes', function ($join) {
            $join->on('classe_disciplinas.classe_id', '=', 'classes.id');
        })->join('disciplinas', function ($join) {
            $join->on('classe_disciplinas.disciplina_id', '=', 'disciplinas.id');
        }) ->join('matriculas', function ($join) {
            $join->on('matriculas.it_id_classe', '=', 'classes.id');
        }) ->join('users', function ($join) {
            $join->on('matriculas.it_id_utilizador', '=', 'users.id');
        })->select('tarefas.id as id_tarefa', 'disciplinas.*', 'tarefas.*', 'classes.*')
      ->where('tarefas.it_estado', '=', 1)   ->where('matriculas.it_id_utilizador', $id_user)  ->get();
        }else if($user->vc_tipoUtilizador == 'Encarregado'){
            $tarefas=DB::table('tarefas')
        ->join('classe_disciplinas', function ($join) {
            $join->on('tarefas.id_classe_disciplinas', '=', 'classe_disciplinas.id');
        })->join('classes', function ($join) {
            $join->on('classe_disciplinas.classe_id', '=', 'classes.id');
        })->join('disciplinas', function ($join) {
            $join->on('classe_disciplinas.disciplina_id', '=', 'disciplinas.id');
        }) ->join('matriculas', function ($join) {
            $join->on('matriculas.it_id_classe', '=', 'classes.id');
        }) ->join('users', function ($join) {
            $join->on('matriculas.it_id_utilizador', '=', 'users.id');
        })->select('tarefas.id as id_tarefa', 'disciplinas.*', 'tarefas.*', 'classes.*')
      ->where('tarefas.it_estado', '=', 1)   ->where('users.current_team_id', $id_user)  ->get();
        }

        return view('admin.tarefas_submetidas.index', compact('tarefas'));
    }

    public function submeter($id)
    {
        $disciplinas2 = $this->menuDisciplina->listarPorId();
        $response['disciplinas2'] = $disciplinas2;
        $response['id'] = $id;
        return view('admin.tarefas_submetidas.criar.index', $response);
    }

    public function cadastrar(Request $request, $id, $id_user)
    {
        $it_id_matricula = Matricula::where('it_id_utilizador', $id_user)->get();
        $it_id_matricula = $it_id_matricula[0]->id;

        if ($request->hasFile('vc_pdf') && $request->file('vc_pdf')->isValid()) {

            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));

            // Recupera a extensão do arquivo
            $extension = $request->vc_pdf->extension();

            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";

            // Faz o upload:
            $upload = $request->vc_pdf->storeAs('pdfTarefaSubmeter', $nameFile);
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao

            // Verifica se NÃO deu certo o upload ( Redireciona de volta )
            if (!$upload) {
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao fazer upload')
                    ->withInput();
            } else {

                TarefasSubmetidas::create([
                    'vc_tarefa' => $request->vc_tarefa,
                    'vc_pdf' => $upload,
                    'it_id_tarefas' => $id,
                    'it_id_utilizador' => $id_user,
                    'it_id_matricula' => $it_id_matricula

                ]);
                $this->Logger->Log('info', 'Adicionou uma Tarefa Submetida');
                return redirect()->back()->with('status', 1);
            }
        }
    }

    public function edit($id)
    {
        $disciplinas2 = $this->menuDisciplina->listarPorId();
        $response['disciplinas2'] = $disciplinas2;
        $Response['tarefas'] =  TarefasSubmetidas::find($id);
        return view('admin.tarefas_submetidas.editar.index', $Response);
    }

    public function update(Request $request, $id)
    {
        TarefasSubmetidas::find($id)->update([
            'vc_tarefa' => $request->tarefa,
            'dt_data_entrega' => $request->data,
            'vc_descricao' => $request->descricao,
            'it_id_classe_disciplina' => $request->classe,



        ]);
        $this->Logger->Log('info', 'Actualizou uma Tarefa Submetida');
        return redirect()->route('tarefas_submetidas.index')->with('status', 1);
    }

    public function delete($id)
    {
        TarefasSubmetidas::find($id)->update(['it_estado' => 0]);
        $this->Logger->Log('info', 'Eliminou uma Tarefa Submetida');
        return redirect()->back();
    }
}
