<div class="flex flex-wrap justify-center">
    <div wire:click="$set('open', true)"
    class=".self-start break-words max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 hover:shadow-xl transform hover:scale-105 transition-transform duration-400 ease-in-out select-none m-4">
        @if (is_null($note->image))
        @else
            <div class="flex">
                <img src="data:image/png;base64,{{ base64_encode($note->image) }}">
            </div>
        @endif
        <div class="p-5">
            <div class="flex justify-between items-center">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $note->Title }}
                </h5>
                @if ($note->IsFixed)
                    <i class="fa-solid fa-thumbtack" style="color: #e17f23;"></i>
                @else
                    <i class="fa-solid fa-thumbtack"></i>
                @endif
            </div>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"> {{ $note->Note }}</p>
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
            <h1>{{ __('Update Note') }}: N° {{ $note->id }}</h1>
        </x-slot>
        <x-slot name="content">
            <form action="">
                <div class="">
                    <div class="flex justify-between items-center">
                        <input type="text"
                            class="w-full bg-transparent border-none outline-none focus:border-white no-underline focus:ring-0 focus:text-black"
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
