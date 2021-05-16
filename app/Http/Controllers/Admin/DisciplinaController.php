<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Disciplina;
use App\Models\Logger;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\MenuController;

class DisciplinaController extends Controller
{
    //
    private $Logger;
    private $disciplinas1;
    public function __construct()
    {
        $this->disciplinas1 = new MenuController();
        $this->Logger = new Logger();
    }
    public function  listar()
    {
        $disciplinas2 = $this->disciplinas1->listarPorId();
        $disciplinas = Disciplina::where('it_estado', 1)->get();
        return view('admin.disciplina.index', compact('disciplinas', 'disciplinas2'));
    }

    public function criar()
    {
        return view('admin.disciplina.criar.index');
    }

    public function cadastrar(Request $disciplina)
    {
        if ($disciplina->hasFile('vc_imagem') && $disciplina->file('vc_imagem')->isValid()) {
            $name = uniqid(date('HisYmd'));

            $extension = $disciplina->vc_imagem->extension();

            $nameFile = "{$name}.{$extension}";

            $upload = $disciplina->vc_imagem->storeAs('disciplinas', $nameFile);

            if (!$upload) {
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao fazer upload')
                    ->withInput();
            } else {
                Disciplina::create(
                    [
                        'vc_disciplina' => $disciplina->vc_disciplina,
                        'vc_imagem' => $upload

                    ]
                );

                $this->Logger->Log('info', 'Adicionou Disciplina');
                return redirect()->route('disciplinas')->with('status', 1);
            }
        }
    }

    public function editar($id)
    {
        $disciplina =   Disciplina::find($id);
        return view('admin.disciplina.editar.index', compact('disciplina'));
    }

    public function actualizar(Request $disciplina, $id)
    {
        if ($disciplina->hasFile('vc_imagem') && $disciplina->file('vc_imagem')->isValid()) {
            $name = uniqid(date('HisYmd'));

            $extension = $disciplina->vc_imagem->extension();

            $nameFile = "{$name}.{$extension}";

            $upload = $disciplina->vc_imagem->storeAs('disciplinas', $nameFile);

            if (!$upload) {
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao fazer upload')
                    ->withInput();
            } else {
                Disciplina::find($id)->update([
                    'vc_disciplina' => $disciplina->vc_disciplina,
                    'vc_imagem' => $upload

                ]);

                $this->Logger->Log('info', 'Actualizou Disciplina');
                return redirect()->route('disciplinas')->with('status', 1);
            }
        }
    }

    public function eliminar($id)
    {
        Disciplina::find($id)->update(['it_estado' => 0]);
        $this->Logger->Log('info', 'Eliminou Disciplina');
        return redirect()->route('disciplinas');
    }
}
