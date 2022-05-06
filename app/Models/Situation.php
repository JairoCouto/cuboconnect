<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Situation extends Model
{
    use HasFactory;

    protected $table = 'situacao_indicado';
    protected $primaryKey = 'id_situacao';
    public $timestamps = true;

    public $fillable = [
        'descricao',
        'created_at',
        'updated_at'
    ];
}
