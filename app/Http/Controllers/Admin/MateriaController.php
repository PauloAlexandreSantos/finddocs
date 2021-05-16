<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClasseDisciplina;
use App\Models\Horario;
use Illuminate\Http\Request;
use App\Models\Materia;
use App\Models\PDF;
use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\DB;
use App\Models\Logger;
use App\Http\Controllers\Admin\MenuController;
use Illuminate\Support\Facades\Auth;
use App\Models\AnoLectivo;

class MateriaController extends Controller
{
    private $Logger;
    private $menuDisciplina;
    public function __construct()
    {
        $this->menuDisciplina = new MenuController();
        $this->Logger = new Logger();
    }
    public function create()
    {
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

        $classeDisciplinas = DB::table('classe_disciplinas')
            ->join('classes', 'classe_disciplinas.classe_id', 'classes.id')
            ->join('disciplinas', 'classe_disciplinas.disciplina_id', 'disciplinas.id')

            ->select('disciplinas.vc_disciplina', 'classes.vc_classe', 'classe_disciplinas.id')
            ->where('classe_disciplinas.it_estado', 1)->get();


        return view('admin.materia.criar.index', compact('horarios', 'classeDisciplinas'));
    }


    public function store(Request $request)
    {
        $horario = Horario::find($request->id_horarios);
        $classeDisciplina = ClasseDisciplina::find($horario->id);

        if ($request->it_id_classeDisciplina != $horario->it_id_classedisciplina) {
            return redirect()->back()->with('aviso', 1);
        }
        //dd($request->it_id_classeDisciplina);
        $materia = Materia::create($request->all());
        /* $materia = Materia::create([
               'vc_materia'=>$request->vc_materia,
               'id_horarios'=>$request->id_horarios,
               'it_id_classeDisciplina'=>$request->it_id_classeDisciplina,
               'dt_data_vizualizar'=>$request->dt_data_vizualizar]);
*/
        $this->Logger->Log('info', 'Actualizou Escola');
        return redirect()->route('materia.ver')->with('status', 1);
    }

