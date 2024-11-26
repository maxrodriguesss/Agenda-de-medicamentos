<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendas;
use App\Models\Residents;

class LoginsController extends Controller
{
    private $objAgendas;

    public function __construct()
    {
        $this->objAgendas = new Agendas();
    }

    public function index()
    {
        return view("index");
    }
    public function submitIndex(Request $request){
        // $credentials = $request->only('email','password');
        // $authenticated = Auth::attempt($credentials);
        // if($authenticated){
        //     $request->session()->regenerate();
        //     return view('home');
        // }
        return redirect('home');
    }


    public function home()
    {

        $search = request('search');
    

        $residents = Residents::query()
            ->where('nome_residente', 'like', '%' . $search . '%')
            ->get();
    

        $agendas = Agendas::with(['relResident', 'relMedicine'])
            ->whereHas('relResident', function ($query) use ($search) {
                $query->where('nome_residente', 'like', '%' . $search . '%');
            })
            ->orderBy('horario', 'asc')
            ->get();
    
        
        return view("home", compact('search', 'residents', 'agendas'));
    }
    public function show($id)
    {
        $agenda = Agendas::with(['relResident', 'relMedicine'])->find($id);
    
        if (!$agenda) {
            return redirect()->route('home')->with('error', 'Agenda não encontrada.');
        }
    
        return view('show', compact('agenda'));
    }
     
}
