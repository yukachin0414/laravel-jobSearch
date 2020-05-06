<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}