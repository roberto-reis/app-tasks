@section('title', 'Tarefas')

<div class="w-screen min-h-screen">
    <!-- HEADER -->
    <x-header />    
    
    <!-- Content -->
    <section class="flex justify-center">
        <div>
            <div class="mx-2 mt-4 shadow bg-white sm:w-full max-w-2xl rounded">
                <div class="p-3 flex justify-between items-center">

                    <a href="{{ route('task.create') }}" class="px-3 py-2.5 inline-block bg-green-500 text-gray-100 hover:bg-green-600 rounded ">New Task</a>

                    <form action="" class="w-44 md:w-72">
                        <div class="relative">
                            <input wire:model="search" 
                                class="px-3 py-2 w-full form-input text-gray-500 border-2 border-green-500 focus:outline-none focus:ring-2 focus:ring-green-300 rounded"
                                type="text" placeholder="Pesquisar">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute top-2.5 right-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </form>
                </div>

                <hr>

                <div class="p-3 bg-gray-100">
                    <ul>
                        @foreach ($tasks as $task)
                            <li class="p-1.5 my-2 bg-white flex justify-between shadow rounded">
                                <a href="{{ route('task.edit', $task->id) }}" class="block hover:text-gray-700">
                                    <span class="block"> {{ $task->title }}</span>
                                    @if ($task->remember_in)
                                        <span class="px-2 rounded-2xl text-sm {{ strtotime($task->remember_in) <= strtotime('now') ? 'bg-red-300 animate-pulse' : 'bg-yellow-200' }}">
                                            Lembrar: {{ date('d/m/Y H:i', strtotime($task->remember_in)) }}
                                        </span>
                                    @endif                                    
                                </a>
                                <div class="flex flex-col md:flex-row justify-center items-center">
                                    <button class="px-2 mx-1 mb-1.5 md:mb-0 bg-green-300 rounded-2xl" wire:click.prevent="done( {{ $task->id }} )">done</button>
                                    <button class="px-2 bg-red-300 rounded-2xl" wire:click.prevent="delete( {{ $task->id }} )">delete</button>
                                </div>
                            </li>
                        @endforeach                        
                    </ul>
                </div>
            </div>
            <div class="p-2">
                {{ $tasks->links() }}
            </div>
        </div>        
    </section>

    <div class="absolute top-14 right-0">
        @foreach ($notificationTasks as $notificationTask)
            <div x-data="{ open: true }" x-show="open" class="mr-3 mb-3 max-w-sm">        
                <div class="flex py-1 px-2 justify-between  bg-red-400 rounded-t">
                    <h4 class="text-gray-100">Falta Cloncluir a Task</h4>
                    <button @click="open = false" class="px-2 text-gray-600 rounded-full inline-block text-center font-semibold hover:text-gray-900">X</button>
                </div>
                <div class="p-3 text-gray-700 font-medium bg-red-200 rounded-b">
                    <a href="{{ route('task.edit', $notificationTask['task_id']) }}" class="hover:underline">{{ $notificationTask['task']['title']}}</a>
                    
                </div>
            </div>
        @endforeach
    </div>

</div>
