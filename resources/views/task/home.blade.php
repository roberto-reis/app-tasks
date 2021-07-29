@extends('layouts.app')

@section('content')

    <!-- HEADER -->
    <x-header />
    
    
    <!-- Content -->
    <main class="flex justify-center">
        <div class="mx-2 mt-4 shadow bg-white sm:w-full max-w-2xl">
            <div>
                <div class="p-3 flex justify-between">
                    <button class="px-3 py-2 bg-green-500 text-gray-100 rounded">
                        New Task
                    </button>
                    <form action="" class="w-44 md:w-72">
                        <input class="px-3 py-2 w-full  border-2 border-green-500 focus:outline-none focus:ring-2 focus:ring-green-600 rounded"
                        type="text" name="s" id="s" placeholder="Pesquisar">
                    </form>
                </div>

                <hr>

                <div class="p-3 bg-gray-100">
                    <ul>
                        <li class="p-1.5 my-2 bg-white flex justify-between shadow rounded">
                            <a href="">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</a>
                            <div class="flex flex-col md:flex-row justify-center items-center">
                                <button class="px-2 mx-1 mb-1.5 md:mb-0 bg-green-300 rounded-2xl">done</button>
                                <button class="px-2 bg-red-300 rounded-2xl">delete</button>
                            </div>
                        </li>
                        <li class="p-1.5 my-2 bg-white flex justify-between shadow rounded">
                            <a href="">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</a>
                            <div class="flex flex-col md:flex-row  items-center">
                                <button class="px-2 mx-1 mb-1.5 md:mb-0 bg-green-300 rounded-2xl">done</button>
                                <button class="px-2 bg-red-300 rounded-2xl">delete</button>
                            </div>
                        </li>
                        <li class="p-1.5 my-2 bg-white flex justify-between shadow rounded">
                            <a href="">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</a>
                            <div class="flex flex-col md:flex-row  items-center">
                                <button class="px-2 mx-1 mb-1.5 md:mb-0 bg-green-300 rounded-2xl">done</button>
                                <button class="px-2 bg-red-300 rounded-2xl">delete</button>
                            </div>
                        </li>
                        <li class="p-1.5 my-2 bg-white flex justify-between shadow rounded">
                            <a href="">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</a>
                            <div class="flex flex-col md:flex-row  items-center">
                                <button class="px-2 mx-1 mb-1.5 md:mb-0 bg-green-300 rounded-2xl">done</button>
                                <button class="px-2 bg-red-300 rounded-2xl">delete</button>
                            </div>
                        </li>
                        <li class="p-1.5 my-2 bg-white flex justify-between shadow rounded">
                            <a href="">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</a>
                            <div class="flex flex-col md:flex-row  items-center">
                                <button class="px-2 mx-1 mb-1.5 md:mb-0 bg-green-300 rounded-2xl">done</button>
                                <button class="px-2 bg-red-300 rounded-2xl">delete</button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </main>
    
@endsection
