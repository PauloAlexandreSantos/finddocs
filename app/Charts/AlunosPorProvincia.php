<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Escola;
class AlunosPorProvincia extends BaseChart
{
    public ?string $name = 'Aluno';

public ?string $routeName = 'Aluno';
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        
        
        $escolas = DB::table('escolas')->get();
        $labels = [];
        $count = [];
        foreach ($escolas as $sport){
            array_push($labels,$sport->it_id_provincia);
        }
        $values = Escola::with('users' )->get();
        foreach ($values as $item) {
            array_push($count,$item->users->count());
        }
        return Chartisan::build()
            ->labels($labels)
            ->dataset('Sample', $count);
    }
}