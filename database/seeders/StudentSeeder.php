<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

 
class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'userId' => '1',
                'studentName' => 'Damar',
                'studentNim' => '215314203',
                'studentFoto' => 'student-foto/dam2.jpg'
                 
            ]
        ];

        DB::table('students')->insert($data);
    }
    }

