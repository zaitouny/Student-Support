<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::truncate();

        $length = 10; 
        $randomNumber = '';
        for ($i = 0; $i < $length; $i++) {
            $randomNumber .= strval(rand(0, 9));
        }

        Student::create([
            'name' => 'ali1',
            'email' => 'ali1@gmail.com',
            'roul' => '0',
            'year' => 'First Year',
            'uni_id' => $randomNumber,
            'password' => Hash::make('00000000'),
        ]);
    }
}
