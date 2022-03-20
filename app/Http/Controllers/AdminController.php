<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Appointment;
use App\Models\Department;
use App\Models\Patients;
use App\Models\Doctor;
use App\Models\Pdf;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
	
	public function pdf()
	{
		$pdf = Pdf::all();
		return view('pdf', compact('pdf'));
	}
	
	public function uploadpdf(Request $request)
	{
		$file = $request->file;
		$filename = time().'.'.$file->getClientOriginalExtension();
		$request->file->move('uploads',$filename);
		
		$pdf = new Pdf();
		$pdf->name = $request->name;
		$pdf->file = $filename;
		$pdf->save();

		return redirect('admin/pdf')->with('success', 'PDF is successfully updated');
	}
	
	public function doctors()
	{
		$doctors = Doctor::all();
		return view('doctors', compact('doctors'));
	}
	
	public function patients()
	{
		$patients = Patients::all();
		return view('patients', compact('patients'));
	}
	
	public function appointments()
	{
		$appointments = Appointment::all();

		return view('appointments', compact('appointments'));
	}
	
	public function appointmentsCreate()
    {
		$data['patient'] = Patients::pluck('name', 'id')->toArray();
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
        $appointments->created_by = 'Admin';
        $appointments->save();

        return redirect('admin/appointments')->with('success', 'Appointments is successfully saved');
	}
}