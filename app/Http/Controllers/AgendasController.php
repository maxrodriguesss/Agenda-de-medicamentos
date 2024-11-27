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

    public function __construct()
    {
        $this->objAgendas = new Agendas();
        $this->objResidents = new Residents();
        $this->objMedicines = new Medicines();

    }
    public function agendas()
    {
        $residents = $this->objResidents->all();
        $medicines = $this->objMedicines->all();
        $agendas = $this->objAgendas->all();  // Recupera todas as agendas, se necessário
    
        return view('agendas', compact('residents', 'medicines', 'agendas'));
    }
    
    public function submitAgendas(Request $request)
    {
        $agendar = $this->objAgendas->create([
            'resident_id' => $request->resident_name,
            'medicine_id' => $request->medicine_name,
            'unidade_medida' => $request->unit_measurement,
            'quantidade' => $request->amount,
            'frequencia' => $request->repetitions,
            'repeticoes' => $request->duration,
            'horario' => $request->hours,
        ]);
    
        if ($agendar) {
            return redirect('home')->with('success', 'Agendado com sucesso!');
        }
    
        return back()->with('error', 'Ocorreu um erro ao agendar.');
    }
    
    public function show($id)
    {
        $agenda = Agendas::with(['relResident', 'relMedicine'])->find($id);
    
        if (!$agenda) {
            return redirect()->route('home')->with('error', 'Agenda não encontrada.');
        }
    
        return view('show', compact('agenda'));
    }

    public function edit($id)
    {
        // Encontre a agenda específica
        $agenda = Agendas::findOrFail($id);
    
        // Recupere todos os residentes e medicamentos para preencher as opções do formulário
        $residents = $this->objResidents->all();
        $medicines = $this->objMedicines->all();
    
        // Passe as variáveis para a view
        return view('agendas.edit', compact('agenda', 'residents', 'medicines'));
    }
    

    public function update(Request $request, $id)
    {
        $agenda = Agendas::findOrFail($id);

        // Atualiza a agenda com os dados validados
        $agenda->update([
            'resident_id' => $request->resident_name,
            'medicine_id' => $request->medicine_name,
            'unidade_medida' => $request->unit_measurement,
            'quantidade' => $request->amount,
            'frequencia' => $request->repetitions,
            'repeticoes' => $request->duration,
            'horario' => $request->hours,
        ]);
    
        return redirect()->route('home')->with('success', 'Agenda atualizada com sucesso!');
    }


}
