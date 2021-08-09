<?php

namespace App\Http\Livewire\Task;

use App\Models\Notificationtask;
use App\Models\Task;
use Livewire\Component;

class EditTask extends Component
{

    public $task;
    public $title;
    public $remember_in;
    public $body;
    
    

    public function mount($id)
    {
        $this->task = Task::findOrFail($id);        

        // Verifica de a data é null e formata para exibir no form/input
        $this->remember_in = ($this->task->remember_in != null) ? date('Y-m-d\TH:i', strtotime($this->task->remember_in)) : "";
        
        $this->title = $this->task->title;        
        $this->body = $this->task->body;

    }

    public function updateTask()
    {
        $this->validate([
            'title' => ['required'],
            'remember_in' => ['date','nullable'],
            'body' => ['required']
        ]);

        // Farmata a data para salvar no banco de dados
        $newRemember_in = ($this->remember_in != '') ? date('Y-m-d H:i', strtotime($this->remember_in)) : null;
        
        $this->task->update([
            'title' => $this->title,
            'remember_in' => $newRemember_in,
            'body' => $this->body
        ]);

        // Verificar se usuário alterou o remember_in para maior que a data atual.
        if($newRemember_in && strtotime($newRemember_in) > strtotime('now')) {
            $notificationTask = Notificationtask::where('task_id', $this->task->id);
            $notificationTask->delete();
        }


        return redirect()->to(route('tasks.show'));
    }



    public function render()
    {
        return view('livewire.task.edit-task')->extends('layouts.app');
    }
}
