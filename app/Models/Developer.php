<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    protected $appends = ['duration_text'];

    public function getDurationTextAttribute()
    {
        return $this->duration . ' Hour';
    }
}
