<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HireMe extends Model
{
    protected $fillable = ['Skill_Name', 'Skill_Description', 'Rate'];
}
