<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Patient;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
    	'user_id',
        'patient_id',
        'appointment_date',
        'comment',
    ];

    public function patient() {
    	return $this->belongsTo(Patient::class);
    }

    public function doctor() {
        return $this->belongsTo(User::class);
    }

}
