<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'picture', 'manager_id'];

    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }
}

