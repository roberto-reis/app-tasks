@section('title', 'Create New')

<div>
    <!-- HEADER -->
    <x-header />    
    
    <!-- Content -->
    <div class="flex justify-center mt-2">
        <div class="mx-2 mt-4 shadow bg-white sm:w-full max-w-2xl rounded">
            <div>
                <div class="p-3 text-gray-700 font-medium text-lg">
                    Cadastre uma Nova Tarefa
                </div>

                <hr>

                <div class="p-3 bg-gray-100 text-gray-700 text-lg">
                    <form action="">
                        <div class="block">
                            <label for="title">Title:</label>
                            <input type="text" id="title" wire:model="title"
                                class="w-full p-2 font-medium border-b-2 border-purple-600 rounded focus:outline-none focus:ring focus:ring-purple-300">
                                @error('title')
                                    <span class="text-red-500 text-sm block">{{ $message }}</span>
                                @enderror
                        </div>

                        <div class="block my-3">
                            <label for="remember_in" class="block">Lembrar Em:</label>
                            <input type="datetime" id="remember_in" wire:model="remember_in"
                                class="sm:w-52 w-full p-2 font-medium border-b-2 border-purple-600 rounded focus:outline-none focus:ring focus:ring-purple-300">
                            @error('remember_in')
                                <span class="text-red-500 text-sm block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="block">
                            <label for="body" class="block">Body:</label>
                            <textarea id="body" cols="30" rows="3" wire:model="body"
                            class="w-full p-2 font-medium border-b-2 border-purple-600 rounded focus:outline-none focus:ring focus:ring-purple-300">
                            </textarea>
                            @error('body')
                                    <span class="text-red-500 text-sm block">{{ $message }}</span>
                            @enderror
                        </div>

                        <button class="px-6 py-2 my-3 bg-green-500 text-white font-medium rounded block" wire:click.prevent="create()">Save</button>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>

