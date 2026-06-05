<?php

namespace App\Models;

<<<<<<< HEAD
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;
=======
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8

    /**
     * The attributes that are mass assignable.
     *
<<<<<<< HEAD
     * @var list<string>
=======
     * @var array<int, string>
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
     */
    protected $fillable = [
        'name',
        'email',
        'password',
<<<<<<< HEAD
=======
        'role',
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
<<<<<<< HEAD
     * @var list<string>
=======
     * @var array<int, string>
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
<<<<<<< HEAD
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
=======
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
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
