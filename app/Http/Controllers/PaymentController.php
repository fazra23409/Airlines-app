<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Flight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class PaymentController extends Controller
{
 
    public function form($flight_id)
    {
        $flight = Flight::findOrFail($flight_id);
        return view('payments.form', [
            'title' => 'Form Pembayaran',
            'flight' => $flight
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'flight_id' => 'required|exists:flights,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'no_ktp' => 'required|string|max:20',
        ]);

        Payment::create([
            'user_id' => Auth::id(),
            'flight_id' => $request->flight_id,
            'status' => 'pending',
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'no_ktp' => $request->no_ktp,
        ]);

        return redirect('/payments/history')->with('success', 'Transaksi berhasil disimpan. Menunggu persetujuan admin.');
    }
    public function history()
    {
        $payments = Payment::with('flight')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('riwayat', [
            'title' => 'Riwayat Pembayaran',
            'payments' => $payments
        ]);
    }
    public function ticket($id)
    {
        $payment = Payment::with('flight')
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        if ($payment->status !== 'approved') {
            return redirect('/payments/history')->with('error', 'Tiket belum disetujui.');
        }

        return view('payments.ticket', [
            'title' => 'Tiket Penerbangan',
            'payment' => $payment
        ]);
    }

    // // download tiket sebagai PDF
    public function downloadTicket($id)
    {
        $payment = Payment::with('flight')
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        if ($payment->status !== 'approved') {
            return redirect('/payments/history')->with('error', 'Tiket belum disetujui.');
        }

        $pdf = Pdf::loadView('payments.ticket_pdf', [
            'payment' => $payment
        ]);

        $filename = 'Tiket_' . $payment->flight->flight_number . '.pdf';

        return $pdf->download($filename);
    }
}
