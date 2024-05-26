<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $table = 'pengalaman';

    protected $fillable = [
        'user_id',
        'company', 
        'position', 
        'locationCompany', 
        'descCompany', 
        'startMonthCompany', 
        'startYearCompany', 
        'endMonthCompany',
        'endYearCompany',
        'isActiveCompany',
        'portfolioWork'
    ];
}

