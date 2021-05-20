<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use LivewireUI\Modal\ModalComponent;
use App\Models\Libro;
use Livewire\WithFileUploads;


class AdminEditModal extends ModalComponent
{
    public $libro;
    use WithFileUploads;

    public $titolo;
    public $autore;
    public $copertina;
    public $categoria = "narrativa";

    public $mode;
    public function mount($libroId, $mode){
        if($libroId > 0){
            $this->libro = Libro::find($libroId);
            $this->titolo = $this->libro->titolo;
            $this->autore = $this->libro->autore;
            $this->categoria = $this->libro->categoria;
        }
        $this->mode = $mode;
    }


    public function render()
    {


        return view('livewire.admin-edit-modal');
    }

    public function update()
    {
        $this->validate([
            'copertina' => 'nullable|image|max:1024',
            'titolo' => 'required|string',
            'autore' => 'required|string'

        ]);
        if ($this->copertina !== null) {

            $name = md5($this->copertina . microtime()) . '.' . $this->copertina->extension();
            $this->copertina->storeAs('public', $name);
            $this->libro->img_path = $name;
        }
        $this->libro->autore = $this->autore;
        $this->libro->titolo = $this->titolo;
        $this->libro->categoria = $this->categoria;
        $this->libro->save();

        $this->emit('closeModal');

        $this->emit('adminRefresh');

    }

    public function create(){
        $this->libro = new Libro();
        $this->update();
    }
}
