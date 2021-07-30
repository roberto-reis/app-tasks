<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;

class ShowTasks extends Component
{
    

    public function render()
    {        
        
        return view('livewire.task.show-tasks')->extends('layouts.app');
    }
}
