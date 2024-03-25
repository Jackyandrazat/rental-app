<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Car;
use App\Models\Booking;
use App\Models\ReturnCar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReturnController extends Controller
{
    // Menampilkan semua data pengembalian mobil
    public function index()
    {
        if (auth()->user()->role === 'admin') {
            $returns = ReturnCar::all();
            return view('admin.returns.index', compact('returns'));
        } else {
            $userId = Auth::id();
            // Ambil semua pemesanan (booking) yang dimiliki oleh pengguna yang sedang login
            $returns = ReturnCar::where('user_id', $userId)->get();
            return view('user.returns.index', compact('returns'));
        }
    }

    // Menampilkan formulir untuk membuat pengembalian mobil baru
    public function create(Request $request)
    {
        $bookings = Booking::where('status', 'reserved')->get();
        return view('admin.returns.create', compact('bookings'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'booking_id' => 'required',
            'user_id' => 'required',
            'return_date' => 'required|date',
        ]);

        $existingBooking = Booking::where('id', $request->booking_id)
            ->where('status','returned')
            ->first();

        if ($existingBooking) {
            return redirect()->back()->with('error', 'The selected car has already been returned.');
        }


        // Ambil data peminjaman berdasarkan ID
        $booking = Booking::findOrFail($request->booking_id);

        // Hitung jumlah hari penyewaan
        $start_date = Carbon::parse($booking->start_date);
        $end_date = Carbon::parse($request->return_date);
        $rental_days = $end_date->diffInDays($start_date);

        // Hitung biaya sewa berdasarkan tarif harian dan jumlah hari penyewaan
        $total_rental_cost = $booking->car->rental_rate_per_day * $rental_days;

        // Simpan data pengembalian mobil
        ReturnCar::create([
            'booking_id' => $request->booking_id,
            'user_id' => $request->user_id,
            'return_date' => $request->return_date,
            'rental_day' => $rental_days,
            'rental_rate_per_day' => $booking->car->rental_rate_per_day,
            'total_rental_cost' => $total_rental_cost,
        ]);

        // Tandai peminjaman mobil sebagai telah dikembalikan
        $booking->update(['status' => 'returned']);


        return redirect()->route('returns.index')->with('success', 'Car returned successfully.');
    }

    // Metode untuk menampilkan formulir edit data pengembalian mobil
    public function edit($id)
    {
        $return = ReturnCar::findOrFail($id);
        return view('admin.returns.edit', compact('return'));
    }

    // Metode untuk menyimpan pembaruan data pengembalian mobil ke database
    public function update(Request $request, $id)
    {
        $request->validate([
            'return_date' => 'required|date',
            'mileage' => 'required|numeric',
            'fuel_level' => 'required',
        ]);

        $return = ReturnCar::findOrFail($id);

        $return->update([
            'return_date' => $request->return_date,
            'mileage' => $request->mileage,
            'fuel_level' => $request->fuel_level,
        ]);

        return redirect()->route('returns.index')->with('success', 'Return updated successfully.');
    }

    // Metode untuk menghapus data pengembalian mobil dari database
    public function destroy($id)
    {
        $return = ReturnCar::findOrFail($id);
        $return->delete();
        return redirect()->route('returns.index')->with('success', 'Return deleted successfully.');
    }
}
