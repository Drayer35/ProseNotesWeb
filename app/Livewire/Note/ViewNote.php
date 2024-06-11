<?php

namespace App\Livewire\Note;

use App\Models\Note;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class ViewNote extends Component
{
  public $open = false;

  #[On('note-created')]
  public function render()
  {
    $user  = Auth::user();
    $fixeds = Note::where('id_user', $user->id)
      ->where('IsArchived', false)
      ->orWhereNull('IsArchived')
      ->where('Isfixed', true)
      ->orderBy('id', 'desc')
      ->get();
      
    $notes = Note::where('id_user', $user->id)
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
    return view('livewire.notes.view-note', compact(['notes', 'fixeds']));
  }
}
