<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contato';
    protected $primaryKey = 'id_contato';
    public $timestamps = true;

    public $fillable = [
        'id_usuario',
        'ddd',
        'numero',
        'created_at',
        'updated_at'
    ];
}
