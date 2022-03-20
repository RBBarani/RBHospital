<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use HasFactory, SoftDeletes;
	
	public function patient() {
        return $this->belongsTo(Patients::class, 'patients_id');
    }
	
	public function department() {
        return $this->belongsTo(Department::class, 'departments_id');
    }
	
	public function doctor() {
        return $this->belongsTo(Doctor::class, 'doctors_id');
    }
}
