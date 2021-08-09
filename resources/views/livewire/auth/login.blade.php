@section('title', 'Login')

<div class="flex justify-center">
    <div class="max-w-sm w-full bg-gray-50 mt-9 mx-2 rounded-md shadow-lg">

        <div class="border-b-2 border-gray-400 py-2">
            <h3 class="text-2xl text-gray-600 font-semibold text-center">Faça Login</h3>
        </div>

        <form wire:submit.prevent="authenticate" class="text-lg p-5">
            @error('credentials')
                <p class="text-red-600 text-sm text-center mb-2">{{ $message }}</p>
            @enderror
            <div class="mb-3">
                <label for="email" class="text-gray-700 font-medium block">E-mail</label>
                <input type="email" id="email" wire:model.lazy="email" placeholder="Digite seu e-mail" required autofocus
                    class="w-full py-1 px-2 bg-gray-200 border-b-2 border-blue-500">
                @error('email')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="password" class="text-gray-700 font-medium block">Senha</label>
                <input type="password" id="password" wire:model.lazy="password" placeholder="Digite sua senha" required
                    class="w-full py-1 px-2 bg-gray-200 border-b-2 border-blue-500">
                @error('password')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="block">
                <input type="checkbox" id="remember" wire:model="remember">
                <label for="remember">Lembre-se de mim</label>
            </div>
    
            <button class="mt-5 py-2 px-3 border-2 border-blue-500 text-blue-600 font-medium rounded-sm hover:bg-blue-500 hover:text-white
            ">Entrar</button>
        </form>

    </div>
</div>