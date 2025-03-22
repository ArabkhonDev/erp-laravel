<?php

namespace Database\Seeders;

use App\Models\Payment;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = Student::all();
        $months = ['2025-01', '2025-02', '2025-03'];

        foreach ($students as $student) {
            foreach ($months as $month) {
                $hasPaid = rand(0, 1); // 50% to‘lov qilingan, 50% qilinmagan

                if ($hasPaid) {
                    Payment::create([
                        'student_id' => $student->id,
                        'month' => $month . "-01",
                        'amount' => 500000, // O‘rtacha summa
                        'paid_at' => Carbon::parse(  $month .'-05' ),
                    ]);
                }
            }
        }
    }
}
