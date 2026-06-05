<?php

namespace App\Policies;

use App\Models\TaskJS;
use App\Models\User;

class TaskPolicyJS
{
    public function view(User $user, TaskJS $task): bool
    {
        if ($user->role === 'admin') {
            return true;
        }
        return $user->id === $task->assigned_to || $user->id === $task->created_by;
    }

    public function create(User $user): bool
    {
        return in_array($user->role, ['admin', 'team_member']);
    }

    public function update(User $user, TaskJS $task): bool
    {
        if ($user->role === 'admin') {
            return true;
        }
        return $user->role === 'team_member' &&
               ($user->id === $task->created_by || $user->id === $task->assigned_to);
    }

    public function delete(User $user, TaskJS $task): bool
    {
        return $user->role === 'admin';
    }
}
