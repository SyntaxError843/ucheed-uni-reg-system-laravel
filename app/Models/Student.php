<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_code',
        'first_name',
        'father_name',
        'last_name',
        'phone_number',
        'email',
        'password',
        'date_of_birth',
    ];
}
