<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = false;
    
    public function users()
    {
        return $this->hasMany(User::class)->orderBy('name');
    }
}
