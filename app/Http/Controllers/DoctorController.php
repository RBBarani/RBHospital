<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Department;
use App\Models\Patients;
use App\Models\Doctor;
use App\Models\Pdf;
use Carbon\Carbon;
use Auth;

class DoctorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:doctor');
    }
	
	public function appointments()
	{
		$userId = Auth::user()->id;
		$appointments = Appointment::where('doctors_id', $userId)->get();
		return view('appointments', compact('appointments'));
	}
	
	public function appointmentsUpdate(Request $request)
    {
		$appointments = Appointment::find($request->hiddId);
		$appointments->status = $request->status;
		$appointments->update();
		
        return redirect('doctor/appointments')->with('success', 'Appointment is successfully updated');
    }
}
