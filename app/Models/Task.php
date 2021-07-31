<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;


    /** @var array */
    protected $fillable = [
        'title',
        'remember_in',
        'body',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(Task::class);
    }
}
