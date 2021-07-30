<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;

class CreateTask extends Component
{

    public function render()
    {
        return view('livewire.task.create-task')->extends('layouts.app');
    }
}
