<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    // Define the inverse of the relationship with User
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
