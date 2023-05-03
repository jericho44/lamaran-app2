<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillSetModel extends Model
{
    use HasFactory;

    protected $table = 'skill_sets';
    protected $fillable = ['candidate_id', 'skill_id'];
}
