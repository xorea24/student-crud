<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
<<<<<<< HEAD
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'date_of_birth',
        'email',
    ];
=======
  protected $fillable = ['first_name','middle_name','last_name','date_of_birth','email'];

>>>>>>> f1e3744 (Initial commit - Student CRUD with update and delete)
}
