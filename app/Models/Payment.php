<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentFactory> */
    use HasFactory;

    protected $fillable = ['student_id', 'amount', 'payment_method', 'transaction_id', 'status'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
