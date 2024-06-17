<div>
    <x-button wire:click="$set('open_create', true)">
        {{ __('Create New Task') }}
    </x-button>
    <x-dialog-modal wire:model="open_create">
        <x-slot name="title">
            <h1>{{ __('Create Note') }}</h1>
        </x-slot>
        <x-slot name="content">
            @csrf
            <div>
                <div>
                    <input id="button-image" class="hidden" type="file" accept="image/png,image/jpeg"
                        wire:model='images' />
                    @if ($images)
                        <div class="mt-3 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach ($images as $image)
                                <div>
                                    <img src="{{ $image->temporaryUrl() }}" alt="Image Preview"
                                        class="w-full h-auto rounded-lg shadow-md" />
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="flex justify-between items-center">
                    <div>
                        <x-input wire:model.defer='title' value="{{ old('title') }}" type="text"
                            class="text-2xl font-bold text-gray-900  w-full bg-transparent border-none outline-none focus:border-white no-underline focus:ring-0 focus:text-black"
                            placeholder="{{ __('Title') }}" oninput="validateWord(this)">
                        </x-input>
                        <x-input-error for="title" />
                    </div>
                    <label for="button-image"
                        class="cursor-pointer relative text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                        style="display: inline-block; position: relative;">
                        <i class="fa-regular fa-image p-3" style="position: relative; z-index: 1;"></i>
                        <i class="fa-solid fa-plus"
                            style="position: absolute; top: 0; right: 0; background-color: transparent; border-radius: 100%; padding: 3px; z-index: 2;"></i>
                    </label>
                </div>
                <input type="number" class="hidden" name="id" id="id" value={{ Auth::user()->id }}>
                <textarea wire:model.defer='content' value="{{ old('content') }}" rows="10"
                    class=" w-full h-full resize-none bg-transparent border-none outline-none focus:border-white no-underline focus:ring-0"
                    placeholder="{{ __('Content') }}" oninput="validateWord(this)">
                </textarea>
            </div>
            <x-input-error for="content" />

            <div class="m-3">
                <button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">{{ __('Add Tags') }}
                    <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownSearch" class="z-10 hidden bg-white rounded-lg shadow w-60 dark:bg-gray-700">
                    <div class="p-3">
                        <label for="input-group-search" class="sr-only">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="text" id="input-group-search"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="{{ __('Search Etiquette') }}">
                        </div>
                    </div>
                    <ul class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200"
                        aria-labelledby="dropdownSearchButton">
                        @if ($etiquettes->count())
                            @foreach ($etiquettes as $etiquette)
                                <li class="select-none">
                                    <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="{{ $etiquette->id }}" type="checkbox" value="{{ $etiquette->id }}"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="{{ $etiquette->id }}"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">{{ $etiquette->description }}</label>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                    <a href="#"
                        class="flex items-center p-3 text-sm font-medium text-red-600 border-t border-gray-200 rounded-b-lg bg-gray-50 dark:border-gray-600 hover:bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-red-500 hover:underline">
                        <i class="fa-solid fa-tags mr-2"></i>{{ __('Delete Etiquette') }}
                    </a>
                </div>
            </div>

            {{-- PIN UP --}}
            <div class="m-3 flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                <input wire:model.defer='fixed' id="fixed" type="checkbox" value="" name="fixed"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="fixed"
                    class="cursor-pointer w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('PIN UP') }}</label>
            </div>

            {{-- ARCHIVE NOTE --}}
            <div class="m-3  flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                <input wire:model.defer='archived' id="archived" type="checkbox" value="" name="archived"
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
                            class="fa-solid fa-user-plus m-2"></i>
                    </button>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <button wire:click="$set('open_create', false)"
                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                {{ __('Cancel') }}
            </button>
            <button wire:click="save"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                {{ __('Save') }}</button>
        </x-slot>
    </x-dialog-modal>
</div>
