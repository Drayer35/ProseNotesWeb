<?php

namespace App\Livewire\Note;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Note;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class ViewNote extends Component
{
  use WithFileUploads;

  public $note;
  public $title, $content, $fixed, $archived;
  public $identificator;
  public $images = [];
  public $open_edit = false;

  protected $rules = [
    'note.Title' => 'required',
    'note.Content' => 'required',
  ];

  public function mount()
  {
    $this->identificator = rand();
    $this->note =New Note();
  }
  public function edit(Note $note)
  {
    $this->note = $note;
    $this->open_edit = true;
  }

  public function update()
  {
    $this->validate();
    $this->note->save();
    $this->reset('open_edit');
  }
 

  #[On('note-created')]
  public function render()
  {
    $user  = Auth::user();
    $fixeds = Note::where('id_user', $user->id)
      ->where(function ($query) {
        $query->where('IsFixed', true);
      })
      ->where(function ($query) {
        $query->where('IsArchived', false)
          ->orWhereNull('IsArchived');
      })
      ->orderBy('id', 'desc')
      ->get();

    $others = Note::where('id_user', $user->id)
      ->where(function ($query) {
        $query->where('IsFixed', false)
          ->orWhereNull('IsFixed');
      })
      ->where(function ($query) {
        $query->where('IsArchived', false)
          ->orWhereNull('IsArchived');
      })
      ->orderBy('id', 'desc')
      ->get();
    return view('livewire.notes.view-note', compact(['others', 'fixeds']));
  }
}
