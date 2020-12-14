<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskTypeAttributeJoint extends Model
{
    use HasFactory;
    protected $table = "tasks_types_to_attributes";

    protected $fillable = [
        'task_type_id',
        'task_type_attribute_id',
    ];

    public function task_type()
    {
        return $this->belongsTo(User::class, 'task_type_id');
    }
    public function task_type_attribute()
    {
        return $this->belongsTo(TaskTypeAttribute::class, 'task_type_attribute_id');
    }

}
