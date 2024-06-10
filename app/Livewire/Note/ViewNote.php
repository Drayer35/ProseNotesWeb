<?php
namespace App\Livewire\Note;
use App\Models\Note;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class ViewNote extends Component
{
  public $open = false;
  
  #[On('note')] 
  public function render()
  {
    $user  = Auth::user();
    $fixeds = Note::where('id_user', $user->id)
              ->where('IsArchived', false)
             ->where('Isfixed', true)
             ->orderBy('id', 'desc')
             ->get();
    $notes = Note::where('id_user', $user->id)
            ->where('Isfixed', false)
            ->orderBy('id', 'desc')->get();
    return view('livewire.notes.view-note', compact(['notes', 'fixeds']));
    $this->dispatch('update');
  }
}