    public function show()
    {
        $materias = DB::table('materias')
            ->join('horarios', function ($join) {
                $join->on('horarios.id', '=', 'materias.id_horarios');
            })
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
            })->select('horarios.id as id_horarios', 'disciplinas.*', 'horarios.*', 'classes.*', 'dias_semanas.*', 'anoslectivos.*', 'materias.*', 'materias.id as id_m')
            ->where('materias.it_estado', 1)->get();

        return view('admin.materia.index', compact('materias'));
    }

    public function minhasMateria($id_user)
    {
        $materias = DB::table('materias')
            ->join('horarios', function ($join) {
                $join->on('horarios.id', '=', 'materias.id_horarios');
            })
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
            })
            ->join('matriculas', function ($join) {
                $join->on('matriculas.it_id_classe', '=', 'classes.id');
            })->join('users', function ($join) {
                $join->on('matriculas.it_id_utilizador', '=', 'users.id');
            })->select('horarios.id as id_horarios', 'disciplinas.*', 'horarios.*', 'classes.*', 'dias_semanas.*', 'anoslectivos.*', 'materias.*', 'materias.id as id_m')
            ->where('materias.it_estado', 1)
            ->where('matriculas.it_id_utilizador', $id_user)
            ->get();

        return view('admin.materia.index', compact('materias'));
    }

    public function buscasDiscicplina()
    {
        $anoslectivos = AnoLectivo::all();
        $user=User::find(Auth::id());
        if (  $user->vc_tipoUtilizador == 'Administrador' ) {
            $classesDisciplinas=DB::table('classe_disciplinas')
            ->join('classes', function ($join) {
                $join->on('classes.id', '=', 'classe_disciplinas.classe_id');
            })
            ->join('disciplinas', function ($join) {
                $join->on('disciplinas.id', '=', 'classe_disciplinas.disciplina_id');
            })
            ->select('classe_disciplinas.id as id_c_d','classe_disciplinas.*','disciplinas.*','classes.*')
           ->where('classe_disciplinas.it_estado','=',1)
           ->get();
           
        }else if($user->vc_tipoUtilizador == 'Professor'){
            $classesDisciplinas=DB::table('classe_disciplinas')
            ->join('classes', function ($join) {
                $join->on('classes.id', '=', 'classe_disciplinas.classe_id');
            })
            ->join('disciplinas', function ($join) {
                $join->on('disciplinas.id', '=', 'classe_disciplinas.disciplina_id');
            })->join('funcionario_escolas', function ($join) {
                $join->on('funcionario_escolas.it_id_classedisciplina', '=', 'classe_disciplinas.id');
            })
            ->where('classe_disciplinas.it_estado','=',1)
            ->where('funcionario_escolas.it_id_utilizador', '=', Auth::id())
            ->select('classe_disciplinas.id as id_c_d','classe_disciplinas.*','disciplinas.*','classes.*')
           ->get();
        }

            return view( 'admin.materia.pesquisar.index', compact( 'classesDisciplinas' ), compact('anoslectivos'));
        
    }

    public function listarMateria(Request $dados)
    {
       
        $materias=collect();
        $merge=collect();
        $user=User::find(Auth::id());
        if (  $user->vc_tipoUtilizador == 'Administrador' ) {
            $materias=$this->buscasMateria( $dados,$dados->id_anoLectivo );
        }else if($user->vc_tipoUtilizador == 'Professor'){
            $materias= $this->buscasMatProfessor( $dados,$dados->id_anoLectivo );
        }
       
        return view('admin.materia.index', compact('materias'));
    }


    public function buscasMateria( $dados,$id_anoLetivo){
          return DB::table('materias')
           ->join('horarios', function ($join) {
               $join->on('horarios.id', '=', 'materias.id_horarios');
           })
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
           })
         ->select('horarios.id as id_horarios', 'disciplinas.*', 'horarios.*', 'classes.*', 'dias_semanas.*', 'anoslectivos.*', 'materias.*', 'materias.id as id_m')
           ->where('materias.it_id_classedisciplina', '=',  $dados->it_id_classeDisciplina)
           ->where('horarios.it_id_anoslectivos', $id_anoLetivo)
           ->where('materias.it_estado', 1)
          
           ->get();
   
       }

       
    public function buscasMatProfessor( $dados,$id_anoLetivo){
     return   DB::table('materias')
        ->join('horarios', function ($join) {
            $join->on('horarios.id', '=', 'materias.id_horarios');
        })
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
        })
        ->join('funcionario_escolas', function ($join) {
            $join->on('funcionario_escolas.it_id_classedisciplina', '=', 'classe_disciplinas.id');
        })->join('users', function ($join) {
            $join->on('funcionario_escolas.it_id_utilizador', '=', 'users.id');
        })->select('horarios.id as id_horarios', 'disciplinas.*', 'horarios.*', 'classes.*', 'dias_semanas.*', 'anoslectivos.*', 'materias.*', 'materias.id as id_m')
        ->where('materias.it_id_classedisciplina', '=',  $dados->it_id_classeDisciplina)
        ->where('horarios.it_id_anoslectivos', $id_anoLetivo)
        ->where('materias.it_estado', 1)
        ->where('funcionario_escolas.it_id_utilizador',Auth::id())
        ->get();

    }

  



    public function edit($id)
    {
        $materia = Materia::find($id);

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
            })->select('horarios.id as id_horarios', 'disciplinas.*', 'horarios.*', 'classes.*', 'dias_semanas.*', 'anoslectivos.*')
            ->where('horarios.it_estado', 1)->where('horarios.id', $materia->id_horarios)->get();
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

        $classeDisciplina = DB::table('classe_disciplinas')
            ->join('classes', 'classe_disciplinas.classe_id', 'classes.id')
            ->join('disciplinas', 'classe_disciplinas.disciplina_id', 'disciplinas.id')

            ->select('disciplinas.vc_disciplina', 'classes.vc_classe', 'classe_disciplinas.id')
            ->where('classe_disciplinas.id', $materia->it_id_classeDisciplina)->get();

        $classeDisciplinas = DB::table('classe_disciplinas')
            ->join('classes', 'classe_disciplinas.classe_id', 'classes.id')
            ->join('disciplinas', 'classe_disciplinas.disciplina_id', 'disciplinas.id')

            ->select('disciplinas.vc_disciplina', 'classes.vc_classe', 'classe_disciplinas.id')
            ->where('classe_disciplinas.it_estado', 1)->get();

        return view('admin.materia.editar.index', compact('materia', 'classeDisciplina'), ['horario' => $horario, 'horarios' => $horarios, 'classeDisciplinas' => $classeDisciplinas]);
    }

    public function update(Request $request, $id)
    {
        $horario = Horario::find($request->id_horarios);
        $classeDisciplina = ClasseDisciplina::find($horario->id);

        if ($request->it_id_classeDisciplina != $horario->it_id_classedisciplina) {
            return redirect()->back()->with('aviso', 1);
        }
        Materia::find($id)->update($request->all());
        $this->Logger->Log('info', 'Actualizou uma Matéria');
        return redirect()->route('materia.ver')->with('status', 1);
    }

    public function delete($id)
    {
        $materia = Materia::find($id)->update(['it_estado' => 0]);
        $this->Logger->Log('info', 'Eliminou uma Matéria');
        return redirect()->route('materia.ver');
    }

    public function addvideo($id_materia)
    {
        return view('admin.materia.video.criar.index', compact('id_materia'));
    }

    public function addPDF($id_materia)
    {
        return view('admin.materia.PDF.criar.index', compact('id_materia'));
    }

    public function uploadvideo(Request $request, $id_materia)
    {
        // Verifica se informou o arquivo e se é válido
        if ($request->hasFile('vc_video') && $request->file('vc_video')->isValid()) {

            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));

            // Recupera a extensão do arquivo
            $extension = $request->vc_video->extension();

            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";

            // Faz o upload:
            $upload = $request->vc_video->storeAs('videoMateria', $nameFile);
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao

            // Verifica se NÃO deu certo o upload ( Redireciona de volta )
            if (!$upload) {
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao fazer upload')
                    ->withInput();
            } else {
                Video::create([
                    'vc_descricao' => $request->vc_descricao,
                    'vc_video' => $upload,
                    'id_materia' => $id_materia
                ]);
            }
            $this->Logger->Log('info', 'Adicionou Vídeo a Matéria');
            return redirect()->route('materia.ver')->with('status', 1);;
        }
    }

    public function uploadPDF(Request $request, $id_materia)
    {
        if ($request->hasFile('vc_pdf') && $request->file('vc_pdf')->isValid()) {

            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));

            // Recupera a extensão do arquivo
            $extension = $request->vc_pdf->extension();

            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";

            // Faz o upload:
            $upload = $request->vc_pdf->storeAs('pdfMateria', $nameFile);
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao

            // Verifica se NÃO deu certo o upload ( Redireciona de volta )
            if (!$upload) {
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao fazer upload')
                    ->withInput();
            } else {
                PDF::create([
                    'vc_descricao_pdf' => $request->vc_descricao_pdf,
                    'id_materia' => $id_materia,
                    'vc_pdf' => $upload,

                ]);
            }
        }
        $this->Logger->Log('info', 'Adicionou pdf a uma Matéria');
        return redirect()->route('materia.ver')->with('status', 1);
    }

    public function supervisionar($id)
    {

        $materia = Materia::find($id);

        $materiaPDF = DB::table('materias')
            ->join('p_d_f_s', function ($join) {
                $join->on('materias.id', '=', 'p_d_f_s.id_materia');
            })
            ->where('p_d_f_s.it_estado', 1)
            ->where('materias.id', '=', $id)->get();


        $materiaVideo = DB::table('materias')
            ->join(
                'videos',
                function ($join) {
                    $join->on('materias.id', '=', 'videos.id_materia');
                }
            )->where('materias.id', '=', $id)
            ->where('videos.it_estado', 1)
            ->get();
            $disciplinas2 = $this->menuDisciplina->listarPorId();


        return view('admin.materia.supervisionar.index', ['materiaPDF' => $materiaPDF, 'materiaVideo' => $materiaVideo, 'materia' => $materia,'disciplinas2'=>$disciplinas2]);
    }

    public function detalhar($id)
    {
        $disciplinas2 = $this->menuDisciplina->listarPorId();
        $response['disciplinas2'] = $disciplinas2;
        // $id = 1;
        $materia = Materia::find($id);
        $materiaPDF = DB::table('materias')
            ->join('p_d_f_s', function ($join) {
                $join->on('materias.id', '=', 'p_d_f_s.id_materia');
            })
            ->where('p_d_f_s.it_estado', 1)
            ->where('materias.id', '=', $id)->get();


        $materiaVideo = DB::table('materias')
            ->join(
                'videos',
                function ($join) {
                    $join->on('materias.id', '=', 'videos.id_materia');
                }
            )->where('materias.id', '=', $id)
            ->where('videos.it_estado', 1)
            ->get();
        $response['disciplinas2'] = $disciplinas2;
        $response['materiaPDF'] = $materiaPDF;
        $response['materiaVideo'] = $materiaVideo;
        $response['materia'] = $materia;
        return view('admin.materia.detalhes.index', $response);
    }

    public function editarVideo($id_materia, $id_video)
    {
        $video =   Video::find($id_video);

        return view('admin.materia.video.editar.index', compact('video'), compact('id_materia'));
    }


    public function uploadvideoEditar(Request $request, $id)
    {
        // Verifica se informou o arquivo e se é válido
        if ($request->hasFile('vc_video') && $request->file('vc_video')->isValid()) {

            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));

            // Recupera a extensão do arquivo
            $extension = $request->vc_video->extension();

            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";

            // Faz o upload:
            $upload = $request->vc_video->storeAs('videoMateria', $nameFile);
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao

            // Verifica se NÃO deu certo o upload ( Redireciona de volta )
            if (!$upload) {
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao fazer upload')
                    ->withInput();
            } else {
                Video::find($id)->update([
                    'vc_descricao' => $request->vc_descricao,
                    'vc_video' => $upload,

                ]);
            }
            $this->Logger->Log('info', 'Actualizou Vídeo a Matéria');
            return redirect()->route('materia.ver')->with('upload', 1);;
        }
    }
    public function excluirVideo($id_video)
    {
        Video::find($id_video)->update(['it_estado' => 0]);
        return redirect()->back()->with('delete', 1);
    }





    public function editarPDF($id_materia, $id_PDF)
    {
        $PDF =   PDF::find($id_PDF);

        return view('admin.materia.PDF.editar.index', compact('PDF'), compact('id_materia'));
    }


    public function uploadPDFEditar(Request $request, $id)
    {
        if ($request->hasFile('vc_pdf') && $request->file('vc_pdf')->isValid()) {

            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));

            // Recupera a extensão do arquivo
            $extension = $request->vc_pdf->extension();

            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";

            // Faz o upload:
            $upload = $request->vc_pdf->storeAs('pdfMateria', $nameFile);
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao

            $this->Logger->Log('info', 'Actualizou Escola');

            // Verifica se NÃO deu certo o upload ( Redireciona de volta )
            if (!$upload) {
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao fazer upload')
                    ->withInput();
            } else {
                PDF::find($id)->update([
                    'vc_descricao_pdf' => $request->vc_descricao_pdf,
                    'vc_pdf' => $upload,

                ]);
                return redirect()->back()->with('up', 1);
            }
        }
    }



    public function excluirPDF($id_video)
    {
        PDF::find($id_video)->update(['it_estado' => 0]);
        return redirect()->back()->with('delete', 1);
    }


    public function materiaAluno($id_classe_disciplina){
        $materias= Materia::where('it_id_classeDisciplina',$id_classe_disciplina)->get();

        $classeDisciplina=DB::table('classe_disciplinas')
        ->join('classes', function ($join) {
            $join->on('classes.id', '=', 'classe_disciplinas.classe_id');
        })
        ->join('disciplinas', function ($join) {
            $join->on('disciplinas.id', '=', 'classe_disciplinas.disciplina_id');

        })
      ->where('classe_disciplinas.it_estado','=',1)
       ->where('classe_disciplinas.id','=',$id_classe_disciplina) ->get();

        $materiaPDF=collect();
        $materiaVideo=collect();
        $materias1=$materias;
        foreach( $materias1 as $materia){
            $materiaPDF=  $materiaPDF->merge(PDF::where('id_materia',$materia->id)->get());
            $materiaPDF->all();
       
            $materiaVideo=   $materiaVideo->merge(Video::where('id_materia',$materia->id)->get());
            $materiaVideo->all();
        }
       
        $disciplinas2 = $this->menuDisciplina->listarPorId();
     return view('admin.supervisionar.aluno.index', ['materiaPDF' => $materiaPDF, 'materiaVideo' => $materiaVideo, 'materias' => $materias,'classeDisciplina'=>$classeDisciplina,'disciplinas2'=>$disciplinas2]);

    }
}
