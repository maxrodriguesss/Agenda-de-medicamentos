<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registers;

class RegistersController extends Controller
{
    private $objRegister;
    public function __construct(){
        $this->objRegister= new Registers();
    }
    public function registers(){
        return view ('registers');
    }
    public function submitRegisters(Request $request){
        $solCadastro = $this->objRegister->create([
            'nome_usuario'=>$request->all_name,
            'cpf'=>$request->cpf,
            'email'=>$request->email,
            'telefone'=>$request->phone,
            'senha'=> bcrypt($request->password),
        ]);
        if($solCadastro){
            return redirect('home')->with('success', 'Solicitação realizada com sucesso, entre no seu e-mail !');
        }
        return back()->withErrors('Erro ao realizar a solicitação.');
    }
}
