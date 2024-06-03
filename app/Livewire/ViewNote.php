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
    $fixeds = Note::where('IsFixed', 1);
    $notes = Note::where('id_user', $user->id)->orderBy('id', 'desc')->get();
    return view('livewire.notes.view-note', compact(['notes', 'fixeds']));
  }
}
