<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seededAdminEmail = 'admin@admin.com';
        $admin = Admin::where('email', '=', $seededAdminEmail)->first();
        if ($admin === null) {
            $admin = Admin::create([
                'name' => 'Admin',
                'email' => $seededAdminEmail,
                'password' => Hash::make('pcode123'),
            ]);
        }
    }
}
