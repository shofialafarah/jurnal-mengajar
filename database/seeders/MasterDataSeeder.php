<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data Kelas
        $classrooms = ['1A', '1B', '1C', '1D', '2A', '2B', '2C', '2D', '3A', '3B', '3C', '3D', '4A', '4B', '4C', '4D', '5A', '5B', '5C', '5D', '6A', '6B', '6C', '6D'];
        foreach ($classrooms as $class) {
            Classroom::create(['name' => $class]);
        }

        // Data Mata Pelajaran
        $subjects = ['Al-Qur\'an Hadits', 'SKI', 'Tahfidzh', 'Fiqih', 'Bahasa Arab', 'Akidah Akhlak'];
        foreach ($subjects as $subject) {
            Subject::create(['name' => $subject]);
        }
    }
}
