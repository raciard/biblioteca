<div>
    <x-slot name="style">
        <style>
            .b_card::after {
                content: '';
                flex: auto;
            }
        </style>
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vetrina') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <input class="mx-auto w-3/5 mb-10 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-5 " type="text" wire:model="search" placeholder="Ricerca">
        <form class="flex mx-auto justify-center mb-10">

            <div class="mr-5">
                <input type="radio" wire:model="categoria" name="categoria" value="tutte" />
                <label for="">Tutti</label>
            </div>
            <div class="mr-5">
                <input type="radio" wire:model="categoria" name="categoria" value="narrativa" />
                <label for="">Narrativa</label>
            </div>
            <div class="">
                <input type="radio" wire:model="categoria" name="categoria" value="saggistica" />
                <label for="">Saggistica</label>
            </div>

        </form>
        <div class=" mx-auto  sm:px-6 lg:px-8 w-4/5 max-w-screen-2xl">
            <div class="">
                <div class="sm:px-6 lg:px-8  justify-center flex flex-row flex-wrap    ">
                    @foreach ($libri as $libro)

                    <div class="b_card  flex mb-5 bg-white dark:bg-gray-800 rounded-lg hover:shadow-xl transition-shadow shadow mx-8 hover ">
                        <div class="flex-none w-24 md:w-48  relative">
                            <img src="{{asset('/storage/' . $libro->img_path)}}" alt="shopping image" class="absolute rounded-lg inset-0 w-full h-full object-cover" />
                        </div>
                        <form class="flex-auto p-6 5 w-56 h-72">
                            <div class="flex flex-wrap ">
                                <h1 class="capitalize flex-auto text-xl font-semibold dark:text-gray-50">
                                    {{$libro->titolo}}
                                </h1>

                                <div class=" w-full flex-none text-sm font-medium text-gray-500 dark:text-gray-300 mt-2">
                                    di <span class="capitalize">{{$libro->autore}}</span>
                                </div>
                            </div>
                            <div class="flex items-baseline mt-4 mb-6 text-gray-700 dark:text-gray-300">
                                <div class="space-x-2 flex">

                                </div>

                            </div>
                            <div class="flex mb-4 text-sm font-medium">
                                <button onclick="Livewire.emit('openModal', 'prenota-modal', {{ json_encode(["libroId" => $libro->id]) }})" type="button" @if(! $libro->disponibile() ) disabled @endif class=" py-2 px-4 disabled:opacity-50 bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 @if(! $libro->disponibile() ) cursor-not-allowed @endif focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg ">
                                    Prendi in prestito
                                </button>
                            </div>
                            @if(!$libro->disponibile())
                            <p class="text-sm text-gray-500 dark:text-gray-300">
                                Non ci sono copie disponibili per questo libro.
                            </p>
                            @else
                            <p class="text-sm text-gray-500 dark:text-gray-300">
                                {{$libro->copie()->where('disponibile', true)->count()}} copie disponibili
                            </p>
                            @endif

                        </form>
                    </div>

                    @endforeach

                </div>
                <div class="w-96 mx-auto">
                {{ $libri->links() }}
                </div>
            </div>

        </div>
    </div>

</div>