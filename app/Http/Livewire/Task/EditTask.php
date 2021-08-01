<?php

namespace App\Http\Livewire\Task;

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
        $dateTime = ($this->remember_in != '') ? date('Y-m-d H:i', strtotime($this->remember_in)) : null;
        
        $this->task->update([
            'title' => $this->title,
            'remember_in' => $dateTime,
            'body' => $this->body
        ]);

        return redirect()->to(route('tasks.show'));
    }



    public function render()
    {
        return view('livewire.task.edit-task')->extends('layouts.app');
    }
}
