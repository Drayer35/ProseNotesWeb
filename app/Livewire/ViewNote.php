<?php
namespace App\Livewire;
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
             ->where('Isfixed', true)
             ->orderBy('id', 'desc')
             ->get();
    $notes = Note::where('id_user', $user->id)
            ->where('IsArchived', false)
            ->where('Isfixed', false)
            ->orderBy('id', 'desc')->get();
    return view('livewire.notes.view-note', compact(['notes', 'fixeds']));
  }
}
