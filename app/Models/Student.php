<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'first_name', 
        'middle_name', 
        'last_name', 
        'date_of_birth', // <--- Make sure this is here!
        'email'
 ];
}