<?php

namespace App\Livewire\Note;

use App\Models\Etiquette;
use App\Models\Note;
use App\Models\image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use Livewire\WithFileUploads;

class CreateNote extends Component
{
    use WithFileUploads;
    use HasFactory;

    public $title, $note, $fixed, $archived;
    public $images = [],$checkEtiquettes = [];
    public $open=false;
    protected $rules = [
        'title' => 'required|max:80',
        'note' => 'required|max:2000',
    ];


    public function save()
    {
        $this->validate();

        $note=Note::create([
            'id_user' => Auth::user()->id,
            'Title' => $this->title,
            'Note' => $this->note,
            'IsFixed' => $this->fixed,
            'IsArchived' => $this->archived,
        ]);

        $this->reset(['open', 'title', 'note', 'fixed', 'archived', 'images']);
        $this->dispatch('note-created');
    }

    public function render()
    {
        $etiquettes=Etiquette::all();
        return view('livewire.notes.create-note',compact(['etiquettes']));
    }
}
