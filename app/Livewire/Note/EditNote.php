<?php

namespace App\Livewire\Note;

use Livewire\Component;

class EditNote extends Component
{
    public $open = false;
    public $note;
    public function mount($note)
    {
        $this->note = $note;
    }
    public function render()
    {
        return view('livewire.notes.edit-note');
    }
}
