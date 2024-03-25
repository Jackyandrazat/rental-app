<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Car;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{

    public function index()
    {
        if (auth()->user()->role === 'admin') {
            $bookings = Booking::all();
            $users = User::all();
            return view('admin.bookings.index', compact('bookings', 'users'));
        } else {
            $userId = Auth::id();
            // Ambil semua pemesanan (booking) yang dimiliki oleh pengguna yang sedang login
            $bookings = Booking::where('user_id', $userId)->get();
            return view('user.bookings.index', compact('bookings'));
        }
    }


    public function create()
    {
        $bookings = Booking::all();
        $cars = Car::all();
        if (auth()->user()->role === 'admin') {
            return view('admin.bookings.create',  compact('bookings', 'cars'));
        } else {
            return view('user.bookings.create', compact('bookings', 'cars'));
        }
    }

    public function store(Request $request)
    {
        // $car = Car::findOrFail($request->car_id);
        // if (!$car->available) {
        //     return redirect()->back()->with('error', 'The selected car is not available for booking.');
        // }

        // Memeriksa apakah mobil sudah dikembalikan
        $existingBooking = Booking::where('status', 'reserved')
            ->where('end_date', '>', now())
            ->first();

        if ($existingBooking) {
            return redirect()->back()->with('error', 'The selected car is not available for booking as it is currently being used.');
        }


        Booking::create($request->all());

        return redirect()->route('bookings.index')->with('success', 'Booking created successfully.');
    }

    public function show(Booking $booking)
    {

        return view('bookings.show', compact('booking'));
    }

    public function edit(Booking $booking)
    {
        $cars = Car::all();
        return view('admin.bookings.edit', compact('booking', 'cars'));
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'user_id' => 'required',
            'car_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $booking->update($request->all());

        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully.');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully.');
    }
}
