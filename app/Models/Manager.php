<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Manager extends Authenticatable
{
    protected $fillable = ['name', 'email', 'password'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}

