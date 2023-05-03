<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidate extends Model
{
    use HasFactory;
    use SoftDeletes;
    use UUID;

    protected $fillable = ['job_id', 'name', 'email', 'phone', 'year'];

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }
}
