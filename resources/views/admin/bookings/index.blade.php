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
                                <th class="px-4 py-2 bg-gray-200 border border-gray-400">Status</th>
                                <th class="px-2 py-2 bg-gray-200 border border-gray-400">Action</th>
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
                                    <td
                                        class="px-4 py-2 border border-gray-400  
                                        @if ($booking->status == 'returned') 
                                        text-green-400.
                                        @elseif($booking->status == 'reserved')
                                        text-orange-400 
                                        @endif">
                                        {{ $booking->status }}</td>
                                    <td class="px-2 py-2">
                                        <div class="flex items-center justify-center space-x-4 text-sm">
                                            <a href="{{ route('bookings.edit', $booking->id) }}"
                                                class="flex items-center justify-between px-2 py-1 text-green-600 rounded-lg focus:outline-none focus:shadow-outline-gray hover:bg-green-100">
                                                Edit
                                            </a>
                                            <form action="{{ route('bookings.destroy', $booking->id) }}" method="post"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="flex items-center justify-between px-2 py-1 text-red-600 rounded-lg focus:outline-none focus:shadow-outline-gray hover:bg-red-100"
                                                    onclick="return confirm('Are you sure you want to delete this data?')">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
