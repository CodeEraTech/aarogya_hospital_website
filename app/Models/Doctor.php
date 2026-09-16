<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Doctor extends Model
{
    protected $guarded = [];

    public function speciality(): BelongsTo
    {
        return $this->belongsTo(Speciality::class);
    }
}
