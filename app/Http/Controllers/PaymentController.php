<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Student;
use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('student')->get();
        return view('payments.index', compact('payments'));
    }

    public function create()
    {
        $students = Student::all();
        return view('payments.create', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'amount' => 'required|numeric|min:1',
            'payment_method' => 'required|string',
        ]);

        Payment::create([
            'student_id' => $request->student_id,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'status' => 'pending',
        ]);

        return redirect()->route('payments.index')->with('success', 'Payment recorded successfully.');
    }

    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'status' => 'required|in:pending,paid,failed',
        ]);

        $payment->update(['status' => $request->status]);

        return redirect()->route('payments.index')->with('success', 'Payment status updated.');
    }

    public function payWithStripe(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $charge = Charge::create([
            'amount' => $request->amount * 100,
            'currency' => 'usd',
            'source' => $request->stripeToken,
            'description' => 'Payment for student',
        ]);

        Payment::create([
            'student_id' => $request->student_id,
            'amount' => $request->amount,
            'payment_method' => 'stripe',
            'transaction_id' => $charge->id,
            'status' => 'paid',
        ]);

        return redirect()->route('payments.index')->with('success', 'Payment successful.');
    }
}
