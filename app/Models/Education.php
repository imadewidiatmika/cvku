<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = 'pendidikan';

    protected $fillable = [
        'user_id',
        'school', 
        'locationSchool', 
        'startMonthSchool', 
        'startYearSchool', 
        'endMonthSchool',
        'endYearSchool',
        'isActiveEducation',
        'lastEdu', 
        'major', 
        'ipk',
        'activity',
        'linkSertif'
    ];
}
