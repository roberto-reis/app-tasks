<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use App\Mail\SendMail;
use App\Models\Notificationtask;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;

class ShowTasks extends Component
{
    use WithPagination;

    public $search = null;
    public $user;

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

    public function setNotificationTaskUser()
    {
        $tasks = Task::with('notification')->where('status', 'pendente')->where('user_id', Auth::id())->get();
        
        foreach($tasks as $task) {
            if($task->remember_in && strtotime($task->remember_in) <= strtotime('now') && $task->notification == null) {
                Notificationtask::create([
                    'user_id' => Auth::id(),
                    'task_id' => $task->id,
                    'visualized' => 0,
                    'sent_email' => 0
                ]);
                
            }
        }
    }


    public function getNotificationTaskUser()
    {
        if($this->search === null) {
            $notificationTask = Notificationtask::with('task')->get()->toArray();
            return $notificationTask;
        }
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

    public function mount()
    {
        $this->setNotificationTaskUser();
    }

    public function render()
    {
        if ($this->search) {
            $tasks = Task::where('title', 'like','%'.$this->search.'%')->where('status', 'pendente')->where('user_id', Auth::id())->paginate(10);
        } else {
            $tasks = Task::with('notification')->where('status', 'pendente')->where('user_id', Auth::id())->orderBy('id', 'DESC')->paginate(10);
        }

        return view('livewire.task.show-tasks', [
            'tasks' => $tasks,
            'notificationTasks' => $this->getNotificationTaskUser()
        ])->extends('layouts.app');
    }

}
