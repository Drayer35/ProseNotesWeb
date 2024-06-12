<div
    class=" flex flex-col justify-between break-words max-w-sm bg-white border border-gray-200 rounded-lg shadow hover:shadow-xl  select-none">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-1">
        @foreach ($note->images->slice(0, 4) as $image)
            <div class="w-full h-48">
                <img src="{{ asset('storage/' . $image->image) }}" alt="Imagen de la nota"
                    class="w-full h-full object-cover rounded-md">
            </div>
        @endforeach
    </div>
    <div class="p-5 flex-grow">
        <div class="flex justify-between items-center">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $note->Title }}</h5>
            @if ($note->IsFixed)
                <button class="p-1 rounded-full hover:bg-gray-500">
                    <i class="fa-solid fa-thumbtack fa-sm m-2" style="color: #e17f23;"></i>
                </button>
            @else
                <button class="rounded-full hover:bg-gray-500">
                    <i class="fa-solid fa-thumbtack fa-sm m-2"></i>
                </button>
            @endif
        </div>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $note->Note }}</p>
    </div>
    <div class="p-5">
        <div class="flex overflow-hidden">
            @foreach ($note->etiquettes as $etiquette)
                @if (!is_null($etiquette->description))
                    <div class="flex rounded-xl bg-gray-400 m-1 p-1 text-xs">{{ $etiquette->description }}</div>
                @endif
            @endforeach
        </div>
        <div class="flex justify-between items-center ">
            <span class="text-sm text-gray-400">{{ __('LastUpdate') }} : {{ $note->updated_at }}</span>
            @livewire('note.edit-note', ['note' => $note], key($note->id))
        </div>
    </div>

</div>
