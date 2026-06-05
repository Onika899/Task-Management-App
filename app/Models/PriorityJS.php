<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PriorityJS extends Model
{
    protected $table = 'priorities';

    protected $fillable = ['name', 'level'];

    public function tasks(): HasMany
    {
        return $this->hasMany(TaskJS::class);
    }
}
