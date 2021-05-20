<div>
    <!-- component -->
<!-- This is an example component -->
<div class="min-h-screen flex items-center px-4 bg-gray-100">
    <div class='overflow-x-auto w-full'>
    <div class="flex">
    <div class="mx-auto">
        <button class="my-5 py-2 px-4   bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200  text-white  transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg " href="#" wire:click="nuovaCopia" class="text-purple-800 hover:underline">Aggiungi Copia</button>

    </div>
    </div>
        <!-- Table -->
        <table class='mx-auto max-w-4xl  shadow hover:shadow-xl transition-shadow bg-white w-full whitespace-nowrap rounded-lg  divide-y divide-gray-300 overflow-hidden'>

            <thead class="bg-gray-50">
                <tr class="text-gray-600 text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        Id
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        Disponibile
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        Aggiunto il
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        
                    </th>
                
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @foreach ($libro->copie as $copia)
                    
                <tr>

                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-3">
                            <div class="inline-flex w-32 h-32">
                                <img class=' object-cover rounded' alt='' src='{{asset("/storage/" . $libro->img_path)}}'>
                            </div>
                            <div>
                                <p class="capitalize text-xl">
                                    {{$libro->titolo}}: {{$copia->id}}
                                </p>
                                
                            </div>


                           
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <p class="">
                            @if($copia->disponibile)
                                <span class="text-green-500">Sì</span>
                            @else
                                <span class="text-red-500">No</span>
                            @endif
                        </p>
                        
                    </td>
                    <td>
                    <div>
                                <p>
                                    {{$copia->created_at}}
                                </p>
                                
                    </td>
                   
                    <td class="px-6 py-4 text-center">
                        <a href="#" onclick="Livewire.emit('openModal', 'admin-copia-delete-modal', {{ json_encode(["copiaId" => $copia->id , "mode" => "update"])}})" class="text-purple-800 hover:underline">Elimina</a>

                    </td>

                    <td class="px-6 py-4 text-center">
                        <a href="{{route("adminCopiePrestiti", ["id" => $libro->id, "copiaId" => $copia->id])}}" class="text-purple-800 hover:underline">Visualizza storico prestiti</a>

                    </td>

                    
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>
</div>








    
</div>
