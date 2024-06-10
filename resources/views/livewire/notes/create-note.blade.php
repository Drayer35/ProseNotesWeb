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
                        <div class=" justify-between items-center">
                            <x-input wire:model.defer='title' value="{{ old('title') }}" type="text"
                                class="text-2xl font-bold text-gray-900  w-full bg-transparent border-none outline-none focus:border-white no-underline focus:ring-0 focus:text-black"
                                placeholder="{{ __('Title') }}" oninput="validateWord(this)">
                            </x-input>
                            <x-input-error for="title" />

                            {{-- <input type="checkbox" name="fixed" class="hidden" id="fixed" wire:model="isFixed"
                                value="1" oninput="validateWord(this)"> --}}

                            {{-- @if ($isFixed == 1)
                                <label for="fixed" wire:click="$set('isFixed', 0)"> <i class="fa-solid fa-thumbtack cursor-pointer" style="color: #e17f23;"></i></label>
                            @else
                                <label for="fixed" wire:click="$set('isFixed', 1)"> <i class="fa-solid fa-thumbtack cursor-pointer"></i> </label>
                            @endif --}}
                        </div>
                        <input type="number" class="hidden" name="id" id="id" value={{ Auth::user()->id }}>
                        <textarea wire:model.defer='note' value="{{ old('note') }}" id="note" rows="10"
                            class="note w-full h-full resize-none bg-transparent border-none outline-none focus:border-white no-underline focus:ring-0"
                            placeholder="{{ __('Content') }}" oninput="validateWord(this)">
                        </textarea>
                        <x-input-error for="note" />
                    </div>
                    <div>
                        <div class="flex content-center">
                            <h1>{{ __('Colaborators') }} <i class="fa-solid fa-users self"></i></h1>
                        </div>

                        <div>
                            <button><i class="fa-solid fa-user-plus"></i></button>
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
