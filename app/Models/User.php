<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Escola;
use App\Models\Classe;



class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vc_nomeUtilizador', 
        'vc_primemiroNome',
        'vc_nome_meio',
        'vc_apelido',
        'vc_email', 
        'password',
        'vc_tipoUtilizador', 
        'vc_telefone',         
        'vc_genero',
        'vc_BI',
        'dt_data_nascimento',
        'it_num_processo',
        'it_id_pai_utilizador',
        'it_id_escola',
        'vc_nome_meio',
        'current_team_id',
        'profile_photo_path'
    ];

    public function turmas_users(){
        return $this->hasMany(TurmaUser::class);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];


    public function escola()
    {
        return $this->belongsToMany(
            Escola::class,
            'matriculas',
            'it_id_utilizador',
            'it_id_escola');

    }
        public function classes()
    {
        return $this->belongsToMany(
            Classe::class,
            'matriculas',
            'it_id_utilizador',
            'it_id_classe');
    }
}
