<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // 1. Import this

class Student extends Model
{
    use SoftDeletes; // 2. Add this inside the class
    
    protected $fillable = ['first_name', 'last_name', 'email'];
}
