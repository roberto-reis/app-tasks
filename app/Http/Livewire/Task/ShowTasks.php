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

class ShowTasks extends Component
{
    use WithPagination;

    public $search = null;

    public function done($id)
    {
        $task = Task::findOrFail($id);
        $task->update(['status' => 'done']);
        // set o relacionamento
        $task->notification()->update(['visualized' => 1]);
    }

    public function delete($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
    }

    public function visualized($id)
    {
        $notification = Notificationtask::findOrFail($id);
        $notification->update(['visualized' => 1]);
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
            $notificationTask = Notificationtask::with('task')->where('visualized', 0)->get()->toArray();
            return $notificationTask;
        }
    }

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
