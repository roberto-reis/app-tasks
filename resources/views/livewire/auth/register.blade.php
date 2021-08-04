@section('title', 'Registrar')


<div class="flex justify-center">
    <div class="bg-gray-50 flex flex-col max-w-sm w-full mt-9 mx-2 rounded-md shadow-lg">
        <div class="border-b-2 border-gray-400 py-2">
            <h3 class="text-2xl text-gray-600 font-semibold text-center">Criar conta</h3>
        </div>
        <form wire:submit.prevent="register()" method="get" class="text-lg p-5">

            <div class="mb-4 block">
                <label for="name" class="text-gray-700 font-medium">Nome</label>
                <input type="text" id="name" wire:model="name" required class="w-full py-1 px-2 bg-gray-200 border-b-2 border-blue-500">
                @error('name')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4 block">
                <label for="email" class="text-gray-700 font-medium">E-mail</label>
                <input type="email" id="email" wire:model="email" required class="w-full py-1 px-2 bg-gray-200 border-b-2 border-blue-500">
                @error('email')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4 block">
                <label for="password" class="text-gray-700 font-medium">Senha</label>
                <input type="password" id="password" wire:model="password" required class="w-full py-1 px-2 bg-gray-200 border-b-2 border-blue-500">
                @error('password')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="password_comfirmation" class="text-gray-700 font-medium">Confirme a Senha</label>
                <input type="password" id="password_comfirmation" wire:model="password_comfirmation" required class="w-full py-1 px-2 bg-gray-200 border-b-2 border-blue-500">
                @error('password_comfirmation')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>


            <div class="mt-5 block">
                <button class="py-2 px-3 border-2 border-blue-500 text-blue-600 font-medium rounded-sm hover:bg-blue-500 hover:text-white
                ">Registrar</button>
                <a href="{{ route('login') }}" class="ml-4 text-blue-800 hover:underline">Já tem conta?</a>
            </div>
        </form>
    </div>
</div>