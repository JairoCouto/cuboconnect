<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Enums\SituationIndicatedEnum;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    public $timestamps = true;

    protected $fillable = [
        'id_indicado',
        'nome',
        'cpf',
        'email',
        'situacao',
        'created_at',
        'updated_at'
    ];

    protected $appends = [
        'situacao_descricao',
        'data_criacao',
        'situacoes_indicado'
    ];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y H:i:s',
        'updated_at' => 'datetime:d/m/Y H:i:s'
    ];

    /**
     * Responsável por formatar o CPF com zero a esquerda
     */
    public function getCpfAttribute($cpf)
    {
        return str_pad($cpf, 11, "0", STR_PAD_LEFT);
    }

    public function getSituacaoDescricaoAttribute()
    {
        $situation = SituationIndicatedEnum::situationsIndicated($this->situacao);

        return $situation;
    }

    public function getDataCriacaoAttribute()
    {
        $date =  format_carbon_date($this->created_at, 'd/m/Y');

        return $date;
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class, 'id_usuario', 'id_usuario');
    }
}
