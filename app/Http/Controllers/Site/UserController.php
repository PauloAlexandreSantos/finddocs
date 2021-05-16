<?php
/* Este sistema esta protegido pelos direitos autoriais do Instituto de Telecomunicações criado ao
abrigo do decreto executivo conjunto nº29/85 de 29 de Abril,
dos Ministérios da Educação e dos Transportes e Comunicações,
publicado no Diário da República, 1ª série nº 35/85, nos termos
do artigo 62º da Lei Constitucional.

contactos:
site:www.itel.gov.ao
Telefone I: +244 931 313 333
Telefone II: +244 997 788 768
Telefone III: +244 222 381 640
Email I: secretariaitel@hotmail.com
Email II: geral@itel.gov.ao*/

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

use App\Repositories\Eloquent\UtilizadorRepository;

use Illuminate\Support\Facades\Validator;

use App\Actions\Fortify\PasswordValidationRules;

class UserController extends Controller
{
    use PasswordValidationRules;

    protected $user;

    public function __construct(UtilizadorRepository $user)
    {
        $this->user = $user;
    }

    public function create()
    {
        $uri = 'ops';

        return view('site.encarregado.index', compact('uri'));
    }

    public function salvar(Request $request)
    {
       
        /* try { */
        /*      if ($request->hasFile('foto') && $request->file('foto')->isValid()) {

                // Define um aleatório para o arquivo baseado no timestamps atual
                $name = uniqid(date('HisYmd'));

                // Recupera a extensão do arquivo
                $extension = $request->foto->extension();

                // Define finalmente o nome
                $nameFile = "{$name}.{$extension}";

                // Faz o upload:
                $upload = $request->foto->storeAs('userPhoto', $nameFile);
                // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao

                // Verifica se NÃO deu certo o upload ( Redireciona de volta )
                if (!$upload) {
                    return redirect()
                        ->back()
                        ->with('error', 'Falha ao fazer upload')
                        ->withInput();
                } else {

                    $dados = $request->all();
                    $dados['profile_photo_path'] = $upload;

                    $dados['vc_tipoUtilizador'] = 'Encarregado';

                    Validator::make($dados, [
                        'vc_nomeUtilizador' => ['required', 'string', 'max:255'],
                        'vc_email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                        'password' => $this->passwordRules(),
                    ])->validate();
                    $this->user->store($dados);

                    return redirect()->route('site')->with('status', '1');
                }
            } else { */
        $dados = $request->all();
        $dados['vc_tipoUtilizador'] = 'Encarregado';
        Validator::make($dados, [
            'vc_nomeUtilizador' => ['required', 'string', 'max:255'],
            'vc_email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ])->validate();
        $this->user->store($dados);


        return redirect('login')->with('encarregado', '1');
        /*  } */
        /*  } catch (\Exception $exception) {
            return redirect()->back()->with('aviso', '1');
        } */
    }

    public function editar($id)
    {
        $c = User::find($id);
        if ($response['user'] = User::find($id)) :
            $user = User::find($id);
            return view('site.users.editar.index', compact('user'));
        else :
            return redirect('site/users/cadastrar')->with('teste', '1');

        endif;
    }
}
