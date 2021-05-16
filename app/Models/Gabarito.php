<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gabarito extends Model
{
        protected $fillable = [
            'vc_descricao_gabarito',
            // 'id_tarefa',
            'vc_gabarito',
            'vc_title',
        ];
    use HasFactory;
}
