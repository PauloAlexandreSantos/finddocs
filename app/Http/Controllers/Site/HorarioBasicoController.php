<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HorarioBasicoController extends Controller
{
    public function index(Request $id)
    {
        $uri = $id->id;
        $ativo = "active";
        return view('site.horarios-basico.index', compact('uri', 'ativo'));
    }
}