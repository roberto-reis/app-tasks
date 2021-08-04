<?php

namespace App\Http\Livewire\Task;

use App\Mail\SendMail;
use App\Models\Task;
use Illuminate\Support\Facades\Mail;
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

    //     $tasks = Task::where('status', 'pendente')->get();

    //     foreach ($tasks as $item) {
    //         if ($item->remember_in &&  strtotime($item->remember_in) <= strtotime('now')) {

    //             $data = [
    //                 'nome' => 'José Roberto',
    //                 'email' => 'joseroberto2496@gmail.com',
    //                 'mensagem' => 'Aqui é a mensagem',
    //                 'title' => $item->title,
    //                 'link' => 'http://127.0.0.1:8000/task/edit/'.$item->id
    //             ];

    //             Mail::to($data['email'])->send(new SendMail($data));
    //         }
    //     }        
    // }


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
