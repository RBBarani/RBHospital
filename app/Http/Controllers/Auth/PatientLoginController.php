<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class PatientLoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:patient', ['except' => ['logout']]);
    }
    
    public function loginForm()
    {
      return view('login');
    }
    
    public function login(Request $request)
    {
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);
      if (Auth::guard('patient')->attempt(['email' => $request->email, 'password' => $request->password])) {
        return redirect()->intended(route('patient.appointments'));
      }
	  return redirect()->back()->withErrors(['password' => 'Invalid Credentials']);
    }
    
    public function logout()
    {
        Auth::guard('patient')->logout();
        return redirect('/');
    }
}
