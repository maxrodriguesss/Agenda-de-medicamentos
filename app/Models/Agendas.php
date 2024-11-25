<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendas extends Model
{
    use HasFactory;
    protected $table = 'agendas';
    protected $filleable = [
        'id',
        'resident_id',
        'medicine_id',
        'unidade_medida',
        'quantidade',
        'frequencia',
        'repeticoes',
        'horario',
        'created_at',
        'updated_at',
    ];
    public function relResident()
    {
        return $this->belongsTo(Residents::class, 'resident_id');
    }

    public function relMedicine()
    {
        return $this->belongsTo(Medicines::class, 'medicine_id');
    }

}
