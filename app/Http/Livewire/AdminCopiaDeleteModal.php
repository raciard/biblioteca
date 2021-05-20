<?php

namespace App\Http\Livewire;

use App\Models\Copia;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Facades\DB;

class AdminCopiaDeleteModal extends ModalComponent
{
    public $copiaId;
    public function render()
    {
        return view('livewire.admin-copia-delete-modal');
    }

    public function elimina(){
        DB::transaction(function(){
            $copia = Copia::find($this->copiaId);
            foreach($copia->prestiti as $prestito){
                $prestito->delete();
            }
            $copia->delete();
        });
        $this->emit('closeModal');

        $this->emit('adminCopiaRefresh');
    }
}
