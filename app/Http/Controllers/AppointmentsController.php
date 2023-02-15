<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;

class AppointmentsController extends Controller
{   
    public function appointment_details(Request $request) {
        $appointment_detail = Appointment::find($request->id);
        $patient = Patient::find($appointment_detail['patient_id']);
        $doctor = User::find($appointment_detail->user_id);

        return view('admin.appointment_details', [
            'details' => $appointment_detail,
            'patient' => $patient,
            'doctor' => $doctor
        ]);
    }
   
}
