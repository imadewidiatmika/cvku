<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;


    protected $table = 'organisasi';

    protected $fillable = [
        'user_id',
        'organization', 
        'positionOrganization', 
        'locationOrganization',
        'startMonthOrganization', 
        'startYearOrganization', 
        'endMonthOrganization',
        'endYearOrganization',
        'isActiveOrganization',
        'descOrganization'
    ];
}
