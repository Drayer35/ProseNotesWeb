<div>
    <x-button wire:click="$set('open', true)">
        {{ __('Create New Task') }}
    </x-button>
    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            <h1>{{ __('Create Note') }}</h1>
        </x-slot>
        <x-slot name="content">
            <div>
                <div>
                    @csrf
                    <div>
                        <div>
                            <x-input type="file" accept="image/png,image/jpeg" wire:model='images' />
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
                        <div class=" justify-between items-center">
                            <x-input wire:model.defer='title' value="{{ old('title') }}" type="text"
                                class="text-2xl font-bold text-gray-900  w-full bg-transparent border-none outline-none focus:border-white no-underline focus:ring-0 focus:text-black"
                                placeholder="{{ __('Title') }}" oninput="validateWord(this)">
                            </x-input>
                            <x-input-error for="title" />
                        </div>
                        <input type="number" class="hidden" name="id" id="id" value={{ Auth::user()->id }}>
                        <textarea wire:model.defer='note' value="{{ old('note') }}" id="note" rows="10"
                            class="note w-full h-full resize-none bg-transparent border-none outline-none focus:border-white no-underline focus:ring-0"
                            placeholder="{{ __('Content') }}" oninput="validateWord(this)">
                        </textarea>
                      
                    </div>
                    <x-input-error for="note" />
              

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
                                    class="fa-solid fa-user-plus m-2"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="save">save</x-danger-button>

        </x-slot>
    </x-dialog-modal>
</div>
