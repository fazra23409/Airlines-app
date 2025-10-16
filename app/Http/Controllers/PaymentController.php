<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'flight_id' => 'required|exists:flights,id',
        ]);

        Payment::create([
            'user_id' => Auth::id(),
            'flight_id' => $request->flight_id,
            'status' => 'pending',
        ]);

        return redirect()->route('payments.history')->with('success', 'Transaksi berhasil disimpan');
    }
    public function history()
    {
        $payments = Payment::with('flight')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('riwayat', [
            'title' => 'Riwayat Pembayaran',
            'payments' => $payments,
        ]);
    }
}
