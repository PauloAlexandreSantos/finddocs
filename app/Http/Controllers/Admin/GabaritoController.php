<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gabarito;
use App\Repositories\Eloquent\UtilizadorRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Support\Facades\Auth;

use App\Models\Logger;

class GabaritoController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('vc_gabarito') && $request->file('vc_gabarito')->isValid()) {

            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));

            // Recupera a extensão do arquivo
            $extension = $request->vc_gabarito->extension();

            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";

            // Faz o upload:
            $upload = $request->vc_gabarito->storeAs('Gabarito', $nameFile);
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao

            // Verifica se NÃO deu certo o upload ( Redireciona de volta )
            if (!$upload) {
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao fazer upload')
                    ->withInput();
            } else {
                Gabarito::create([
                    'vc_descricao_gabarito' => $request->vc_descricao_gabarito,
                    //'vc_title' => $request->vc_title,
                    'vc_gabarito' => $upload,
                ]);
            }
        }

        return redirect()->route('gabarito');
    }




    public function show(){
        $gabaritos =  Gabarito::all();

        return view('admin.gabarito.index',compact('gabaritos'));

    }

    public function criar(){
        return view('admin.gabarito.criar.index');
    }

    public function stsore(Request $request){
        $nameFile = null;

        // Verifica se informou o arquivo e se é válido
        if ($request->hasFile('chave') && $request->file('chave')->isValid()) {


            // Recupera a extensão do arquivo
            $extension = $request->image->extension();

            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";

            // Faz o upload:
            $upload = $request->image->storeAs('gabarito', $nameFile);
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao

            // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if (!$upload)
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao fazer upload')
                    ->withInput();
        }
    }
}

