<header class="w-screen bg-indigo-600">
    <div class="md:w-9/12 m-auto">
        <nav class="px-3 flex h-12 justify-between">
            <ul class="flex text-gray-50">
                <li><a href="{{ route('tasks.show') }}" class="block px-2 py-3 hover:bg-indigo-700">Home</a></li>
                <li><a href="{{ route('task.create') }}" class="block px-2 py-3 hover:bg-indigo-700">New Task</a></li>
            </ul>
            <div class="flex">
                <a href="{{ route('logout') }}" class="px-2 py-3 text-gray-50 hover:bg-indigo-700">SAIR</a>
            </div>
        </nav>
    </div>
</header>