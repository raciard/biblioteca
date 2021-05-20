<?php

namespace App\Http\Livewire;

use App\Models\Copia;
use App\Models\Libro;
use Livewire\Component;

class AdminCopie extends Component
{
    protected $listeners = [
        'adminCopiaRefresh' => '$refresh',
    ];
    public $libro;
    public function mount($libroId){
        $this->libro = Libro::find($libroId);
    }

    public function nuovaCopia(){
        Copia::factory()->for($this->libro)->create();
        $this->emit('adminCopiaRefresh'); 

    }

    public function render()
    {
        return view('livewire.admin-copie');
    }
}
