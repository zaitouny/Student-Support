<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Subject::truncate();

        Subject::create([
            'name' => 'Math 1',
            'year' => 'FirstYear',
            'term' => 'CH-I',
            'kind' => 'scientific',
            'hours' => '3',
        ]);
    }
}
