<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Tasks assigned to this user (many-to-many)
    public function tasks()
    {
        return $this->belongsToMany(TaskOB::class, 'task_user', 'user_id', 'task_id');
    }

    // Tasks created by this user (one-to-many)
    public function createdTasks()
    {
        return $this->hasMany(TaskOB::class, 'created_by');
    }

    // Check if user is Admin
    public function isAdmin()
    {
        return $this->role === 'Admin';
    }

    // Check if user is Team Member
    public function isTeamMember()
    {
        return $this->role === 'Team Member';
    }

    // Check if user is Guest
    public function isGuest()
    {
        return $this->role === 'Guest';
    }
}