<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Department;
use App\Models\Doctor;
use Illuminate\Support\Facades\Hash;

class DoctorFactory extends Factory
{
    protected $model = Doctor::class;
	
	/**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
		// $departments = Department::pluck('id');
		
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => Hash::make('pcode123'),
            'departments_id' => Department::all()->random()->id,
        ];
    }
}
