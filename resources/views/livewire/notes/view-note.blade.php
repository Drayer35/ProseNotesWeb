@component('layouts.app')
    <div>
        <div class="lg:flex md:flex  justify-between items-center">
            <div class=" bg-gray-100  focus:bg-white px-4 rounded-lg shadow-md flex items-center">
                <button class="hover:bg-gray-300 rounded-2xl p-1">
                    <i class="fa-solid fa-magnifying-glass fa-xl " style="color: #393636;"></i>
                </button>
                <input type="text"
                    class="bg-transparent border-none outline-none focus:border-white no-underline focus:ring-0"
                    placeholder="{{ __('Search') }}">
                <button class="hidden  hover:bg-gray-300 rounded-2xl p-1">
                    <i class="fa-solid fa-x fa-xl" style="color: #393636;"></i>
                </button>
            </div>
            @livewire('create-note')
        </div>
        @if($fixeds->count())
        <h1>{{__('FIXEDS')}}</h1>
        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 my-5">
            @foreach ($fixeds as $fixed)
                @livewire('update-note', ['note' => $fixed], key($fixed->id))
            @endforeach
        </div>
        @else
        @endif

        @if ($notes->count())
        <h1>{{__('OTHERS')}}</h1>
            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 my-5">
                @foreach ($notes as $note)
                    @livewire('update-note', ['note' => $note], key($note->id))
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
@endcomponent

