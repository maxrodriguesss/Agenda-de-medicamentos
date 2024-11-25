<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendas;
use App\Models\Residents;

class LoginsController extends Controller
{
    private $objAgenda;

    public function __construct(){
        $this->objAgenda = new Agendas();
    }

    public function index(){
        return view("index");
    }
    public function home(){
        $search = request('search');

        $residentQuery = $this->objAgenda->query();
        
        $residentQuery->where('nome_resident', 'like', '%' . $search . '%');

        return view("home", compact('search', 'residentQuery'));
    }
}
