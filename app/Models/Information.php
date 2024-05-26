<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    protected $table = 'informasi_pribadi';

    protected $fillable = [
        'user_id',
        'name', 
        'phoneNum', 
        'email', 
        'profesion',
        'linked', 
        'portfolio', 
        'address', 
        'desc'
    ];
}
