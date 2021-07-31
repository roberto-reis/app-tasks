<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTasks extends Component
{
    use WithPagination;

    public $search = "";

    public function done($id)
    {
        $task = Task::findOrFail($id);
        $task->status = "done";
        $task->save();
    }

    public function delete($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
    
    }

    public function render()
    {        
        if($this->search) {
            $tasks = Task::where('title', 'like','%'.$this->search.'%')->where('status', 'pendente')->paginate(10);
        } else {
            $tasks = Task::where('status', 'pendente')->paginate(10);
        }
        
        return view('livewire.task.show-tasks', [
            'tasks' => $tasks
        ])->extends('layouts.app');
    }
}
