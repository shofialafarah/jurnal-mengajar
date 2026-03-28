<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Schedule;
use App\Models\Classroom;
use App\Models\Subject;
use App\Models\User;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first(); // Ambil user pertama (kamu)
        $class = Classroom::where('name', '5C')->first();
        $subject = Subject::where('name', 'Al-Qur\'an Hadits')->first();

        Schedule::create([
            'user_id' => $user->id,
            'class_id' => $class->id,
            'subject_id' => $subject->id,
            'day' => 'Selasa',
            'jam_mulai' => '07:30:00',
            'jam_selesai' => '09:00:00',
        ]);
    }
}
