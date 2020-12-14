<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskStatusJoint extends Model
{
    use HasFactory;

    protected $table = 'tasks_statuses';

    protected $fillable = [
        'task_id',
        'status_id',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
