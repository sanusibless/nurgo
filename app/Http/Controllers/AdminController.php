<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Patient;

class AdminController extends Controller
{
    // Admins Methods
    public function admins() {
        if(auth()->user()) {
             $doctors = User::where('role', 1)->get();
        return view('admin.admins', [
            'admins' => $doctors
        ]);
        }
    }

    public function store_admin(Request $request) {

        $credentials = $request->validate([
            'firstname' => 'required',
            'lastname' =>  'required',
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed'],
            'phone' => 'required',
            'role' => 'required',
            'office_num' => 'required',
            'photo' => 'required'
        ]);
        $credentials['password'] = bcrypt($credentials['password']);
        if($request->hasFile('photo')) {
            $credentials['photo'] = $request->file('photo')->store('profileImage','public');
        }
        
        User::create($credentials);

        return redirect()->route('admins')->with('success','successfully created');
    }

    public function view_admin(Request $request) {
        $user = User::findOrFail($request->id);
        
        return view('admin.admin_profile', [
            'admin' => $user
        ]);
    }

    public function update_admin(Request $request) {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
        ]);

        $id = $request->id;

        $admin = User::find($id);

        $admin->firstname = $request['firstname'];
        $admin->lastname = $request['lastname'];
        $admin->phone = $request['phone'];
        $admin->office_num = $request['office_num'];

        if($request->hasFile('photo')) {
            $admin->photo = $request->file('photo')->store('profileImage','public');
        }

        $admin->save();
        
        return redirect()->back()->with('success','successfully updated');
        
    }

    public function delete_admin() {
        $id = request('id');

        $doctor = User::find($id);

        $doctor->delete();

        return redirect()->back()->with('success','Deleted successfully');
    }

    // Doctors Methods
    public function doctors() {

    	$doctors = User::where('role', 2)->get();
    	return view('admin.doctors', [
    		'doctors' => $doctors
    	]);
    }

    public function store_doctor(Request $request) {

    	$credentials = $request->validate([
    		'firstname' => 'required',
    		'lastname' =>  'required',
    		'email' => ['required', 'email'],
    		'password' => ['required', 'confirmed'],
    		'phone' => 'required',
    		'specialty' => 'required',
    		'role' => 'required',
    		'office_num' => 'required',
            'photo' => 'required'
    	]);
    	$credentials['password'] = bcrypt($credentials['password']);
    	if($request->hasFile('photo')) {
    		$credentials['photo'] = $request->file('photo')->store('profileImage','public');
    	}
        //dd($credentials);
    	User::create($credentials);

    	return redirect()->route('doctors')->with('success','successfully created');
    }

    public function view_doctor(Request $request) {
        $user = User::findOrFail($request->id);
        
        return view('admin.doctor_profile', [
            'doctor' => $user
        ]);
    }

    public function update_doctor(Request $request) {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
        ]);

        $id = $request->id;

        $doctor = User::find($id);

        $doctor->firstname = $request['firstname'];
        $doctor->lastname = $request['lastname'];
        $doctor->phone = $request['phone'];
        $doctor->office_num = $request['office_num'];

        if($request->hasFile('photo')) {
            $doctor->photo = $request->file('photo')->store('profileImage','public');
        }

        $doctor->save();
        
        return redirect()->back()->with('success','successfully updated');
        
    
    }

    public function delete_doctor() {
        $id = request('id');

        $doctor = User::find($id);

        $doctor->delete();

        return redirect()->back()->with('success','Deleted successfully');
    }
    // Nurses methods
    public function nurses() {

        $nurses = User::where('role',3)->get();

        return view('admin.nurses', [
            'nurses' => $nurses
        ]);
    }

    public function view_nurse(Request $request, User $user) {
        $user = User::findOrFail($request->id);
        
        return view('admin.nurse_profile', [
            'nurse' => $user
        ]);
    }

    public function store_nurse(Request $request) {

        $credentials = $request->validate([
            'firstname' => 'required',
            'lastname' =>  'required',
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed'],
            'phone' => 'required',
            'specialty' => 'required',
            'role' => 'required',
            'photo' => 'required'
        ]);

        $credentials['password'] = bcrypt($credentials['password']);

        if($request->hasFile('photo')) {
            $credentials['photo'] = $request->file('photo')->store('profileImage','public');
        }
        //dd($credentials);
        User::create($credentials);

        return redirect()->route('nurses')->with('success','Nurse created successfully');
    }

    public function update_nurse(Request $request, User $user) {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
        ]);

        $id = $request->id;

        $nurse = User::find($id);

        $nurse->firstname = $request['firstname'];
        $nurse->lastname = $request['lastname'];
        $nurse->phone = $request['phone'];

        if($request->hasFile('photo')) {
            $nurse->photo = $request->file('photo')->store('profileImage','public');
        }

        $nurse->save();
        
        return redirect()->back()->with('success','Successfully updated');
    }


    public function delete_nurse() {
        $id = request('id');

        $nurse = User::find($id);

        $nurse->delete();

        return redirect()->back()->with('success','Deleted successfully');
    }

    // Patient methods 

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
