<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Libro;
class Dashboard extends Component
{
    public $search;
    public $categoria = "tutte";
    protected $listeners = [
        'dashboardRefresh' => '$refresh',
    ];
    public function render()
    {
        $libri = Libro::where('titolo', 'LIKE', "$this->search%");
        if($this->categoria != 'tutte'){
            $libri = $libri->where('categoria', $this->categoria);
        }
        return view('livewire.dashboard', ['libri' => $libri->get()]);
    }
}
