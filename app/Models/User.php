<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    protected $fillable = ['name', 'email', 'password', 'role_id'];

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function tasks() {
        return $this->hasMany(Task::class);
    }
}
