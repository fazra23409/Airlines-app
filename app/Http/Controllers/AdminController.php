<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $payments = Payment::with(['user', 'flight'])->get();

        return view('dashboard', [
            'title' => 'Admin Dashboard',
            'payments' => $payments,
            'total' => $payments->count(),
            'approved' => $payments->where('status', 'approved')->count(),
            'pending' => $payments->where('status', 'pending')->count(),
        ]);
    }
    public function approve($id)
    {
        $payment = Payment::find($id);

        if ($payment) {
            $payment->update(['status' => 'approved']);
            return redirect()->back()->with('success', 'Transaksi berhasil ');
        }

        return redirect()->back()->with('error', 'Transaksi tidak ditemukan');
    }
}
