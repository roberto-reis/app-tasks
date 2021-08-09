<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;


    /** @var array */
    protected $fillable = [
        'title',
        'user_id',
        'remember_in',
        'body',
        'status'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    public function notification()
    {
        return $this->hasOne(Notificationtask::class);
    }
    
}
