<?php

namespace App\Http\Livewire;

use App\Models\Prestito;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use \Carbon\Carbon;


class Prestiti extends Component
{
    public $da_restituire = false;
    public function render()
    {
        $prestiti = Auth::user()->prestiti()->orderBy('created_at', 'DESC');
        if($this->da_restituire){
            $prestiti = $prestiti->where('restituito', false);
        }
        return view('livewire.prestiti', ['prestiti' => $prestiti->get()]);
    }

    public function restituisci($id){
        
        DB::transaction(function () use ($id){
           $prestito = Prestito::find($id);
           $prestito->restituito = true;
           $prestito->data_fine = Carbon::now();
           $prestito->save();
           $copia = $prestito->copia;
           $copia->disponibile = true;
           $copia->save();
        });
    }
}
