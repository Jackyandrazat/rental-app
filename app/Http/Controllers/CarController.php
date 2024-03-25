<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function index()
    {
        if (auth()->user()->role === 'admin') {
            // Tampilkan daftar mobil untuk admin
            $cars = Car::all();
            return view('admin.cars.index', compact('cars'));
        } else {
            $cars = Car::all();
            return view('user.cars.index', compact('cars'));
        }
    }

    public function create()
    {
        // Tampilkan formulir tambah mobil
        return view('admin.cars.create');
    }

    public function store(Request $request)
    {
        // Simpan mobil baru ke database
        Car::create($request->all());
        return redirect()->route('cars.index')->with('success', 'Car added successfully.');
    }

    public function edit($id)
    {
        // Tampilkan formulir edit mobil
        $car = Car::findOrFail($id);
        return view('admin.cars.edit', compact('car'));
    }

    public function update(Request $request, $id)
    {
        // Update data mobil yang ada di database
        $car = Car::findOrFail($id);
        $car->update($request->all());
        return redirect()->route('cars.index')->with('success', 'Car updated successfully.');
    }

    public function destroy($id)
    {
        // Hapus mobil dari database
        $car = Car::findOrFail($id);
        $car->delete();
        return redirect()->route('cars.index')->with('success', 'Car deleted successfully.');
    }
}
