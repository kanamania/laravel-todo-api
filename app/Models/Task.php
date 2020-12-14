<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "tasks";

    protected $fillable = [
        'name',
        'description',
        'type_id',
        'parent_id',
        'created_by',
        'modified_by',
    ];

    public function type()
    {
        return $this->belongsTo(TaskType::class, 'type_id');
    }
    public function parent()
    {
        return $this->belongsTo(Task::class, 'parent_id');
    }
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function modifier()
    {
        return $this->belongsTo(User::class, 'modified_by');
    }

}
