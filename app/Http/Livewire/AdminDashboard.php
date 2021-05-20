<?php

namespace App\Http\Livewire;

use App\Models\Libro;
use Livewire\Component;

class AdminDashboard extends Component
{

    protected $listeners = [
        'adminRefresh' => '$refresh',
    ];
    public function render()
    {
        return view('livewire.admin-dashboard', ['libri' => Libro::all()]);
    }
}
