<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $fillable = ['fname', 'lname','uname', 'email', 'pass'];
}
