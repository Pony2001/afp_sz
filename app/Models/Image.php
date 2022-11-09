<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'profile',
        'ref1',
        'ref2',
        'ref3',
        'ref4'
       
    ];
}
