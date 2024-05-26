<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable=[
        'regno',
        'name',
        'email',
        'password',
        'project_title',
        'project_description',
        'mentor_name',
        'mentor_number',
        'student_mobile',
        'batch_year',
    ];
}
