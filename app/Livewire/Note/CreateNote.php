<?php

namespace App\Livewire\Note;

use App\Models\Note;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use function Termwind\render;

class CreateNote extends Component

{
    use HasFactory;
    public $title, $note;
    public $isFixed;
    public $open = false;

    protected $rules =[
        'title'=>'required|max:100',
        'note'=>'required|max:2000',
    ];
    public function updatingOpen()
    {
        if ($this->open == false) {
            $this->reset(['title', 'note']);
        }
    }




    public function save()
    {
        $this->validate();
        Note::create([
            'id_user' => Auth::user()->id,
            'Title' => $this->title,
            'Note' => $this->note
        ]);
        $this->reset(['open','title','note']);

        $of=$this->dispatch('note');
        if($of){
        
            $this->render();
        }
    }
    public function render()
    {
        return view('livewire.notes.create-note');
    }
}
