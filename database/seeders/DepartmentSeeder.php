<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

use Illuminate\Support\Facades\Schema;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Schema::disableForeignKeyConstraints();
		Department::truncate();
		Schema::enableForeignKeyConstraints();

		Department::create([ 'name' => 'Casualty']);
		Department::create([ 'name' => 'Cardiology']);
		Department::create([ 'name' => 'ENT']);
		Department::create([ 'name' => 'Gynaecology']);
		Department::create([ 'name' => 'Neurology']);
		Department::create([ 'name' => 'Orthopaedic']);
       
    }
}
