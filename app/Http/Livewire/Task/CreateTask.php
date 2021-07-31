<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use Livewire\Component;

class CreateTask extends Component
{

    public $title;
    public $remember_in;
    public $body;

    public function create()
    {
        $this->validate([
            'title' => 'required',
            'remember_in' => 'required',
            'body' => 'required'
        ]);


        Task::create([
            'title' => $this->title,
            'user_id' => auth()->id(),
            'remember_in' => now(),
            'body' => $this->body,
            'status' => 'pendente'
        ]);
    }

    public function render()
    {
        return view('livewire.task.create-task')->extends('layouts.app');
    }
}
