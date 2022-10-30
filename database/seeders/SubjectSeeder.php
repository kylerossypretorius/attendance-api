<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subject::insert([
            [
                'id' => 1,
                'name' => 'Maths',
                'description' => 'Subject description here'
            ],
            [
                'id' => 2,
                'name' => 'Science',
                'description' => 'Subject description here'
            ],
            [
                'id' => 3,
                'name' => 'Art',
                'description' => 'Subject description here'
            ],
            [
                'id' => 5,
                'name' => 'Computers',
                'description' => 'Subject description here'
            ],
        ]);
    }
}
