<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioFilial extends Model
{
    use HasFactory;

    protected $table = 'usuario_filiais';

    protected $fillable = [
        'user_id',
        'filial_id',
    ];
}
