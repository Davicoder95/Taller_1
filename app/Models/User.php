<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
            'name',
            'lastname',
            'email',
            'gender',
            'address',
            'phone',
        ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}

