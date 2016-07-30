<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = ['math', 'english', 'science', 'filipino', 'computer', 'tle', 'values', 'mapeh', 'social_studies'];
}
