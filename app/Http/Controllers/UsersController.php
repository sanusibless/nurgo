<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function register(){
    	return view('users.register');
    } 

    public function store_user (Request $request) {
    	$credentials = $request->validate([
    		'firstname' => 'required',
    		'lastname' =>  'required',
    		'email' => ['required', 'email'],
    		'password' => ['required', 'confirmed'],
    	]);
    	$credentials['password'] = bcrypt($credentials['password']);

    	$user = User::create($credentials);

        //event(new Registered($user));

    	auth()->login($user);

    	return redirect()->route('index');
    }


    public function login(){
    	return view('users.login');
    } 

    public function authenticate(Request $request) {

    	$credentials = $request->validate([
    		'email' => ['required','email'],
    		'password' => 'required'
    	]);

    	if(auth()->attempt($credentials)) {
            
    		$request->session()->regenerate();


    		return redirect()->route('dashboard');
    	}

    	return redirect()->back()->withError('message','Invalid credentials')->onlyInput('email');

    }
    public function user_profile() {
        return view('admin.user_profile');
    }

    public function update_user(Request $request) {
        
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
        ]);

        $id = auth()->user()->id;

        $user = User::find($id);

        $user->firstname = $request['firstname'];
        $user->lastname = $request['lastname'];
        $user->phone = $request['phone'];

        if($request->hasFile('photo')) {
            $user->photo = $request->file('photo')->store('profileImage','public');
        }

        $user->save();
        
        return redirect()->back()->with('message','successfully updated');
    }

    public function change_password(Request $request, User $user) {
        $request->validate([
            'currentpassword' => 'required',
            'newpassword' => 'required',
            'password_confirmation' => 'required'
        ]);
        dd($user->password);
    }

    public function forgot_password(Request $request, User $user) {
        return view('users.forgot_password');
    }
    public function logout(Request $request){
    	auth()->logout();

    	$request->session()->invalidate();
    	$request->session()->regenerateToken();

    	return redirect()->route('index');
    }

    public function delete_profile_image() {
        $id = auth()->user()->id;
        
        $user = User::find($id);

        $user->photo = null;

        $user->save();

        return redirect()->back()->with('success',"Profile Image deleted successfully");
    }
}
