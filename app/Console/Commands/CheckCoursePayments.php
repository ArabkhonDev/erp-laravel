<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Student;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class CheckCoursePayments extends Command
{
    protected $signature = 'payments:check';
    protected $description = 'Talabalarning kursga to‘lov qilgan yoki qilmaganini tekshirish va eslatma yuborish';

    public function handle()
    {
        $currentMonth = Carbon::now()->format('Y-m');

        $students = Student::all();
        
        foreach ($students as $student) {
            $hasPaid = Payment::where('student_id', $student->id)
                              ->where('month', $currentMonth)
                              ->exists();

            if (!$hasPaid) {
                // Log uchun yozib qo‘yamiz
                Log::info("{$student->name} ({$student->id}) bu oy uchun to'lov qilmagan!");

                // Agar SMS yoki Telegram bildirishnoma qo‘shmoqchi bo‘lsangiz, shu yerga qo‘shasiz
                $this->sendPaymentReminder($student);
            }
        }

        $this->info('To‘lovlar tekshirildi va eslatmalar yuborildi.');
        // logger()->info('salom');
    }

    protected function sendPaymentReminder($student)
    {
        Log::info("📢 To'lov eslatmasi: {$student->name} ga eslatma yuborildi!");
    }
}

