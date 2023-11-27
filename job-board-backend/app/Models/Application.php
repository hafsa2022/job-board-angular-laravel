<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'username',
        'email',
        'phone_number',
        'number_of_exper',
        'resume',
        'cover_lettre',
        'job_id',
        'user_id',
    ];
}
