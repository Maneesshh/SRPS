<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table='student_records';
    protected $fillable=[
        'user_id',
        'class_id',
        'section ',
        'parent_id ',
        'session' ,
        'age',
    ];
}
