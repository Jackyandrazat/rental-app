<x-app-layout>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-lg font-semibold mb-4">List of Bookings</h1>
                    <a href="{{ route('bookings.create') }}"
                        class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Add Booking</a>
                    @if (session('success'))
                        <div class="mt-4 py-2 px-4 bg-green-100 text-green-700 border border-green-300 rounded">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                            role="alert">
                            <strong class="font-bold">Error!</strong>
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif
                    <table class="w-full mt-4 border-collapse border border-gray-400">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 bg-gray-200 border border-gray-400">ID</th>
                                <th class="px-4 py-2 bg-gray-200 border border-gray-400">User</th>
                                <th class="px-4 py-2 bg-gray-200 border border-gray-400">Car</th>
                                <th class="px-4 py-2 bg-gray-200 border border-gray-400">Start Date</th>
                                <th class="px-4 py-2 bg-gray-200 border border-gray-400">End Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                                <tr class="text-center">
                                    <td class="px-4 py-2 border border-gray-400">{{ $booking->id }}</td>
                                    <td class="px-4 py-2 border border-gray-400">{{ $booking->user->name }}</td>
                                    <td class="px-4 py-2 border border-gray-400">{{ $booking->car->brand }} -
                                        {{ $booking->car->model }}</td>
                                    <td class="px-4 py-2 border border-gray-400">
                                        {{ $booking->start_date->format('Y-m-d') }}</td>
                                    <td class="px-4 py-2 border border-gray-400">
                                        {{ $booking->end_date->format('Y-m-d') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
