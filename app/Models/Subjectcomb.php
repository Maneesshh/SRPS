<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjectcomb extends Model
{
    use HasFactory;
    protected $table='subject-class-teacher';
    protected $fillable=[
        'class_id',
        'subject_id',
        'teacher_id',
    ];
}
