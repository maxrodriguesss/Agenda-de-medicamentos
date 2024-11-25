<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicines extends Model
{
    use HasFactory;
    protected $table = 'medicines';

    protected $fillable = [
        'id',
        'nome_medicamento',
        'unidade_medida',
        'código',
        'created_at',
        'updated_at',
    ];  
    public function relAgendas()
{
    return $this->hasMany(Agendas::class, 'medicine_id');
}

}
