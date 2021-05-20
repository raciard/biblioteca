<?php

namespace App\Http\Livewire;
use App\Models\Libro;
use App\Models\Prestito;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use LivewireUI\Modal\ModalComponent;

class PrenotaModal extends ModalComponent
{
    public $libroId;
    public function render()
    {
        return view('livewire.prenota-modal', ['libro' => Libro::find($this->libroId)]);
    }
    public function prenota(){
        
        DB::transaction(function () {
            $copia = Libro::find($this->libroId)->copie()->where('disponibile', true)->first();

            $prestito = new Prestito();
            $prestito->copia_id = $copia->id;
            $prestito->user_id = Auth::user()->id;
            $copia->prestiti()->save($prestito);
            
            $copia->disponibile = false;
            $copia->save();
        });
        $this->emit('closeModal');

        $this->emit('dashboardRefresh');

    }
}
