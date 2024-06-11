<?php

namespace App\Livewire\Note;

use App\Models\Note;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use Livewire\WithFileUploads;
use function Termwind\render;

class CreateNote extends Component
{
    use WithFileUploads;
    use HasFactory;
    public $title, $note,$fixed,$archived;
    public $images = [];
    public $isFixed;
    public $open = false;

    protected $rules =[
        'title'=>'required|max:100',
        'note'=>'required|max:2000',
    ];

    public function save()
    {
        $this->validate();
        Note::create([
            'id_user' => Auth::user()->id,
            'Title' => $this->title,
            'Note' => $this->note,
            'IsFixed' =>$this->fixed,
            'IsArchived' => $this->archived
        ]);
        $this->reset(['open','title','note','fixed','archived']);
        $this->dispatch('note-created');
    }
    public function render()
    {
        return view('livewire.notes.create-note');
    }
}
