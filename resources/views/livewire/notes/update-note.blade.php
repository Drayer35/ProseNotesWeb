<div class="flex flex-wrap justify-center">
    <div 
        class="cursor-pointer flex flex-col justify-between break-words max-w-sm bg-white border border-gray-200 rounded-lg shadow  hover:shadow-xl transform hover:scale-105 transition-transform duration-400 ease-in-out select-none">
        @if (is_null($note->image))
        @else
            <div class="flex">
                <img src="data:image/png;base64,{{ base64_encode($note->image) }}">
            </div>
        @endif
        <div class="p-5 flex-grow">
            <div class="flex justify-between items-center">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{ $note->Title }}
                </h5>
                @if ($note->IsFixed)
                    <button class="p-1 rounded-full hover:bg-gray-500">
                        <i class="fa-solid fa-thumbtack fa-sm m-2" style="color: #e17f23;"></i>
                    </button>
                @else
                <button class=" rounded-full hover:bg-gray-500">
                    <i class="fa-solid fa-thumbtack fa-sm m-2"></i>
                </button>   
                @endif
            </div>
            <p wire:click="$set('open', true)" class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $note->Note }}</p>
        </div>
        <div class="p-5">
            <div class="flex  overflow-hidden ">
                @foreach ($note->etiquettes as $etiquette)
                    @if (is_null($etiquette->description))
                    @else
                        <div class="flex rounded-xl bg-gray-400 m-1 p-1  text-xs ">
                            {{$etiquette->description}}
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="flex justify-between">
                @if ($note->IsFinished)
                    <i class="fa-solid fa-flag" style="color: #37c35a;"></i>
                @else
                    <i class="fa-regular fa-flag"></i>
                @endif
                <span class="text-sm text-gray-400">{{ __('LastUpdate') }} : {{ $note->updated_at }}</span>

            </div>
        </div>

    </div>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            <h1 class="">{{ __('Note') }}: N° {{ $note->id }}</h1>
        </x-slot>
        <x-slot name="content">
            <form action="">
                <div class="">
                    <div class="flex justify-between items-center">
                        <input type="text"
                            class="text-2xl font-bold text-gray-900 w-full bg-transparent border-none outline-none focus:border-white no-underline focus:ring-0 focus:text-black"
                            placeholder="{{ __('Title') }}" value="{{ $note->Title }}">
                    </div>
                    <textarea rows="10"
                        class="w-full h-full resize-none bg-transparent border-none outline-none focus:border-white no-underline focus:ring-0"
                        placeholder="{{ __('Content') }}">{{ $note->Note }}</textarea>
                </div>
                <div class="flex content-center">
                    <h1>{{ __('Colaborators') }} <i class="fa-solid fa-users self"></i></h1>
                </div>
                <div>
                    <button><i class="fa-solid fa-user-plus"></i></button>
                </div>
                <input type="submit"
                    class=" cursor-pointer inline-flex items-center justify-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-1 transition ease-in-out duration-150 focus:text-black ">
            </form>
        </x-slot>
        <x-slot name="footer">
        </x-slot>
    </x-dialog-modal>
</div>
