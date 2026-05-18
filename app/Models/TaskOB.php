<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskOB extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $fillable = [
        'title',
        'description',
        'priority',
        'status',
        'deadline',
        'category_id',
        'created_by'
    ];

    protected $casts = [
        'deadline' => 'date',
    ];

    public function category()
    {
        return $this->belongsTo(CategoryOB::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function assignedUsers()
    {
        return $this->belongsToMany(User::class, 'task_user', 'task_id', 'user_id');
    }
}