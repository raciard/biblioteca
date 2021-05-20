<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Libro;
use Livewire\WithPagination;
class Dashboard extends Component
{
    use WithPagination;
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
        return view('livewire.dashboard', ['libri' => $libri->paginate(6)]);
    }
}
