<div>
    <form>
        <div class="bg-white p-4 sm:px-6 sm:py-4 border-b border-gray-150">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Prendi in prestito
            </h3>

        </div>
        

        <div class="bg-white px-4 pb-5 sm:px-4 sm:flex">
            <p class="mt-5">Vuoi prendere in prestito <strong class="capitalize">{{$libro->titolo}}</strong>? <br/>
            Troverai il prestito nella sezione <em>I Tuoi Prestiti</em>
            <p>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button type="button" wire:click="prenota" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-800 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                Prendi in prestito
            </button>
            <button type="button" wire:click="$emit('closeModal')" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                Annulla
            </button>
        </div>
</div>
</form>
</div>