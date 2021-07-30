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
                            <input type="text" id="title"
                                class="w-full p-2 font-medium border-b-2 border-purple-600 rounded focus:outline-none focus:ring focus:ring-purple-300">
                        </div>

                        <div class="block w-52 my-3">
                            <label for="lembrar_em">Lembrar Em:</label>
                            <input type="datetime-local" id="lembrar_em" 
                                class="w-full p-2 font-medium border-b-2 border-purple-600 rounded focus:outline-none focus:ring focus:ring-purple-300">
                        </div>

                        <div class="block">
                            <label for="body" class="block">Body:</label>
                            <textarea id="body" cols="30" rows="3" class="
                                w-full p-2 font-medium border-b-2 border-purple-600 rounded focus:outline-none focus:ring focus:ring-purple-300">
                            </textarea>
                        </div>

                        <button class="px-6 py-2 my-3 bg-green-500 text-white font-medium rounded block">Save</button>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>

