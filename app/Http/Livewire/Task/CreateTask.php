<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateTask extends Component
{

    public $title;
    public $remember_in;
    public $body;

    public function create()
    {
        $this->validate([
            'title' => ['required'],
            'remember_in' => ['date', 'nullable'],
            'body' => ['required']
        ]);


        Task::create([
            'title' => $this->title,
            'user_id' => Auth::id(),
            'remember_in' => date('Y-m-d H:i', strtotime($this->remember_in)),
            'body' => $this->body,
            'status' => 'pendente'
        ]);

        return redirect()->route('tasks.show');
    }

    public function render()
    {
        return view('livewire.task.create-task')->extends('layouts.app');
    }
}
