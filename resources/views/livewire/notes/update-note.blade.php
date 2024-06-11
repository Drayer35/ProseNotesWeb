<div> {{-- QUITAR flex  justify-center PARA QUE SE AJUSTE A SU TAMAÑO- --}}
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
                    <button wire:click="sol" class=" rounded-full hover:bg-gray-500">
                        <i class="fa-solid fa-thumbtack fa-sm m-2"></i>
                    </button>
                @endif
            </div>
            <p wire:click="$set('open', true)" class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                {{ $note->Note }}</p>
        </div>
        <div class="p-5">
            <div class="flex  overflow-hidden ">
                @foreach ($note->etiquettes as $etiquette)
                    @if (is_null($etiquette->description))
                    @else
                        <div class="flex rounded-xl bg-gray-400 m-1 p-1  text-xs ">
                            {{ $etiquette->description }}
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
                <div class="m-3">
                    <div class="flex justify-between items-center">
                        <input type="text"
                            class="text-2xl font-bold text-gray-900 w-full bg-transparent border-none outline-none focus:border-white no-underline focus:ring-0 focus:text-black"
                            placeholder="{{ __('Title') }}" value="{{ $note->Title }}">
                    </div>
                    <textarea rows="10"
                        class="w-full h-full resize-none bg-transparent border-none outline-none focus:border-white no-underline focus:ring-0"
                        placeholder="{{ __('Content') }}">{{ $note->Note }}</textarea>
                </div>

                {{-- ETTIQUETES --}}
                <div class="m-3 flex overflow-y-auto">
                    @foreach ($note->etiquettes as $etiquette)
                        @if (is_null($etiquette->description))
                        @else
                            <div
                                class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-2 py-1 text-center inline-flex items-center dark:focus:ring-gray-600 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 me-2 mb-2">
                                {{ $etiquette->description }}
                                <button class="cursor-pointer hover:bg-gray-400 rounded-full ml-2 p-1">
                                    <span class="m-2 text-bold">x</span>
                                </button>
                            </div>
                        @endif
                    @endforeach
                </div>
                {{-- PIN UP --}}
                <div class="m-3 flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                    <input {{ $note->IsFixed ? 'checked' : '' }} type="checkbox" id="{{$note->id}}" name="Isfixed" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="{{$note->id}}" class="cursor-pointer w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        {{ __('PIN UP') }}
                    </label>
                </div>
                {{-- ARCHIVE NOTE --}}
                <div class="m-3  flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                    <input {{ $note->IsArchived ? 'checked' : '' }} id="archived" type="checkbox" value=""
                        name="archived"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="archived"
                        class=" cursor-pointer w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('ARCHIVE NOTE') }}</label>
                </div>

                {{-- COLABORATORS --}}
                <div class="m-3   items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                    <div class="flex content-center">
                        <h1>{{ __('Colaborators') }} <i class="fa-solid fa-users self"></i></h1>
                    </div>
                    <div>
                        <button class="  rounded-full shadow-lg hover:bg-gray-300"><i
                                class="fa-solid fa-user-plus m-2"></i></button>
                    </div>
                </div>
            </form>
        </x-slot>
        <x-slot name="footer">
            <input type="submit"
                class=" cursor-pointer inline-flex items-center justify-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-1 transition ease-in-out duration-150 focus:text-black ">
        </x-slot>
    </x-dialog-modal>
</div>
