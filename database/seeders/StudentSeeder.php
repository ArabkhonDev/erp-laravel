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

       foreach ($groups as $group) {
           for ($i = 1; $i <= 15; $i++) {
               Student::create([
                   'name' => 'Student ' . $i . ' (' . $group->name . ')',
                   'email'=>fake()->email,
                   'group_id' => $group->id,
               ]);
           }
       }
    }
}
