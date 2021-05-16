<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManuaisController extends Controller
{
    public function index(Request $id)
    {
        $uri = $id->id;
        $ativo = "active";
        return view('site.manuais.index', compact('uri', 'ativo'));
    }
}