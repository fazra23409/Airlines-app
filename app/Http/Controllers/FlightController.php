<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;

class FlightController extends Controller
{
    public function search(Request $request)
    {
        $from = $request->input('from');
        $to = $request->input('to');
        $departure = $request->input('departure_date');

        $flights = Flight::where('kota_asal', 'like', "%$from%")
            ->where('kota_tujuan', 'like', "%$to%")
            ->whereDate('departure_time', $departure)
            ->get();

        return view('flights.search-results', [
            'title' => 'Hasil Pencarian Penerbangan',
            'flights' => $flights,
            'from' => $from,
            'to' => $to,
            'departure' => $departure,
        ]);
    }
    public function index()
    {
        $flights = Flight::all();
        return view('admin.flights.index', [
            'title' => 'Daftar Penerbangan',
            'flights' => $flights,
        ]);
    }
    public function create()
    {
        return view('admin.flights.create', ['title' => 'Tambah Penerbangan']);
    }
    public function store(Request $request)
    {
        $request->validate([
            'flight_number' => 'required',
            'kota_asal' => 'required',
            'kota_tujuan' => 'required',
            'departure_time' => 'required|date',
            'price' => 'required|numeric',
        ]);

        Flight::create([
            'flight_number' => $request->flight_number,
            'kota_asal' => $request->kota_asal,
            'kota_tujuan' => $request->kota_tujuan,
            'departure_time' => str_replace('T', ' ', $request->departure_time),
            'price' => $request->price,
        ]);

        return redirect('/admin/flights/create')->with('success', 'Penerbangan berhasil ditambahkan');
    }
    public function edit($id)
    {
        $flight = Flight::find($id);

        if ($flight) {
            return view('admin.flights.edit', [
                'title' => 'Edit Penerbangan',
                'flight' => $flight,
            ]);
        }

        return redirect('/admin/flights')->with('error', 'Penerbangan tidak ditemukan');
    }
    public function update(Request $request, $id)
    {
        $flight = Flight::find($id);

        if (!$flight) {
            return redirect('/admin/flights')->with('error', 'Penerbangan tidak ditemukan');
        }

        $data = $request->only(['flight_number', 'kota_asal', 'kota_tujuan', 'departure_time', 'price']);
        $flight->update($data);

        return redirect('/admin/flights')->with('success', 'Penerbangan berhasil diupdate');
    }
    public function delete(Request $request)
    {
        $flight = Flight::find($request->id);

        if ($flight) {
            $flight->delete();
            return redirect('/admin/flights')->with('success', 'Penerbangan berhasil dihapus');
        }

        return redirect('/admin/flights')->with('error', 'Penerbangan tidak ditemukan');
    }
}
