@section('title', 'Login')


<div class="w-screen min-h-screen bg-gradient-to-r from-gray-400 to-blue-600">
    
    <div class="flex justify-center">
        <div class="bg-gray-50 flex flex-col max-w-sm w-full mt-9 mx-2 rounded-md shadow-lg">
            <div class="border-b-2 border-gray-400 py-2">
                <h3 class="text-2xl text-gray-600 font-semibold text-center">Faça Login</h3>
            </div>
            <form action="" method="get" class="text-lg p-5">
                <label for="email" class="text-gray-700 font-medium">E-mail</label>
                <input type="email" id="email" class="block w-full py-1 px-2 mb-4 bg-gray-200 border-b-2 border-purple-500">
    
                <label for="password" class="text-gray-700 font-medium">Senha</label>
                <input type="password" id="password" class="block w-full py-1 px-2 bg-gray-200 border-b-2 border-purple-500">
    
                <button class="mt-5 py-2 px-3 border-2 border-purple-500 text-purple-500 font-medium rounded-sm hover:bg-purple-500 hover:text-white
                ">Entrar</button>
            </form>
        </div>
    </div>

</div>
