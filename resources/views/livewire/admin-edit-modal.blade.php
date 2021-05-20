<div>
    <div class="w-full  mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <!-- Validation Errors -->

        <form wire:submit.prevent="{{$mode}}">
            <!-- Name -->
            <div>
                <label class="block font-medium text-sm text-gray-700" for="name">
                    Titolo
                </label>

                <input wire:model="titolo" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" type="text" required="required" autofocus="autofocus">
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <label class="block font-medium text-sm text-gray-700" for="email">
                    Autore
                </label>

                <input wire:model="autore" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" type="text"  required="required">
            </div>

            <div class="mt-4">
                <label class="block font-medium text-sm text-gray-700" for="email">
                    Categoria
                </label>

                <select wire:model="categoria" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" type="text"  required="required">
                    <option value="narrativa">Narrativa</option>
                    <option value="saggistica">Saggistica</option>
                    <option value="altro">Altro</option>

                </select>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label class="block font-medium text-sm text-gray-700" for="password_confirmation">
                    Copertina
                </label>

                <input wire:model="copertina" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" id="password_confirmation" type="file" name="password_confirmation" >
            </div>

            <div class="flex items-center justify-end mt-4">
                

                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-4">
                    Aggiorna
                </button>
            </div>
        </form>
    </div>
</div>