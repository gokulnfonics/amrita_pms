<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Languages extends Model
{
    use HasFactory;

    public function fetchlanguage()
    {
        return $this->belongsTo(TblLanguage::class, 'language', 'code'); // Assuming 'language_code' in 'Languages' and 'code' in 'TblLanguage'
    }
}
