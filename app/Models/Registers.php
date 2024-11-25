<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registers extends Model
{
    use HasFactory;
    protected $table = 'registers';

    protected $fillable = [
        'id',
        'nome_produto',
        'descricao',
        'categoria',
        'marca',
        'unidade_medida',
        'qtd_minima',
        'created_at',
        'updated_at',
    ];  
}
