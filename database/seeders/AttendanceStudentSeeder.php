<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttendanceStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->format('Y-m-d H:i:s');
        DB::table('attendance_student')->insert([
            [
                'attendance_id' => 1,
                'student_id' => 1,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'attendance_id' => 1,
                'student_id' => 2,
                'status' => 0,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'attendance_id' => 1,
                'student_id' => 3,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'attendance_id' => 2,
                'student_id' => 1,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'attendance_id' => 2,
                'student_id' => 2,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'attendance_id' => 2,
                'student_id' => 3,
                'status' => 0,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
