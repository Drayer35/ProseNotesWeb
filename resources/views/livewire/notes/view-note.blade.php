<div>
    <div>
        <div class="lg:flex md:flex  justify-between items-center">
            @if ($fixeds->count() || $others->count())
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
            @endif
            @livewire('note.create-note')
        </div>
        @if ($fixeds->count() || $others->count())
            @if ($fixeds->count())
                <h5 class="text-xl font-bold dark:text-white">{{ __('FIXEDS') }}</h5>
                <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 my-5">
                    @foreach ($fixeds as $fixed)
                        <div
                            class=" flex flex-col justify-between break-words max-w-sm bg-white border border-gray-200 rounded-lg shadow hover:shadow-xl  select-none">
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-1">
                                @foreach ($fixed->images->slice(0, 4) as $image)
                                    <div class="w-full h-48">
                                        <img src="{{ asset('storage/' . $image->image) }}" alt="Imagen de la nota"
                                            class="w-full h-full object-cover rounded-md">
                                    </div>
                                @endforeach
                            </div>
                            <div class="p-5 flex-grow">
                                <div class="flex justify-between items-center">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $fixed->Title }}
                                    </h5>
                                    @if ($fixed->IsFixed)
                                        <button class="p-1 rounded-full hover:bg-gray-500">
                                            <i class="fa-solid fa-thumbtack fa-sm m-2" style="color: #e17f23;"></i>
                                        </button>
                                    @else
                                        <button class="rounded-full hover:bg-gray-500">
                                            <i class="fa-solid fa-thumbtack fa-sm m-2"></i>
                                        </button>
                                    @endif
                                </div>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $fixed->Content }}</p>
                            </div>
                            <div class="p-5">
                                <div class="flex overflow-hidden">
                                    @foreach ($fixed->etiquettes as $etiquette)
                                        @if (!is_null($etiquette->description))
                                            <div class="flex rounded-xl bg-gray-400 m-1 p-1 text-xs">
                                                {{ $etiquette->description }}</div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="flex justify-between items-center ">
                                    <span class="text-sm text-gray-400">{{ __('LastUpdate') }} :
                                        {{ $fixed->updated_at }}</span>
                                    <a wire:click="edit({{ $fixed }})"
                                        class="cursor-pointer text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm p-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                                        <i class="m-1 fa-solid fa-pencil fa-xs"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            @if ($others->count())
                <h5 class="text-xl font-bold dark:text-white">{{ __('OTHERS') }}</h5>
                <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 my-5">
                    @foreach ($others as $other)
                        <div
                            class=" flex flex-col justify-between break-words max-w-sm bg-white border border-gray-200 rounded-lg shadow hover:shadow-xl  select-none">
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-1">
                                @foreach ($other->images->slice(0, 4) as $image)
                                    <div class="w-full h-48">
                                        <img src="{{ asset('storage/' . $image->image) }}" alt="Imagen de la nota"
                                            class="w-full h-full object-cover rounded-md">
                                    </div>
                                @endforeach
                            </div>
                            <div class="p-5 flex-grow">
                                <div class="flex justify-between items-center">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                                        {{ $other->Title }}
                                    </h5>
                                    @if ($other->IsFixed)
                                        <button class="p-1 rounded-full hover:bg-gray-500">
                                            <i class="fa-solid fa-thumbtack fa-sm m-2" style="color: #e17f23;"></i>
                                        </button>
                                    @else
                                        <button class="rounded-full hover:bg-gray-500">
                                            <i class="fa-solid fa-thumbtack fa-sm m-2"></i>
                                        </button>
                                    @endif
                                </div>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $other->Content }}</p>
                            </div>
                            <div class="p-5">
                                <div class="flex overflow-hidden">
                                    @foreach ($other->etiquettes as $etiquette)
                                        @if (!is_null($etiquette->description))
                                            <div class="flex rounded-xl bg-gray-400 m-1 p-1 text-xs">
                                                {{ $etiquette->description }}</div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="flex justify-between items-center ">
                                    <span class="text-sm text-gray-400">{{ __('LastUpdate') }} :
                                        {{ $other->updated_at }}</span>
                                    <a wire:click="edit({{ $other }})"
                                        class="cursor-pointer text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm p-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                                        <i class="m-1 fa-solid fa-pencil fa-xs"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        @else
            <div class=" flex justify-center my-80">
                <div class="">
                    <i class="fa-solid fa-folder-open fa-7x flex justify-center" style="color: #77797e;"></i>
                    <h1 class=" text-slate-700">{{ __('Not Found Notes') }}</h1>
                </div>
            </div>
        @endif
    </div>
    <x-dialog-modal wire:model="open_edit">
        <x-slot name="title">
            <h1 class="">{{ __('Note') }}: N° {{ $note->id }}</h1>
        </x-slot>
        <x-slot name="content">
            <div class="flex flex-wrap ">
                @foreach ($note->images as $image)
                    <img src="{{ asset('storage/' . $image->image) }}" alt="Imagen de la nota"
                        class="w-1/2 p-1 object-cover">
                @endforeach
            </div>
            <div class="m-3">
                <div class="flex justify-between items-center">
                    <input type="text"
                        class="text-2xl font-bold text-gray-900 w-full bg-transparent border-none outline-none focus:border-white no-underline focus:ring-0 focus:text-black"
                        placeholder="{{ __('Title') }}" value="{{ $note->Title }}">
                </div>
                <textarea rows="10"
                    class="w-full h-full resize-none bg-transparent border-none outline-none focus:border-white no-underline focus:ring-0"
                    placeholder="{{ __('Content') }}">{{ $note->Content }}</textarea>
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
                <input {{ $note->IsFixed ? 'checked' : '' }} type="checkbox" id="{{ $note->id }}" name="Isfixed"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="{{ $note->id }}"
                    class="cursor-pointer w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
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
        </x-slot>
        <x-slot name="footer">
            {{-- <input type="submit"
                class=" cursor-pointer inline-flex items-center justify-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-1 transition ease-in-out duration-150 focus:text-black "> --}}
            <x-secondary-button wire:click="$set('open_edit',false)">
                {{ __('Cancel') }}
            </x-secondary-button>
            <x-danger-button wire:click="update">
                {{ __('Update') }}
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>
