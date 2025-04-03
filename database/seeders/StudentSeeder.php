<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $groups = Group::all();

           for ($i = 1; $i <= 2000; $i++) {
               Student::create([
                   'name' => fake()->firstName() . " " . fake()->lastName(),
                   'email'=>fake()->email,
                   'group_id' => rand(1, 10),
               ]);
           }
       }
    
}
