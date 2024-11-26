<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Residents;

class ResidentsController extends Controller
{
    private $objResidents;
    public function __construct(){
        $this->objResidents = new Residents();
    }
    public function residents (){
        return view ('residents');
    }
    public function submitResidents(Request $request){
        
        $filePath = $request->file('formFile')->store('storage/uploads/residents', 'public');

        $cadResident = $this->objResidents->create([
            'nome_residente' => $request-> all_name,
            'data_nascimento' => $request-> birth_date,
            'nome_responsavel' => $request-> person_responsible,
            'endereco_responsavel' => $request-> adress,
            'telefone_responsavel' => $request-> phone,
            'observacao' => $request-> obs,
            'foto' => $filePath,
        ]);
        if($cadResident){
            return redirect('home')->with('success', 'Cadastro realizado com sucesso !');
        }
        return back()->withErrors('Erro ao realizar o cadastro.');
    }
}
