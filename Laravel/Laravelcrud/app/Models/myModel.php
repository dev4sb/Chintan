<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;
    protected $fillable = ['profilePic', 'firstName', 'lastName', 'email', 'gender', 'course', 'description', 'hobbies', 'password'];
}
