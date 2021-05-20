<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('I Tuoi Prestiti') }}
        </h2>
    </x-slot>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <!-- component -->
    <!-- This is an example component -->
    <div class="min-h-screen mt-10 flex  px-4">
        <div class='overflow-x-auto w-full'>
            <label class="flex justify-center  items-center mb-10">
                <input type="checkbox" class=" rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" wire:model="da_restituire"/>
                <span class="ml-2  text-gray-600">Visualizza solo copie da restituire</span>
            </label>
            <!-- Table -->
            <table class='shadow hover:shadow-xl transition-shadow mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
                
                <tbody class="divide-y divide-gray-200">
                @foreach ($prestiti as $prestito)

                    <tr>
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-3">
                                <div class="inline-flex w-32 h-32">
                                    <img class=' object-cover rounded' alt='User avatar' src='{{asset("/storage/" . $prestito->copia->libro->img_path)}}'>
                                </div>
                                <div>
                                    <p class="capitalize">
                                        {{$prestito->copia->libro->titolo}}
                                    </p>
                                    <p class="text-gray-500 text-sm font-semibold tracking-wide">
                                        Preso in prestito il {{$prestito->created_at}}
                                    </p>
                                    
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="">
                                {{$prestito->copia->libro->autore}}
                            </p>
                            
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if($prestito->restituito)
                                <span class="text-green-800 bg-green-200 font-semibold px-2 rounded-full">
                                    Restituito
                                </span>
                            @else
                            <span class="text-red-800 bg-red-200 font-semibold px-2 rounded-full">
                                Da restituire
                            </span>
                            @endif
                        </td>
                        
                        <td class="px-6 py-4 text-center">
                            @if(!$prestito->restituito)
                                 <a  href="#"  wire:click="restituisci({{$prestito->id}})" class="text-purple-800 hover:underline">Restituisci</a>

                            @endif

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>










</div>