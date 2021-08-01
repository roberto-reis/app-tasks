<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTasks extends Component
{
    use WithPagination;

    public $search;

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

    // public function veriryDateSendEmail()
    // {
    //     $data = [];

    //     if ($this->search) {
    //         $tasks = Task::where('title', 'like','%'.$this->search.'%')->where('status', 'pendente')->paginate(10);
    //     } else {
    //         $tasks = Task::where('status', 'pendente')->paginate(10);
    //     }

    //     foreach ($tasks as $item) {
    //          $task = new Task();
    //          $task->
    //     } 
        
    //     // Verificar se data lembrar esta vencida e envia e-mail
    //     // if () {

    //     // }

    //     return $data;
        
    // }

    public function getTasks()
    {
        $data = [];

        
        $tasks = Task::where('status', 'pendente')->paginate(10);


        foreach ($tasks as $item) {

             $task = new Task();
             $task->id = $item->id;
             $task->title = $item->title;
             $task->body = $item->body;
             if ($item->remember_in && strtotime($item->remember_in) <= strtotime('now')) {
                $task->remember_in = $item->remember_in;
                $task->class = 'bg-red-200';
             } elseif ($item->remember_in && strtotime($item->remember_in) >= strtotime('now')) {
                $task->remember_in = $item->remember_in;
                $task->class = 'bg-yellow-200';
             } else {
                $task->remember_in = $item->remember_in;
                $task->class = '';
             }

             $data[] = $task;

        }

        return $data;        
    }

    public function render()
    {        
        if ($this->search) {
            $tasks = Task::where('title', 'like','%'.$this->search.'%')->where('status', 'pendente')->paginate(10);
        } else {
            $tasks = Task::where('status', 'pendente')->orderBy('id', 'DESC')->paginate(10);
        }        

        return view('livewire.task.show-tasks', [
            'tasks' => $tasks
        ])->extends('layouts.app');
    }


    

}
