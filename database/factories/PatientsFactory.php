<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Patients;
use Illuminate\Support\Facades\Hash;

class PatientsFactory extends Factory
{
	protected $model = Patients::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => Hash::make('pcode123'),
        ];
    }
}
