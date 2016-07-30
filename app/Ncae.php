<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ncae extends Model
{
    protected $table = 'ncae';

    protected $fillable = ['scientific_ability', 'reading_comprehension', 'verbal_ability', 'mathematical_ability',
    'logical_reasoning_ability', 'clerical_ability', 'non_verbal_ability', 'visual_manipulative_skill', 'humss',
    'stem', 'abm'];
}
