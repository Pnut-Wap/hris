<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'hire_date',
        'date_of_birth',
        'gender',
        'department_id',
        'position_id',
        'status',
        'salary'
    ];
}
