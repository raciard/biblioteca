


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @if(isset($style))
        {{ $style }}
        @endif
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        @livewireStyles
    </head>
<body class="bg-gray-100">
<div class="min-h-screen mt-10 flex  items-center px-4 ">
        <div class='overflow-x-auto w-full'>

<table class='shadow hover:shadow-xl transition-shadow mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
        <thead class="bg-gray-50">
                <tr class="text-gray-600 text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        Prestato a: 
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        Stato
                    </th>
                    
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        
                    </th>
                  
                </tr>
            </thead>
                
                
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
                                    Prestito effettuato il {{$prestito->created_at}}
                                    </p>
                                    <p class="text-gray-500 text-sm font-semibold tracking-wide">
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="">
                                {{$prestito->user->name}}
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
                        
                        
                    </tr>
                @endforeach
                </tbody>
</table>
</div>
</div>

@livewire('livewire-ui-modal')
@livewireUIScripts
@livewireScripts
</body>
</html>