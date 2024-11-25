<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicines;

class MedicinesController extends Controller
{
    private $objMedicines;

    public function __construct(){
        $this->objMedicines = new Medicines();
    }
    public function medicines(){
        return view('medicines');
    }

    public function submitMedicines(Request $request){
        $cadMedicines = $this->objMedicines->create([
            'nome_medicamento' => $request -> medicine_name,
            'unidade_medida' => $request -> unit_measurement,
            'código' => $request -> code,
        ]);
        if($cadMedicines){
            return redirect('medicines')->with('success', 'Cadastro realizado com sucesso !');
        }
        return back()->withErrors('Erro ao realizar o cadastro.');
        
    }
}
