<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AppointmentsController extends Controller
{   

    public function create_appointment() {
        return view('admin.create_appointment');
    }
    public function book_appointment(Request $request) {

    	$request->validate([
    		'firstname' => 'required',
    		'lastname' => 'required',
    		'email' => ['required','email'],
    		'date' => 'required',
    		'description' => 'required'
    	]);

        $appointment = new Appointment;
        $appointment->firstname = $request->firstname;
        $appointment->lastname = $request->lastname;
        $appointment->email = $request->email;
        $appointment->date = $request->date;
        $appointment->description = $request->description;

    	if(auth()->user()) {
    		$appointment->user_id = auth()->user()->id;
    	}

        $appointment->save();

    	return redirect()->back()->with('message','Appointment successfully booked');
    }

    public function my_appointments() {
        $id = Auth::id();
        if(empty($id)) { 
            return redirect()->route('index');
            } else {

            $appointments = User::find($id)->appointments;

            return view('admin.appointments', [
                    'appointments' => $appointments
                ]);
                }
        } 

    public function cancel_appointment(Request $request) {
        $appointment = Appointment::find($request['id']);
        $appointment->delete();

        return redirect()->back()->with('message','Appointment cancelled');
    } 

    public function reschedule_appointment(Request $request) {
        $request->validate([
            'date' => 'required',
            'description' => 'required'
        ]);
        $id = $request['id'];
        $appointment = Appointment::find($id);

        if(auth()->user()->id == $appointment->user_id) {
            $appointment->date = $request['date'];
            $appointment->description = $request['description'];
            $appointment->save();

            return redirect()->back()->with('message','Appointment successfully updated');

        } else {
            return redirect()->back()->withError('date','You are not authorize');
        }
    }
}
