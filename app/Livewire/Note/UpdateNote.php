<?php
namespace App\Livewire\Note;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;

class UpdateNote extends Component
{
    public $open = false;
    public $title, $note,$fixed,$archived;

    #[On('update')]
    public function render()
    {
        return view('livewire.notes.update-note', ['note' => $this->note]);
    }

    public function sol()
    {
        dd($this->note->id);
        $nota = Note::find($this->note->id);
        $nota->Title=1;
        $nota->Note = 1;
        $nota->id_user = Auth::user()->id;
        $nota->save();
    }
}
