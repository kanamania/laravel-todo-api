<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskTypeAttribute extends Model
{
    use HasFactory;
    protected $table = "tasks_types_attributes";

    protected $fillable = [
        'name',
        'default_values',
        'created_by',
        'modified_by',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function modifier()
    {
        return $this->belongsTo(User::class, 'modified_by');
    }

}
