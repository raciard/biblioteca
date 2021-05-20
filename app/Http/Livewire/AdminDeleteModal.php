<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;
use App\Models\Libro;
use App\Models\Prestito;
use Illuminate\Support\Facades\DB;

class AdminDeleteModal extends ModalComponent
{
    public $libro;
    public function mount($libroId){
        $this->libro = Libro::find($libroId);
    }
    public function render()
    {
        return view('livewire.admin-delete-modal');
    }

    public function elimina(){
        DB::transaction(function(){
            foreach($this->libro->copie as $copia){
                foreach($copia->prestiti as $prestito)
                    $prestito->delete();
                $copia->delete();
            }
            $this->libro->delete();
        });
        $this->emit('closeModal');

        $this->emit('adminRefresh');
    }
}
