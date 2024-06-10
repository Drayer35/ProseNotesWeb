<?php

namespace App\Livewire\Note;

use Livewire\Component;
use Livewire\Attributes\On;

class UpdateNote extends Component
{
    public $open = false;   
    public $note;


    
    #[On('update')] 
    public function render()
    {
        return view('livewire.notes.update-note',['note' => $this->note]);
    }
}
