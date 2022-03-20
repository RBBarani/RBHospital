<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Appointment;
use App\Models\Department;
use App\Models\Patients;
use App\Models\Doctor;
use Hash;

class GuestController extends Controller
{
	
	public function index()
    {
		$data['department'] = Department::pluck('name', 'id')->toArray();
		$data['doctor'] = Doctor::pluck('name', 'id')->toArray();
        return view('createGuest', compact('data'));
    }
	
	public function findDoctors($did)
    {
        $getDoc = Doctor::where('departments_id',$did)->pluck('name', 'id')->toArray();
        return response()->json($getDoc);
    }
	
	public function appointmentsStore(Request $request)
	{
		$this->validate($request, [
			'name' => 'required', 'string', 'max:255',
			'email' => 'required|email|unique:patients,email',
			'password' => 'required|min:6'
		]);
		
		$patients = new Patients;
        $patients->name = $request->name;
        $patients->email = $request->email;
        $patients->password = Hash::make($request->password);
        $patients->save();
		
		
        $appointments = new Appointment;
        $appointments->patients_id = $patients->id;
        $appointments->doctors_id = $request->input('doctor_id');
        $appointments->apdate = $request->input('date');
        $appointments->created_by = 'Patients';
        $appointments->save();

        return redirect('guestUser')->with('errors', 'Appointments is successfully saved');
	}
}
