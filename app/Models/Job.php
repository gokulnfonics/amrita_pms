<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table = 'job';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function personalInformation()
    {
        return $this->hasOne(PersonalInformation::class, 'user_id', 'id');
    }
}
