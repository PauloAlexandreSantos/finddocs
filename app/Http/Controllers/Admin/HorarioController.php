<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Horario;
use App\Models\Logger;
use App\Models\AnoLectivo;
use App\Models\Dias_semanas;
use App\Models\Hora;
use App\Models\ClasseDisciplina;
use App\Http\Controllers\Admin\MenuController;

class HorarioController extends Controller
{
    private $Logger;
    private $menuDisciplina;
    public function __construct()
    {
        $this->menuDisciplina = new MenuController();
        $this->Logger = new Logger();
    }

    public function index()
    {
        $disciplinas2 = $this->menuDisciplina->listarPorId();
        $response['disciplinas2'] = $disciplinas2;
        $horarios = DB::table('horarios')
            ->join('dias_semanas', 'dias_semanas.id', 'horarios.it_id_dias')
            ->join('anoslectivos', function ($join) {
                $join->on('horarios.it_id_anoslectivos', '=', 'anoslectivos.id');
            })
            ->join('classe_disciplinas', function ($join) {
                $join->on('horarios.it_id_classedisciplina', '=', 'classe_disciplinas.id');
            })->join('classes', function ($join) {
                $join->on('classe_disciplinas.classe_id', '=', 'classes.id');
            })->join('disciplinas', function ($join) {
                $join->on('classe_disciplinas.disciplina_id', '=', 'disciplinas.id');
            })->select('horarios.id as id_horarios', 'disciplinas.*', 'horarios.*', 'classes.*', 'dias_semanas.*', 'anoslectivos.*')
            ->where('horarios.it_estado', 1)->get();
        $response['horarios'] = $horarios;
        return view('admin.horarios.index', $response);
    }

    public function create()
    {
        $disciplinas2 = $this->menuDisciplina->listarPorId();
        $response['disciplinas2'] = $disciplinas2;
        $response['dias'] = Dias_semanas::where('it_estado', 1)->get();
        $response['horas'] = Hora::where('it_estado', 1)->get();
        $classesDisciplinas = DB::table('classe_disciplinas')
            ->join('classes', function ($join) {
                $join->on('classes.id', '=', 'classe_disciplinas.classe_id');
            })
            ->join('disciplinas', function ($join) {
                $join->on('disciplinas.id', '=', 'classe_disciplinas.disciplina_id');
            })->select('classe_disciplinas.id as id_c_d', 'classe_disciplinas.*', 'disciplinas.*', 'classes.*')
            ->where('classe_disciplinas.it_estado', '=', 1)->get();
        $response['anoLectivo'] =   AnoLectivo::find(AnoLectivo::all()->max('id'));

        return view('admin.horarios.criar.index', $response, compact('classesDisciplinas'));
    }

    public function store(Request $request)
    {


        if ($request->vc_hora_inicio < $request->vc_hora_fim) {
            Horario::create($request->all());
            $this->Logger->Log('info', 'Adicionou Horario');
            return redirect()->back()->with('status', 1);
        } else {

            return redirect()->back()->with('aviso', 1);
        }
    }

    public function edit($id)
    {
        $disciplinas2 = $this->menuDisciplina->listarPorId();
        $response['disciplinas2'] = $disciplinas2;
        $horario = DB::table('horarios')
            ->join('dias_semanas', 'dias_semanas.id', 'horarios.it_id_dias')
            ->join('anoslectivos', function ($join) {
                $join->on('horarios.it_id_anoslectivos', '=', 'anoslectivos.id');
            })
            ->join('classe_disciplinas', function ($join) {
                $join->on('horarios.it_id_classedisciplina', '=', 'classe_disciplinas.id');
            })->join('classes', function ($join) {
                $join->on('classe_disciplinas.classe_id', '=', 'classes.id');
            })->join('disciplinas', function ($join) {
                $join->on('classe_disciplinas.disciplina_id', '=', 'disciplinas.id');
            })->select('horarios.id as id_horario', 'disciplinas.*', 'horarios.*', 'classes.*', 'dias_semanas.*', 'dias_semanas.id as id_dias_semana', 'classe_disciplinas.id as id_c_d', 'anoslectivos.*')
            ->where('horarios.id', $id)
            ->where('horarios.it_estado', 1)->get();
        $response['dias'] = Dias_semanas::where('it_estado', 1)->get();
        $response['classesDisciplinas'] = DB::table('classe_disciplinas')
            ->join('classes', function ($join) {
                $join->on('classes.id', '=', 'classe_disciplinas.classe_id');
            })
            ->join('disciplinas', function ($join) {
                $join->on('disciplinas.id', '=', 'classe_disciplinas.disciplina_id');
            })->select('classe_disciplinas.id as id_c_d', 'classe_disciplinas.*', 'disciplinas.*', 'classes.*')
            ->where('classe_disciplinas.it_estado', '=', 1)->get();
        $response['anoLectivo'] =   AnoLectivo::find(AnoLectivo::all()->max('id'));

        $response['anosLectivo'] = AnoLectivo::all();
        return view('admin.horarios.editar.index', $response, compact('horario'));
    }

    public function update(Request $request, $id)
    {


        if ($request->vc_hora_inicio < $request->vc_hora_fim) {
            Horario::find($id)->update($request->all());
            $this->Logger->Log('info', 'Adicionou Horario');
            return redirect()->back()->with('status', ' 1');
        } else {

            return redirect()->back()->with('aviso', 1);
        }
    }

    public function delete($id)
    {

        Horario::find($id)->update(['it_estado' => 0]);

        $this->Logger->Log('info', 'Eliminou Horario');
        return redirect()->back();
    }
}