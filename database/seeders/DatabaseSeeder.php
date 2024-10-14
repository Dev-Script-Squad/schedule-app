<?php

namespace Database\Seeders;

use App\Models\SchoolClass;
use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $eventContentId1 = DB::table('event_content')->insertGetId([
            'title' => 'Provas Globais',
            'subtitle' => 'Provas Globais',
            'description' => 'Descrição das provas globais',
            'background_image' => '',
            'card_image' => '',
            'card_color' => '#c40233',
        ]);

        $eventContentId2 = DB::table('event_content')->insertGetId([
            'title' => 'Provas Parciais',
            'subtitle' => 'Provas Parciais',
            'description' => 'Descrição das provas parciais',
            'background_image' => '',
            'card_image' => '',
            'card_color' => '#b312',
        ]);

        $schoolClass = SchoolClass::factory()->create();
        $teacher1 = User::factory()->create(['role' => 'Professor']);
        $teacher2 = User::factory()->create(['role' => 'Professor']);
        $students = Student::factory(3)->create();

        DB::table('events')->insert([
            [
                'title' => 'Provas Globais',
                'type' => 'Provas Globais',
                'start' => '2024-10-15 07:30:00',
                'end' => '2024-10-22 12:15:00',
                'school_class_id' => $schoolClass->id,
                'user_id' => $teacher1->id,
                'student_id' => $students->first()->id, // Pega o ID do primeiro aluno
                'event_content_id' => $eventContentId1,
            ],
            [
                'title' => 'Provas Parciais',
                'type' => 'Provas Parciais',
                'start' => '2024-10-7 07:30:00',
                'end' => '2024-10-14 12:15:00',
                'school_class_id' => $schoolClass->id,
                'user_id' => $teacher2->id,
                'student_id' => $students->last()->id, // Pega o ID do último aluno
                'event_content_id' => $eventContentId2,
            ],
        ]);

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
