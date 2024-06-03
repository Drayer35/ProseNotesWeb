<?php

namespace App\Livewire;

use App\Models\Note;
use Livewire\Component;
use Livewire\Attributes\On;

class UpdateNote extends Component
{
    public $open = false;   
    public $note;
    
    #[On('note-created')]
    public function render()
    {

        return view('livewire.notes.update-note',['note' => $this->note]);
    }
}