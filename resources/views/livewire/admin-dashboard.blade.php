<div>
    <!-- component -->
<!-- This is an example component -->
<div class="min-h-screen flex items-center px-4 bg-gray-100">
    <div class='overflow-x-auto w-full'>
    <div class="flex">
    <div class="mx-auto">
        <button class="my-5 py-2 px-4   bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200  text-white  transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg " href="#" onclick="Livewire.emit('openModal', 'admin-edit-modal', {{ json_encode(["libroId" => 0 , "mode" => "create"])}})" class="text-purple-800 hover:underline">Nuovo</button>

    </div>
    </div>
        <!-- Table -->
        <table class='mx-auto max-w-4xl  shadow hover:shadow-xl transition-shadow bg-white w-full whitespace-nowrap rounded-lg  divide-y divide-gray-300 overflow-hidden'>

            <thead class="bg-gray-50">
                <tr class="text-gray-600 text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        Titolo
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        Autore
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        Copie
                    </th>
                    
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @foreach ($libri as $libro)
                    
                <tr>

                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-3">
                            <div class="inline-flex w-32 h-32">
                                <img class=' object-cover rounded' alt='' src='{{asset("/storage/" . $libro->img_path)}}'>
                            </div>
                            <div>
                                <p class="capitalize">
                                    {{$libro->titolo}}
                                </p>
                                
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <p class="">
                            {{$libro->autore}}
                        </p>
                        
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class=" font-semibold px-2">
                            {{$libro->copie()->count()}}
                        </span>
                    </td>
                   
                    <td class="px-6 py-4 text-center">
                        <a href="#" onclick="Livewire.emit('openModal', 'admin-edit-modal', {{ json_encode(["libroId" => $libro->id , "mode" => "update"])}})" class="text-purple-800 hover:underline">Modifica</a>
                    </td>

                    <td class="px-6 py-4 text-center">
                        <a href="#"  wire:click="$emit('openModal', 'admin-delete-modal', {{json_encode(["libroId" => $libro->id])}})"class="text-red-600 hover:underline">Elimina</a>
                    </td>

                    <td class="px-6 py-4 text-center">
                        <a href="{{route('adminCopie', ['id' => $libro->id])}}"  class="text-purple-800 hover:underline">Visualizza copie</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>
</div>








    
</div>
