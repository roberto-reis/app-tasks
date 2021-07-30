<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;

class EditTask extends Component
{
    

    public function render()
    {
        return view('livewire.task.edit-task')->extends('layouts.app');
    }
}
