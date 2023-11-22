<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'username',
        'email',
        'phone_number',
        'position',
        'image',
        'resume',
        'city',
        'country',
        'user_id'

    ];
}
