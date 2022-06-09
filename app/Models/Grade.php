<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $table='grades';
    protected $fillable=[
      'name',
      'gpoint',
      'marks_from',
      'marks_to',
      'remarks',
    ];
}
