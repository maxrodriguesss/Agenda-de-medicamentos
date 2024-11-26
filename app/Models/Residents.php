<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Residents extends Model
{
    use HasFactory;
    protected $table = 'residents';

    protected $fillable = [
        'id',
        'nome_residente',
        'data_nascimento',
        'nome_responsavel',
        'endereco_responsavel',
        'telefone_responsavel',
        'observacao',
        'foto',
        'created_at',
        'updated_at',
    ];  
    public function relAgendas()
{
    return $this->hasMany(Agendas::class, 'resident_id');
}

}
