<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::insert([
           [
               'id' => 1,
               'name' => 'Billy',
               'email' => 'billy@bob.com',
               'phone' => 011234324324
           ],
           [
                'id' => 2,
                'name' => 'John',
                'email' => 'john@john.com',
                'phone' => 034534545335
            ],
            [
                'id' => 3,
                'name' => 'Sarah',
                'email' => 'sarah@testter.com',
                'phone' => 024534545335,
            ]
        ]);
    }
}
