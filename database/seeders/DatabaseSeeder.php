<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Patient::factory(20)->create();
        \App\Models\Appointment::factory(10)->create();
     //    \App\Models\User::factory()->create([
     //        'firstname' => 'admin',
     //        'lastname' => 'admin',
     //        'email' => 'admin@gmail.com',
     //        'password' => bcrypt(123456),
     //        'role' => 1
     // ]);
    }
}
