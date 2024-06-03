<?php

namespace App\Livewire;

use App\Models\Note;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
class CreateNote extends Component

{
    use HasFactory;
    public $title, $note;
    public $isFixed;
    public $open = false;


    public function save()
    {
        Note::create([
            'id_user' => Auth::user()->id,
            'Title' => $this->title,
            'Note' => $this->note
        ]);

        $this->reset(['open','title','note']);
        $this->dispatch('note-created');
    }
    public function render()
    {
        return view('livewire.notes.create-note');
    }
}
