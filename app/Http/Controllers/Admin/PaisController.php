<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logger;
use App\Models\User;
use App\Repositories\Eloquent\UtilizadorRepository;

class PaisController extends Controller {
    //
    protected $user;
    private $Logger;

    public function __construct( UtilizadorRepository $user ) {
        $this->user = $user;
        $this->Logger = new Logger();
    }

    public function listar() {
        $pais = User::where( 'vc_tipoUtilizador', 'Encarregado' )->get();
        return view( 'admin.pais.index', compact( 'pais' ) );
    }

    public function excluir( $id ) {
        User::find( $id )->delete();
        $this->Logger->Log( 'info', 'Eliminou um Utilizador|Pai' );
        return redirect()->back();
    }
}
