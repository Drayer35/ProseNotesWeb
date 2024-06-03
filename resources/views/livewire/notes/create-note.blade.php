<div>
    <x-button wire:click="$set('open', true)">
        {{__('Create New Task')}}
    </x-button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            <h1>{{__('Create Note')}}</h1>
        </x-slot>
        <x-slot name="content">
            <div>
                <div>
                    @csrf
                    <div class="">
                       
                        <div class="flex justify-between items-center">
                            <x-input wire:model.defer='title' value="{{old('title')}}"   type="text" class="w-full bg-transparent border-none outline-none focus:border-white no-underline focus:ring-0 focus:text-black" placeholder="{{ __('Title')}}"  oninput="validateWord(this)"></x-input>
                            @error('title')
                             <small class="alert text-red-600">{{$message}}</small>
                            @enderror
                            <input type="checkbox" name="fixed" class="hidden"   id="fixed" wire:model="isFixed" value="1" oninput="validateWord(this)">
                            {{-- @if($isFixed == 1)
                                <label for="fixed" wire:click="$set('isFixed', 0)"> <i class="fa-solid fa-thumbtack cursor-pointer" style="color: #e17f23;"></i></label>
                            @else
                                <label for="fixed" wire:click="$set('isFixed', 1)"> <i class="fa-solid fa-thumbtack cursor-pointer"></i> </label>
                            @endif --}}
                        </div>
                        <input type="number" class="hidden" name="id" id="id"  value={{Auth::user()->id}}>
                        <textarea  wire:model.defer='note'  value="{{old('note')}}"   id="note" rows="10" class="note w-full h-full resize-none bg-transparent border-none outline-none focus:border-white no-underline focus:ring-0" placeholder="{{ __('Content')}}"  oninput="validateWord(this)"></textarea>
                    </div>
                    <div>
                        <div class="flex content-center">
                            <h1>{{__('Colaborators')}} <i class="fa-solid fa-users self"></i></h1>
                        </div>

                        <div>
                        <button><i class="fa-solid fa-user-plus"></i></button>

                        </div>
                    </div>
                    {{-- <input type="submit" wire:click='save' class=" cursor-pointer inline-flex items-center justify-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-1 transition ease-in-out duration-150 focus:text-black " placeholder={{__('Create')}} > --}}
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-danger-button wire:click="save" >save</x-danger-button>

        </x-slot>
    </x-dialog-modal>
</div>
