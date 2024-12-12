<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name'];

    // Relación con el modelo User
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
