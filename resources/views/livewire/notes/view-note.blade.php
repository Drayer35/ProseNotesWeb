    <div>
        <div class="lg:flex md:flex  justify-between items-center">
            {{-- @if ($fixeds->count() || $notes->count())
            <div class=" bg-white  focus:bg-white px-4 rounded-lg shadow-md flex items-center">
                <button class="h   rounded-rb-full  rounded-rt-full  ">
                    <i class="fa-solid fa-magnifying-glass fa-xl " style="color: #393636;"></i>
                </button>
                <input type="text"
                    class="bg-transparent border-none outline-none focus:border-white no-underline focus:ring-0"
                    placeholder="{{ __('Search') }}">
                <button class="hidden  hover:bg-gray-300 rounded-2xl p-1">
                    <i class="fa-solid fa-x fa-xl" style="color: #393636;"></i>
                </button>
            </div>
            @endif --}}
            @livewire('note.create-note')
        </div>
        @if ($fixeds->count())
            <h5 class="text-xl font-bold dark:text-white">{{ __('FIXEDS') }}</h5>
            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 my-5">
                @foreach ($fixeds as $note)
                    <x-note-card :note="$note" />




                    
                @endforeach
            </div>
        @else
        @endif

        @if ($notes->count())
            <h5 class="text-xl font-bold dark:text-white">{{ __('OTHERS') }}</h5>
            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 my-5">
                @foreach ($notes as $note)
                    @livewire('note.update-note', ['note' => $note], key($note->id))
                @endforeach
            </div>
        @else
            <div class=" flex justify-center my-80">
                <div class="">
                    <i class="fa-solid fa-folder-open fa-7x flex justify-center" style="color: #77797e;"></i>
                    <h1 class=" text-slate-700">{{ __('Not Found Notes') }}</h1>
                </div>
            </div>
        @endif
    </div>
