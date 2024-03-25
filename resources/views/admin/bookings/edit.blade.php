<!-- resources/views/bookings/edit.blade.php -->

<x-app-layout>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-lg font-semibold mb-4">Edit Booking</h1>
                    <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="user_id" class="block text-sm font-medium text-gray-700">User</label>
                            <label for="user_id" class="block w-auto mt-1 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">{{ Auth::user()->name }}</label>
                            <input type="hidden" name="user_id" id="user_id" class="block w-full mt-1 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" value="{{ Auth::user()->id }}">
                        </div>
                        <div class="mb-4">
                            <label for="car_id" class="block text-sm font-medium text-gray-700">Car</label>
                            <select name="car_id" id="car_id" class="block w-full mt-1 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                @foreach ($cars as $car)
                                    <option value="{{ $car->id }}" {{ $car->id == $booking->car_id ? 'selected' : '' }}>{{ $car->brand }} - {{ $car->model }}</option>
                                @endforeach
                            </select>
                            <label class="block text-sm font-medium text-gray-700">Rate Rental /day</label>
                            <label name="" id="" class="block text-sm font-medium mt-1 px-3 text-gray-700">{{ $car->rental_rate_per_day }}</label>
                        </div>
                        <div class="mb-4">
                            <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                            <input type="date" name="start_date" id="start_date" value="{{ $booking->start_date->format('Y-m-d') }}" class="block w-full mt-1 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <div class="mb-4">
                            <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                            <input type="date" name="end_date" id="end_date" value="{{ $booking->end_date->format('Y-m-d') }}" class="block w-full mt-1 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Update Booking</button>
                            <a href="{{ route('bookings.index') }}" class="inline-block px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
