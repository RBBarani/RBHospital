<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Appointment;
use App\Models\Department;
use App\Models\Patients;
use App\Models\Doctor;
use App\Models\Pdf;
use Auth;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:patient');
    }
	
	public function appointments()
	{
		$userId = Auth::user()->id;		
		$appointments = Appointment::where('patients_id', $userId)->get();
		
		return view('appointments', compact('appointments'));
	}
	
	public function appointmentsCreate()
    {
		$data['patient'] = Patients::where('id', Auth::user()->id)->pluck('name', 'id')->toArray();
		$data['department'] = Department::pluck('name', 'id')->toArray();
		$data['doctor'] = Doctor::pluck('name', 'id')->toArray();
        return view('createAppointments', compact('data'));
    }
	
	public function findDoctors($did)
    {
        $getDoc = Doctor::where('departments_id',$did)->pluck('name', 'id')->toArray();
        return response()->json($getDoc);
    }
	
	public function appointmentsStore(Request $request)
	{
        $appointments = new Appointment;
        $appointments->patients_id = $request->input('patient_id');
        $appointments->doctors_id = $request->input('doctor_id');
        $appointments->apdate = $request->input('date');
        $appointments->created_by = 'Patients';
        $appointments->save();

        return redirect('patient/appointments')->with('success', 'Appointments is successfully saved');
	}
}
