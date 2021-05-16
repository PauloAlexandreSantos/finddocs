<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

use App\Repositories\Eloquent\UtilizadorRepository;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Support\Facades\Auth;

use App\Models\Logger;

class UserController extends Controller
{
    use PasswordValidationRules;

    protected $user;
    private $Logger;

    public function __construct(UtilizadorRepository $user)
    {
        $this->user = $user;
        $this->Logger = new Logger();
    }

    public function index()
    {
        $users = User::where('vc_tipoUtilizador', 'Administrador')->orWhere('vc_tipoUtilizador', 'Professor')->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.cadastrar.index');
    }

    public function salvar(Request $request)
    {

        try {

            if ($request->hasFile('foto') && $request->file('foto')->isValid()) {

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

                    Validator::make($dados, [
                        'vc_nomeUtilizador' => ['required', 'string', 'max:255'],
                        'vc_email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                        'password' => $this->passwordRules(),
                    ])->validate();
                    $this->user->store($dados);

                    $this->Logger->Log('info', 'Adicionou um Utilizador');
                    return redirect()->back()->with('status', 1);
                }
            }
        } catch (\Exception $exception) {

            return redirect()->back()->with('aviso', 1);
        }
    }

    public function editar($id)
    {
        $c = User::find($id);
        if ($response['user'] = User::find($id)) :
            $user = User::find($id);
            return view('admin.users.editar.index', compact('user'));
        else :
            return redirect('admin/users/cadastrar')->with('teste', 1);

        endif;
    }

    public function atualizar(Request $input, $id)
    {

        if ($input->hasFile('foto') && $input->file('foto')->isValid()) {

            // Define um aleatório para o arquivo baseado no timestamps atual

            $name = uniqid(date('HisYmd'));

            // Recupera a extensão do arquivo
            $extension = $input->foto->extension();

            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";

            // Faz o upload:
            $upload = $input->foto->storeAs('userPhoto', $nameFile);
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao

            // Verifica se NÃO deu certo o upload ( Redireciona de volta )
            if (!$upload) {
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao fazer upload')
                    ->withInput();
            } else {

                $dados[] = $input;
                $dados['profile_photo_path'] = $upload;

                $this->user->update($dados, $id);

                $this->Logger->Log('info', 'Actualizou um Utilizador');
                return redirect('admin/users/listar')->with('status', 1);
            }
        }
    }

    public function excluir($id)
    {
        User::find($id)->delete();
        $this->Logger->Log('info', 'Eliminou um Utilizador');
        return redirect()->back();
    }

    public function escrever()
    {
        return view('site.filho.index');
    }

    public function filhos($id)
    {
        $users = User::where('current_team_id', $id)->get();
        return view('site.filho.ver.index', compact('users'));
    }

    public function escreverFilho(Request $request, $id_user)
    {
        //dd( $request );

        // Verifica se informou o arquivo e se é válido
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {

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

                $dados['vc_tipoUtilizador'] = 'Filho';
                User::create([
                    'vc_nomeUtilizador' => $request->vc_nomeUtilizador,
                    'vc_email' => $request->vc_email,
                    'vc_tipoUtilizador' => $dados['vc_tipoUtilizador'],
                    'vc_telefone' => $request->vc_telefone,
                    'vc_primemiroNome' => $request->vc_primemiroNome,
                    'vc_nome_meio' => $request->vc_nome_meio,
                    'vc_apelido' => $request->vc_apelido,
                    'vc_genero' => $request->vc_genero,
                    'vc_BI' => $request->vc_BI,
                    'dt_data_nascimento' => $request->dt_data_nascimento,
                    'it_num_processo' => $request->it_num_processo,
                    //'it_id_pai_utilizador' => Auth::user()->id,
                    //'it_id_escola' => $request->it_id_escola,
                    'password' => Hash::make($request->password),
                    'current_team_id' => $id_user,
                    'profile_photo_path' => $upload
                ]);
            }
            $this->Logger->Log('info', 'Escreveu Filho');
            return redirect()->back()->with('status', 1);
        } else {
            return redirect()->back()->with('error', 1);
        }
    }
}
