<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendas;
use App\Models\Residents;
use App\Models\Medicines;

class AgendasController extends Controller
{
    private $objAgendas;
    private $objResidents;
    private $objMedicines;

    public function __construct(){
        $this->objAgendas = new Agendas();
        $this->objResidents = new Residents();
        $this->objMedicines = new Medicines();

    }
    public function agendas(){
        $residents = $this->objResidents->all();
        $medicines = $this->objMedicines->all();


        return view('agendas', compact('residents', 'medicines'));
    }
    public function submitAgendas(Request $request){
        $agendar = $this->objAgendas->create([
            'resident_id' => $request -> resident_name,
            'medicine_id' => $request -> medicine_name,
            'unidade_medida' => $request -> unit_measurement,
            'quantidade' => $request -> amount,
            'frequencia' => $request -> repetitions,
            'repeticoes' => $request -> duration,
            'horario' => $request -> hours,
        ]);
        if ($agendar) {
            return redirect('home')->with('success', 'Agendado com sucesso!');
        }
    }
}
