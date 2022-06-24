<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marks extends Model
{
    use HasFactory;
    protected $table='marks';
    protected $fillable=[
 	'student_id', 	
    'class_id', 	
    'subject_id', 	
    'exam_id', 	
    'prac', 	
    'theory', 	
    'total', 	
    'grade_id', 	
    'year',
    ];
}
