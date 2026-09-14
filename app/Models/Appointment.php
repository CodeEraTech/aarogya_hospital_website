<?php

namespace App\Models;

use Database\Factories\AppointmentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    /** @use HasFactory<AppointmentFactory> */
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'patient_name',
        'mobile_number',
        'email',
        'speciality',
        'preferred_doctor',
        'preferred_date',
        'preferred_time',
        'message',
        'source',
        'status',
    ];

    protected function casts(): array
    {
        return ['preferred_date' => 'date'];
    }

    public function patient() { return $this->belongsTo(Patient::class); }
}
