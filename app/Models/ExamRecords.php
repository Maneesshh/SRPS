<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamRecords extends Model
{
    use HasFactory;
    protected $table='exam_records';
    protected $fillable=[
        'exam_id',
        'student_id',
        'class_id',
        'total',
        'ave ',
        'section',
        'pos',
        'p_comment',
        't_comment ',
        'year',
    ];
}
