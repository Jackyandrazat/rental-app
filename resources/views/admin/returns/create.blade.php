<x-app-layout>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-lg font-semibold mb-4">Add Return</h1>
                    <form action="{{ route('returns.store') }}" method="POST">
                        @if (session('error'))
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                                role="alert">
                                <strong class="font-bold">Error!</strong>
                                <span class="block sm:inline">{{ session('error') }}</span>
                            </div>
                        @endif
                        @csrf
                        <div class="mb-4">
                            <label for="user_id" class="block text-sm font-medium text-gray-700">User</label>
                            <label for="user_id"
                                class="block w-auto mt-1 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">{{ Auth::user()->name }}</label>
                            <input type="hidden" name="user_id" id="user_id"
                                class="block w-full mt-1 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                value="{{ Auth::user()->id }}">
                        </div>
                        <div class="mb-4">
                            <label for="booking_id" class="block text-sm font-medium text-gray-700">Plate</label>
                            <select name="booking_id" id="booking_id"
                                class="block w-full mt-1 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                @foreach ($bookings as $carBooking)
                                    <option value="{{ $carBooking->id }}">
                                        {{ $carBooking->id }}-{{ $carBooking->car->brand }} -
                                        {{ $carBooking->car->license_plate }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="return_date" class="block text-sm font-medium text-gray-700">Return Date</label>
                            <input type="datetime-local" name="return_date" id="return_date"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <!-- Add other fields as needed -->
                        <div class="flex items-center justify-end">
                            <button type="submit"
                                class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
