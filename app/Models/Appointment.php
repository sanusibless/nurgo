<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
    	'firstname',
    	'lastname',
    	'email',
    	'date',
    	'description',
        'status',
        'phone',
        'country'
    ];

    public function user() {
    	return $this->belongsTo(User::class);
    }
}
