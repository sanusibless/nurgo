<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    public function patients() {
      return view('admin.patients',[
            'patients' => Patient::all()
        ]);
    }

   public function view_patient(Request $request) {
        $patient = Patient::findOrFail($request->id);

        return view('admin.patient_profile', [
            'patient' => $patient
        ]);
    }

    public function store_patient(Request $request) {
        $credentials = $request->validate([
            'user_id' => 'required|integer',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'required|integer',
            'address' => 'required',
     ]);

        Patient::create($credentials);

        return redirect()->back()->with('success','Created Successfully');
    }

    public function delete_patient() {

        $id = request('id');

        $patient = Patient::find($id);

        $patient->delete();

        return redirect()->back()->with('success','Deleted Successfully');
    }
}
