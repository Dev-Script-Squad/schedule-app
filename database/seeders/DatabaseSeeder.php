<?php

namespace Database\Seeders;

use App\Models\SchoolClass;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Student;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->director()->count(1)->create();
        User::factory()->coordinator()->count(2)->create();

        Teacher::factory()->count(10)->create();
        Student::factory()->count(50)->create();


        SchoolClass::factory(2)->create();

        SchoolClass::all()->each(function ($schoolClass) {
            $students = Student::inRandomOrder()->take(rand(5, 15))->pluck('id');
            $schoolClass->students()->attach($students);

            $teachers = Teacher::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $schoolClass->teachers()->attach($teachers);
        });
    }
}