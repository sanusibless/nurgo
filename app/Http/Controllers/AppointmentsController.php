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
        if($appointment_detail !== null) {
            $patient = Patient::find($appointment_detail['patient_id']);
            $doctor = User::find($appointment_detail->user_id);

        return view('admin.appointment_details', [
            'details' => $appointment_detail,
            'patient' => $patient,
            'doctor' => $doctor
        ]);
        
        return redirect()->route('app')->with('warning','Record Available');
    }
}

    public function store_appointment(Request $request) {

        $appointment = $request->validate([
            'user_id' => 'required',
            'patient_id' => 'required',
            'appointment_date' => 'required',
            'appointment_time' => 'required',
            'comment' => 'required'
        ]);

        $appointment['appointment_date'] = $request->appointment_date . " " . $request->appointment_time;

        Appointment::create($appointment);

        return redirect()->back()->with('success','Record saved succcessfully');

    }
    
    public function destroy() {
        $appointment = Appointment::find(request('id'));
        $patient_id = $appointment['patient_id'];
        $appointment->delete();
        return redirect()->route('view_patient',[ 'id' => $patient_id ])->with('success','Record deleted succcessfully');
    }
}
