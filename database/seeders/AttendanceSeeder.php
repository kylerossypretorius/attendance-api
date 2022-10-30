<?php

namespace Database\Seeders;

use App\Models\Attendance;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Attendance::insert([
            [
                'id' => 1,
                'subject_id' => 1,
                'user_id' => 1,
                'attendance_date' => '2022-10-28',
            ],
            [
                'id' => 2,
                'subject_id' => 1,
                'user_id' => 1,
                'attendance_date' => '2022-10-28',
            ],
            [
                'id' => 3,
                'subject_id' => 3,
                'user_id' => 1,
                'attendance_date' => '2022-10-28',
            ],
            [
                'id' => 4,
                'subject_id' => 3,
                'user_id' => 1,
                'attendance_date' => '2022-10-28',
            ],
        ]);
    }
}
